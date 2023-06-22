<?php

require "koneksi.php";

date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d");

// filtering
$ambil_data = mysqli_query($koneksi, "SELECT b.nokartu, b.nama, a.tanggal, a.ruang, a.jam_masuk, a.jam_pulang FROM absensi a, siswa b WHERE a.nokartu = b.nokartu AND a.tanggal = '$tanggal'");

$no = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require "header.php"; 
        $page = "Rekap Absensi";
    ?>

    <title><?= $page; ?></title>
</head>
<body>
    <?php require "navbar.php"; ?>    

    <div class="container-fluid">
        <h2 class="mt-5 mb-4 mx-2">Rekap Absensi</h2>

        <table class="table table-hover table-bordered border-dark text-center">
            <thead>
                <tr class="fw-bold bg-secondary" style="color: white;">
                    <td style="width: 50px;">No.</td>
                    <td style="width: 200px;">No. Kartu</td>
                    <td style="width: 350px;">Nama</td>
                    <td style="width: 200px;">Tanggal</td>
                    <td>Ruang</td>
                    <td style="width: 200px;">Jam Masuk</td>
                    <td style="width: 200px;">Jam Pulang</td>
                </tr>
            </thead>
            <tbody>
                <?php while($data = mysqli_fetch_assoc($ambil_data)) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data["nokartu"]; ?></td>
                    <td><?= $data["nama"]; ?></td>
                    <td><?= $data["tanggal"]; ?></td>
                    <td><?= $data["ruang"]; ?></td>
                    <td><?= $data["jam_masuk"]; ?></td>
                    <td><?= $data["jam_pulang"]; ?></td>
                </tr>
                <?php $no++; endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>