<?php

include '../koneksi.php';

// Fungsi untuk melakukan pencarian kost berdasarkan kriteria tertentu
function searchKosts($pdo, $query) {
    $stmt = $pdo->prepare("SELECT * FROM kosts WHERE nama_kost LIKE ? OR lokasi LIKE ?");
    $stmt->execute(["%$query%", "%$query%"]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Main Program
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["query"])) {
    $query = $_GET["query"];
    $search_result = searchKosts($pdo, $query);
    echo json_encode($search_result);
}

?>
