<?php
$koneksi = new mysqli("localhost", "root", "", "db_iot");

if ($koneksi->connect_error) {
    die("Gagal konek DB: " . $koneksi->connect_error);
}
?>
