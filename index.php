<?php 
require "fungsi.php";

// ambil data transaksi join pembeli & barang
$transaksi = tampil("
    SELECT 
        t.id_transaksi, 
        b.nama_barang, 
        p.nama_pembeli, 
        t.jumlah, 
        t.total_harga, 
        t.tanggal_transaksi
    FROM transaksi t
    JOIN barang b ON t.id_barang = b.id_barang
    JOIN pembeli p ON t.id_pembeli = p.id_pembeli
    ORDER BY t.id_transaksi DESC
");
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
      background-color: #f8f9fa; /* abu soft */
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
    <!-- Hero Section -->
    <div class="hero">
      <h1>Selamat Datang di Dashboard</h1>
      <p>Kelola data barang, pembeli, dan transaksi dengan mudah</p>
      <!-- Tombol menuju form pembelian -->
      <a href="form_pembelian.php" class="btn btn-light btn-lg mt-3">
        + Tambah Pembelian
      </a>
    </div>

    <!-- Menu Cards -->
    <div class="row g-4 mb-5">
      <div class="col-md-4">
        <a href="barang.php" class="text-decoration-none">
          <div class="card p-4 text-center">
            <h5>Data Barang</h5>
            <p>Kelola stok, harga, dan informasi barang dengan cepat.</p>
            <button class="btn btn-primary">Lihat Barang</button>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="pembeli.php" class="text-decoration-none">
          <div class="card p-4 text-center">
            <h5>Data Pembeli</h5>
            <p>Kelola data pembeli, alamat, dan kontak dengan rapi.</p>
            <button class="btn btn-primary">Lihat Pembeli</button>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="transaksi.php" class="text-decoration-none">
          <div class="card p-4 text-center">
            <h5>Data Transaksi</h5>
            <p>Kelola transaksi, riwayat pembelian, dan laporan.</p>
            <button class="btn btn-primary">Lihat Transaksi</button>
          </div>
        </a>
      </div>
    </div>

    <!-- Tabel Join Transaksi -->
    <div class="card p-4">
      <h3 class="mb-3 text-primary">Ringkasan Transaksi Terbaru</h3>
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
          <thead class="table-primary">
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Nama Pembeli</th>
              <th>Jumlah</th>
              <th>Total Harga</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($transaksi)) : ?>
              <tr><td colspan="6">Belum ada transaksi</td></tr>
            <?php else: ?>
              <?php $i=1; foreach ($transaksi as $t): ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $t["nama_barang"]; ?></td>
                <td><?= $t["nama_pembeli"]; ?></td>
                <td><?= $t["jumlah"]; ?></td>
                <td><?= number_format($t["total_harga"],0,',','.'); ?></td>
                <td><?= $t["tanggal_transaksi"]; ?></td>
              </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
