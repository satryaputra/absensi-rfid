<?php

require "koneksi.php";

// baca mode terakhir
$mode = mysqli_query($koneksi, "SELECT * FROM `status`");
$data_mode = mysqli_fetch_assoc($mode);
$mode_absen = $data_mode["mode"];

$mode_absen = $mode_absen + 1;
if($mode_absen > 2) {
    $mode_absen = 1;
}

$simpan = mysqli_query($koneksi, "UPDATE `status` SET mode = '$mode_absen'");
if($simpan)
    echo "Berhasil mengubah mode.";
else
    echo "Gagal mengubah mode.";

?>