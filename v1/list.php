<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include '../koneksi.php';

// Fungsi untuk mendapatkan semua data kosts
function getKosts($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM kosts");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Main Program
$kosts = getKosts($pdo);
echo json_encode($kosts);
?>
