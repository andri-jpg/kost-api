<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../koneksi.php';


// Fungsi untuk mendapatkan daftar kost yang telah dipesan oleh pengguna berdasarkan ID pengguna (user ID) dengan status tertentu
function getBookedKostsByUserId($pdo, $user_id) {
    $stmt = $pdo->prepare("SELECT k.*, b.status AS booking_status FROM kosts k INNER JOIN booking_status b ON k.kost_id = b.kost_id WHERE b.user_id = ?");
    $stmt->execute([$user_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


// Main Program
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];
    $booked_kosts = getBookedKostsByUserId($pdo, $user_id);
    echo json_encode($booked_kosts);
}
?>
