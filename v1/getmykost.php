<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



include '../koneksi.php';

// Fungsi untuk mendapatkan nama kost berdasarkan user id (khusus untuk penyedia kost)
function getKostsByUserId($pdo, $user_id) {
    $stmt = $pdo->prepare("SELECT * FROM kosts WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Main Program
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];
    $my_kosts = getKostsByUserId($pdo, $user_id);
    echo json_encode($my_kosts);
}
?>
