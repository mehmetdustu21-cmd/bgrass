<?php
require_once 'brain.php';
session_start();
header('Content-Type: application/json');


if (!isset($_SESSION['yetkili_id'])) {
	http_response_code(401);
	echo json_encode(['success' => false, 'message' => 'Yetkisiz erişim.']);
	exit;
}

$field = $_POST['field'] ?? null;
$value = trim($_POST['value'] ?? '');

$allowedFields = ['yetkiliadi', 'parola', 't_token'];

if (!in_array($field, $allowedFields, true)) {
	http_response_code(400);
	echo json_encode(['success' => false, 'message' => 'Geçersiz alan.']);
	exit;
}
if ($field === 'parola') {
	if (strlen($value) < 8) {
		echo json_encode(['success' => false, 'message' => 'Parola en az 8 karakter olmalı.']);
		exit;
	}
	$field = 'parola_hash';
	$value = md5($value);
}

if ($field === 't_token') {
	$t_token = $value;
	$chat_id = $_POST['chat_id'] ?? '';

	$stmt = $pdo->prepare("UPDATE panel SET t_token = :token, chat_id = :chat_id WHERE id = 1");
	$stmt->execute([
		':token' => $t_token,
		':chat_id' => $chat_id
	]);



	$response = @file_get_contents($url);

	if ($response === false) {
		echo json_encode(['success' => false, 'message' => 'Lütfen geçerli bilgiler girin.']);
		exit;
	}

	echo json_encode(['success' => true]);
	exit;
}


try {
	$stmt = $pdo->prepare("UPDATE yetkili SET $field = :value, guncelleme_tarihi = NOW() WHERE id = :id");
	$stmt->execute([
		':value' => $value,
		':id' => $_SESSION['yetkili_id']
	]);

	echo json_encode(['success' => true]);
} catch (PDOException $e) {
	http_response_code(500);
	echo json_encode(['success' => false, 'message' => 'Veritabanı hatası.']);
}
?>