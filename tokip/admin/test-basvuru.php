<?php
// Hızlı test sayfası
require_once '../inc/brain.php';

echo "<h2>Veritabanı Kontrolü</h2>";

// 1. Bağlantı testi
try {
    $pdo->query("SELECT 1");
    echo "✅ Veritabanı bağlantısı: BAŞARILI<br>";
} catch (Exception $e) {
    echo "❌ Veritabanı bağlantısı: HATA - " . $e->getMessage() . "<br>";
    exit;
}

// 2. Tablo var mı?
try {
    $check = $pdo->query("SHOW TABLES LIKE 'basvuru_bilgileri'")->fetch();
    if ($check) {
        echo "✅ basvuru_bilgileri tablosu: MEVCUT<br>";
    } else {
        echo "❌ basvuru_bilgileri tablosu: BULUNAMADI<br>";
        echo "<br><strong>ÇÖZ ÜM:</strong> <a href='../install_basvuru.php'>Kurulum sayfasını çalıştırın</a><br>";
        exit;
    }
} catch (Exception $e) {
    echo "❌ Tablo kontrolü: HATA - " . $e->getMessage() . "<br>";
    exit;
}

// 3. Veri var mı?
try {
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM basvuru_bilgileri");
    $count = $stmt->fetch();
    echo "✅ Kayıt sayısı: " . $count['total'] . "<br>";
} catch (Exception $e) {
    echo "❌ Veri okuma: HATA - " . $e->getMessage() . "<br>";
    exit;
}

// 4. AJAX endpoint test
echo "<br><h2>AJAX Test</h2>";
echo "<a href='francis-basvuru.php?get_all_basvuru=1' target='_blank'>AJAX endpointi test et</a><br>";

echo "<br><h2>✅ Her şey hazır!</h2>";
echo "<a href='francis-basvuru.php'>francis-basvuru.php sayfasına git</a>";
?>
