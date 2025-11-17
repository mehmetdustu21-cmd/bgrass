<?php
require 'inc/brain.php';

header('Content-Type: application/json');

$ip = $_POST['ip'] ?? '';
$mesaj = $_POST['mesaj'] ?? '';
$sil = $_POST['sil'] ?? false;

if (!$ip || !filter_var($ip, FILTER_VALIDATE_IP)) {
    echo json_encode(['success' => false, 'message' => 'Geçersiz IP']);
    exit;
}

if ($sil) {
    $stmt = $pdo->prepare("DELETE FROM ozel_mesajlar WHERE ip_address = ?");
    $deleted = $stmt->execute([$ip]);
    if ($deleted) {
        echo json_encode(['success' => true, 'message' => 'Özel mesaj silindi.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Silme başarısız oldu.']);
    }
    exit;
}

if (!$mesaj) {
    echo json_encode(['success' => false, 'message' => 'Mesaj boş olamaz']);
    exit;
}

$pdo->prepare("DELETE FROM ozel_mesajlar WHERE ip_address = ?")->execute([$ip]);

$stmt = $pdo->prepare("INSERT INTO ozel_mesajlar (ip_address, mesaj, created_at) VALUES (?, ?, NOW())");
$success = $stmt->execute([$ip, $mesaj]);

if ($success) {
    echo json_encode(['success' => true, 'message' => 'Mesaj başarıyla gönderildi.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Mesaj gönderilemedi.']);
}
