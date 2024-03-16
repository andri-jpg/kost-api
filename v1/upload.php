<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../koneksi.php';

// Fungsi untuk menambahkan data kost baru
function addKost($pdo, $data) {
    $nama_kost = $data['nama_kost'];
    $lokasi = $data['lokasi'];
    $jumlah_kamar = $data['jumlah_kamar'];
    $fasilitas = $data['fasilitas'];
    $harga_per_bulan = $data['harga_per_bulan'];
    $deskripsi = $data['deskripsi'];

    $stmt = $pdo->prepare("INSERT INTO kosts (nama_kost, lokasi, jumlah_kamar, fasilitas, harga_per_bulan, deskripsi) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nama_kost, $lokasi, $jumlah_kamar, $fasilitas, $harga_per_bulan, $deskripsi]);
}

// Main Program
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    addKost($pdo, $data);
    echo "Data kost telah ditambahkan.";
}
?>
