<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Utama</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Aplikasi Saya</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Menu Dashboard -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=dashboard">Dashboard</a>
        </li>

        <!-- Dropdown Master Data -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="masterDataDropdown" role="button" 
            data-bs-toggle="dropdown" aria-expanded="false">
            Master Data
          </a>
          <ul class="dropdown-menu" aria-labelledby="masterDataDropdown">
            <li><a class="dropdown-item" href="?page=anggota">Anggota</a></li>
            <?php if($_SESSION['role'] == 'admin') : ?>
              <li><a class="dropdown-item" href="?page=pengguna">Pengguna</a></li>
            <?php endif; ?>
          </ul>
        </li>

        <!-- Menu Transaksi -->
        <li class="nav-item">
          <a class="nav-link" href="#">Transaksi</a>
        </li>

        <!-- Menu Laporan -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" 
            data-bs-toggle="dropdown" aria-expanded="false">
            Laporan
          </a>
          <ul class="dropdown-menu" aria-labelledby="laporanDropdown">
            <li><a class="dropdown-item" target="_blank" href="report/anggota_report.php">Anggota</a></li>
            <?php if($_SESSION['role'] == 'admin') : ?>
              <li><a class="dropdown-item" href="?page=pengguna">Pengguna</a></li>
            <?php endif; ?>
          </ul>
        </li>

        <!-- Menu Logout -->
        <li class="nav-item">
          <a class="nav-link" href="login/logout.php" onclick="return confirm('apakah anda yakin ingin keluar dari halaman?')">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>