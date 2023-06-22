<?php

require "koneksi.php";
if(isset($_POST["tombolSimpan"])){
    $nokartu = $_POST["nokartu"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];

    $query = "INSERT INTO siswa (nokartu, nama, alamat) VALUES ('$nokartu', '$nama', '$alamat')";

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

    // pengosongan tabel tmp_rfid
    mysqli_query($koneksi, "DELETE FROM tmp_rfid");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "header.php"; ?>
    <script>
        $(document).ready(function(){
            setInterval(function(){
                $("#nokartu").load("nokartu.php")
            }, 0);
        });
    </script>
    <title>Tambah Data Siswa</title>
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- main -->
    <div class="container-fluid">
        <h3 class="mt-5 ms-2 mb-4">Tambah Data Siswa</h3>

        <!-- form input -->
        <form action="" method="POST" class="ms-4">
            <div id="nokartu"></div>
            <div class="mb-3">
                <label for="nama" class="form-label fw-medium">Nama :</label>
                <input type="text" class="form-control border-secondary" name="nama" id="nama" placeholder="Masukan nama Anda" style="width: 400px;" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label fw-medium">Alamat :</label>
                <textarea class="form-control border-secondary" name="alamat" id="alamat" rows="5" placeholder="Tuliskan alamat Anda" style="width: 
                400px;" autocomplete="off"></textarea>
            </div>
            <button type="submit" name="tombolSimpan" id="tombolSimpan" class="btn btn-primary">Kirim!</button>
        </form>
    </div>
</body>
</html>