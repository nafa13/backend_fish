<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'koneksi.php'; // Menggunakan koneksi.php yang sudah kamu upload

$jenis = $_POST['jenis']; // 'pakan' atau 'kuras'
$waktu = $_POST['waktu']; // Format 'HH:mm'

if (!empty($jenis) && !empty($waktu)) {
    // Masukkan ke database
    $query = "INSERT INTO jadwal (jenis_jadwal, waktu) VALUES ('$jenis', '$waktu')";
    
    if (mysqli_query($koneksi, $query)) {
        echo json_encode(["status" => "success", "message" => "Jadwal berhasil disimpan"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal menyimpan"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Data tidak lengkap"]);
}
?>