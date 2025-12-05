<?php
// --- HEADER WAJIB UNTUK FLUTTER WEB (CHROME) ---
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Tangani permintaan "OPTIONS" (Pre-flight check dari Chrome)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

header("Content-Type: application/json; charset=UTF-8");

// Koneksi Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "fish_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connect failed"]);
    exit();
}

// Menerima data
$username = $_POST['username'] ?? ''; // Pakai ?? '' agar tidak error jika kosong
$password = $_POST['password'] ?? '';

// Cek user
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $userData = mysqli_fetch_assoc($result);
    echo json_encode([
        "status" => "success",
        "message" => "Login Berhasil",
        "data" => $userData
    ]);
} else {
    echo json_encode([
        "status" => "failed",
        "message" => "Username atau Password salah"
    ]);
}
?>