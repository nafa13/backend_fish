<?php
header("Content-Type: application/json; charset=UTF-8");
include 'koneksi.php';

// Ambil jam server saat ini (Format Jam:Menit)
date_default_timezone_set('Asia/Jakarta'); // Sesuaikan zona waktu
$jam_sekarang = date('H:i');

// Cari apakah ada jadwal yang COCOK dengan jam sekarang
$query = "SELECT * FROM jadwal WHERE waktu LIKE '$jam_sekarang%' AND aktif = 1 LIMIT 1";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    // Kirim respon ke ESP32
    echo json_encode([
        "perintah" => "JALAN", 
        "jenis" => $data['jenis_jadwal'] // 'pakan' atau 'kuras'
    ]);
} else {
    echo json_encode(["perintah" => "DIAM"]);
}
?>