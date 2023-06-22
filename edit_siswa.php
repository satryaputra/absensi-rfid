<?php

require "koneksi.php";

$id = $_GET["id"];
$cari_id = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id = '$id'");
$hasil_id = mysqli_fetch_assoc($cari_id);

if(isset($_POST["tombolSimpan"])){
    $nokartu = $_POST["nokartu"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];

    $query = "UPDATE siswa SET nokartu = '$nokartu', nama = '$nama', alamat = '$alamat' WHERE id = $id";

    $simpan = mysqli_query($koneksi, $query);
    if($simpan){
        echo "<script>
                alert('Data berhasil tersimpan!')
                window.location = 'data_siswa.php'
             </script>";
    } else {
        echo "<script>
                alert('Data gagal tersimpan!')
             </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "header.php"; ?>
    <title>Tambah Data Siswa</title>
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- main -->
    <div class="container-fluid">
        <h3 class="mt-5 ms-2 mb-4">Tambah Data Siswa</h3>

        <!-- form input -->
        <form action="" method="POST" class="ms-4">
            <div class="mb-3">
                <label for="nokartu" class="form-label fw-medium">No. Kartu :</label>
                <input type="text" class="form-control border-secondary" name="nokartu" id="nokartu" placeholder="Tempelkan kartu RFID Anda ke sensor" style="width: 400px;" value="<?= $hasil_id["nokartu"] ?>">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label fw-medium">Nama :</label>
                <input type="text" class="form-control border-secondary" name="nama" id="nama" placeholder="Masukan nama Anda" style="width: 400px;" value="<?= $hasil_id["nama"] ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label fw-medium">Alamat :</label>
                <textarea class="form-control border-secondary" name="alamat" id="alamat" rows="5" placeholder="Tuliskan alamat Anda" style="width: 
                400px;"><?= $hasil_id["alamat"] ?></textarea>
            </div>
            <button type="submit" name="tombolSimpan" id="tombolSimpan" class="btn btn-primary">Kirim!</button>
        </form>
    </div>
</body>
</html>