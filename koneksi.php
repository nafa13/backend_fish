<?php
$koneksi = new mysqli("localhost", "root", "", "fish_db");

if ($koneksi->connect_error) {
    die("Gagal konek DB: " . $koneksi->connect_error);
}
?>
