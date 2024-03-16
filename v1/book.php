<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../koneksi.php';

// Fungsi untuk mengecek apakah pengguna telah melakukan booking sebelumnya dengan status "pending"
function hasPendingBooking($pdo, $user_id) {
    $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM booking_status WHERE user_id = ? AND status = 'pending'");
    $stmt->execute([$user_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'] > 0;
}

// Fungsi untuk menambahkan booking baru
function bookKost($pdo, $user_id, $kost_id) {
    $status = "pending"; // Status booking baru
    $stmt = $pdo->prepare("INSERT INTO booking_status (user_id, kost_id, status) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $kost_id, $status]);
}

// Main Program
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Pastikan data yang dibutuhkan tersedia
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['user_id']) && isset($data['kost_id'])) {
        $user_id = $data['user_id'];
        $kost_id = $data['kost_id'];
        // Periksa apakah pengguna telah melakukan booking sebelumnya dengan status "pending"
        if (hasPendingBooking($pdo, $user_id)) {
            // Jika pengguna telah melakukan booking sebelumnya dengan status "pending", tolak permintaan
            http_response_code(400); // Bad request
            echo json_encode(array("message" => "Maaf, Anda telah melakukan booking sebelumnya yang masih dalam status pending. Setiap pengguna hanya bisa melakukan satu booking yang masih dalam proses."));
        } else {
            // Jika pengguna belum melakukan booking sebelumnya dengan status "pending", lakukan booking
            bookKost($pdo, $user_id, $kost_id);
            echo json_encode(array("message" => "Booking berhasil ditambahkan."));
        }
    } else {
        // Data tidak lengkap
        http_response_code(400); // Bad request
        echo json_encode(array("message" => "Gagal menambahkan booking. Data tidak lengkap."));
    }
} else {
    // Metode request tidak diizinkan
    http_response_code(405); // Method not allowed
    echo json_encode(array("message" => "Metode request tidak diizinkan."));
}

?>
