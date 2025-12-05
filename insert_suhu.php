<?php
include "koneksi.php";

if (!isset($_POST['suhu'])) {
    echo "ERROR: no data";
    exit;
}

$suhu = $_POST['suhu'];

$sql = "INSERT INTO sensor_suhu (nilai, waktu) VALUES ('$suhu', NOW())";

if ($koneksi->query($sql)) {
    echo "OK";
} else {
    echo "ERROR";
}
?>
