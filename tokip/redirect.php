<?php
require 'inc/brain.php';

$ip = $_POST['ip'] ?? '';
$target = $_POST['target'] ?? '';

if (filter_var($ip, FILTER_VALIDATE_IP) && !empty($target)) {
    $stmt = $pdo->prepare("INSERT INTO redirect_targets (ip_address, target_url) VALUES (?, ?)");
    $stmt->execute([$ip, $target]);
    echo 'ok';
} else {
    echo 'invalid';
}
?>