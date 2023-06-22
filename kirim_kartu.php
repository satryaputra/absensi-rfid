<?php

require "koneksi.php";

// baca data dari NodeMCU
$nokartu = $_GET["nokartu"];
$ruang = $_GET["ruang"];

// kosongkan tmp_rfid
mysqli_query($koneksi, "DELETE FROM tmp_rfid");

$simpan = mysqli_query($koneksi, "INSERT INTO tmp_rfid (nokartu, ruang) VALUES ('$nokartu', '$ruang')");

if($simpan)
    echo "Berhasil memasukan data kartu pengenal Anda";
else
    echo "Gagal memasukan data kartu pengenal Anda";
?>