<?php

require "koneksi.php";
$query = "SELECT nokartu FROM tmp_rfid";
$ambil_data = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($ambil_data);

$nokartu = isset($data["nokartu"]) ? $data["nokartu"] : NULL;

?>

<div class="mb-3">
    <label for="nokartu" class="form-label fw-medium">No. Kartu :</label>
    <input type="text" class="form-control border-secondary" name="nokartu" id="nokartu" placeholder="Tempelkan kartu RFID Anda ke sensor" style="width: 400px;" value="<?= $nokartu ?>">
</div>