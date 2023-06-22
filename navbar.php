<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link <?php if($page == "Menu Utama") echo "active"; ?>" href="index.php">Menu Utama</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page == "Data Siswa") echo "active"; ?>" href="data_siswa.php">Data Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page == "Rekap Absensi") echo "active"; ?>" href="rekap_absensi.php">Rekap Absensi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page == "Scan") echo "active"; ?>" href="scan.php">Scan</a>
            </li>
      </ul>
    </div>
  </div>
</nav>