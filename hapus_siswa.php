<?php

require "koneksi.php";

$id = $_GET["id"];
$hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE id = $id");

if($hapus) {
    echo "<script>
            alert('Data berhasil dihapus')
            window.location = 'data_siswa.php'
         </script>";
} else {
    echo "<script>
            alert('Data gagal tersimpan!')
            window.location = 'data_siswa.php'
         </script>";
}
?>