<?php

require "koneksi.php";
$query = "SELECT * FROM siswa";
$data_siswa = mysqli_query($koneksi, $query);
$no = 1;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require "header.php"; 
        $page = "Data Siswa";
    ?>

    <title><?= $page; ?></title>
</head>
<body>
    <?php require "navbar.php"; ?>    

    <!-- main -->
    <div class="container">
        <h2 class="mt-4">Data Siswa</h2>
        <a href="tambah_siswa.php">
            <button type="button" class="btn btn-primary float-end mb-3">Tambah Data Siswa</button>
        </a>

        <table class="table table-hover table-bordered border-dark text-center">
            <thead>
                <tr class="fw-bold bg-secondary" style="color: white;">
                    <td style="width: 50px;">No.</td>
                    <td style="width: 175px;">No. Kartu</td>
                    <td style="width: 300px;">Nama</td>
                    <td>Alamat</td>
                    <td style="width: 150px;">Opsi</td>
                </tr>
            </thead>
            <tbody>
                <?php while($data = mysqli_fetch_assoc($data_siswa)) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data["nokartu"]; ?></td>
                    <td><?= $data["nama"]; ?></td>
                    <td class="text-start"><?= $data["alamat"] ?></td>
                    <td >
                        <a href="edit_siswa.php?id=<?= $data["id"]; ?>" class="text-decoration-none">
                            Edit 
                        </a>
                        |
                        <a href="hapus_siswa.php?id=<?= $data["id"]; ?>" class="text-decoration-none">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php $no++; endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>