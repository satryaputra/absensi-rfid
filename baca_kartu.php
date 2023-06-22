<?php

require "koneksi.php";
$ambil_data = mysqli_query($koneksi, "SELECT * FROM status");
$data = mysqli_fetch_assoc($ambil_data);

$mode_absen = $data["mode"];
$mode = "";
if($mode_absen == 1){
    $mode = "Masuk";
} else if ($mode_absen == 2) {
    $mode = "Pulang";
}

// baca tabel tmp_rfid
$baca_kartu = mysqli_query($koneksi, "SELECT * FROM tmp_rfid");
$data_kartu = mysqli_fetch_array($baca_kartu);
$nokartu = isset($data_kartu["nokartu"]) ? $data_kartu["nokartu"] : "";
$ruang = isset($data_kartu["ruang"]) ? $data_kartu["ruang"] : "";
?>

<?php if($nokartu == "") : ?>
    <h3 style="margin-top: 11%;">Silahkan tempelkan kartu RFID Anda</h3>
    <img src="images/rfid.png" alt="" width="200px">
    <br>
    <h2>Absen : <?= $mode; ?></h2>
    <img src="images/animasi2.gif" alt="">
<?php else : ?>
    <?php
    $cari_siswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nokartu = '$nokartu'");
    $jumlah_siswa = mysqli_num_rows($cari_siswa);

    if($jumlah_siswa == 0) {
        echo "<h1 style=\"margin-top: 15%;\">Maaf! Kartu Tidak Dikenali</h1>";
    } else {
        // ambil nama siswa
        $data_siswa = mysqli_fetch_assoc($cari_siswa);
        $nama_siswa = $data_siswa["nama"];

        // tanggal dan jam hari ini
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d");
        $jam = date("H:i:s");

        // cek di tabel absensi
        $cari_absen = mysqli_query($koneksi, "SELECT * FROM absensi WHERE nokartu = '$nokartu' AND tanggal = '$tanggal'");
        $jumlah_absen = mysqli_num_rows($cari_absen);
        if($jumlah_absen == 0){
            echo "<h1 style=\"margin-top: 15%;\">Selamat Datang <br> $nama_siswa <br> di Ruang $ruang </h1>";
            mysqli_query($koneksi, "INSERT INTO `absensi` (`nokartu`, `tanggal`, `ruang`, `jam_masuk`) VALUES ('$nokartu', '$tanggal', '$ruang', '$jam')");
        } else {
            echo "<h1 style=\"margin-top: 15%;\">Sampai Jumpa Kembali <br> $nama_siswa </h1>";
            mysqli_query($koneksi, "UPDATE absensi SET jam_pulang = '$jam' WHERE nokartu ");
        }
    }
    // pengosongan tabel tmp_rfid
    mysqli_query($koneksi, "DELETE FROM tmp_rfid");
    ?>
<?php endif; ?>