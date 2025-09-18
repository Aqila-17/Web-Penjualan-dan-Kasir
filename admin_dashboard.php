<?php 
require "fungsi.php";
session_start();


if (
    !isset($_SESSION["login"]) ||
    !in_array($_SESSION["role"], ["admin", "superadmin"])
) {
    header("Location: index.php");
    exit;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: "Segoe UI", sans-serif;
    }
    .hero {
      background: linear-gradient(135deg, #0d6efd, #084298);
      color: white;
      padding: 60px 20px;
      border-radius: 12px;
      text-align: center;
      margin-bottom: 40px;
    }
    .hero h1 {
      font-weight: bold;
      font-size: 2.5rem;
    }
    .hero p {
      font-size: 1.2rem;
      opacity: 0.9;
    }
    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      transition: transform 0.2s;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card h5 {
      color: #0d6efd;
      font-weight: 600;
    }
  </style>
</head>
<body>

  <?php include "navbar.php"; ?>

  <div class="container my-5">
   
    <div class="hero">
      <h1>Selamat Datang, <?= $_SESSION["username"]; ?>!</h1>
      <p>Anda login sebagai <strong><?= $_SESSION["role"]; ?></strong></p>
      <div class="mt-3">
        <a href="logout.php" class="btn btn-outline-light">Logout</a>
      </div>
    </div>

    
    <div class="row g-4 mb-5">
      <div class="col-md-4">
        <a href="barangp.php" class="text-decoration-none">
          <div class="card p-4 text-center">
            <h5>Data Barang</h5>
            <p>Kelola stok, harga, dan informasi barang dengan cepat.</p>
            <button class="btn btn-primary">Lihat Barang</button>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="pembelip.php" class="text-decoration-none">
          <div class="card p-4 text-center">
            <h5>Data Pembeli</h5>
            <p>Kelola data pembeli, alamat, dan kontak dengan rapi.</p>
            <button class="btn btn-primary">Lihat Pembeli</button>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="transaksip.php" class="text-decoration-none">
          <div class="card p-4 text-center">
            <h5>Data Transaksi</h5>
            <p>Kelola transaksi, riwayat pembelian, dan laporan.</p>
            <button class="btn btn-primary">Lihat Transaksi</button>
          </div>
        </a>
      </div>
    </div>

   
    

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
