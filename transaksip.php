<?php 
require "fungsi.php";
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["role"] !== "superadmin") {
    header("Location: admin_dashboard.php");
    exit;
}
$transaksi = tampil("SELECT * FROM transaksi");
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Transaksi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include "navbar.php"; ?>

  <div class="container my-4">
    <h2 class="mb-3">Data Transaksi</h2>
    <div class="card p-3">
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
          <thead class="table-primary">
            <tr>
              <th>No</th>
              <th>ID Barang</th>
              <th>ID Pembeli</th>
              <th>Jumlah</th>
              <th>Total</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($transaksi)) : ?>
              <tr><td colspan="6">Belum ada transaksi</td></tr>
            <?php else: ?>
              <?php foreach ($transaksi as $rows): ?>
                <tr>
                  <td><?= $rows["id_transaksi"]; ?></td>
                  <td><?= $rows["id_barang"]; ?></td>
                  <td><?= $rows["id_pembeli"]; ?></td>
                  <td><?= $rows["jumlah"]; ?></td>
                  <td><?= $rows["total_harga"]; ?></td>
                  <td><?= $rows["tanggal_transaksi"]; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
