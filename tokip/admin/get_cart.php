<?php
require '../inc/brain.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $stmt = $pdo->query("
        SELECT COUNT(DISTINCT ip_adresi) as aktif_sepet
        FROM sepet 
        WHERE urunler IS NOT NULL AND urunler != '[]'
    ");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        'count' => (int)($row['aktif_sepet'] ?? 0)
    ]);
} catch (Throwable $e) {
    echo json_encode([
        'count' => 0,
        'error' => $e->getMessage()
    ]);
}
