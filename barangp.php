<?php 
require "fungsi.php";
session_start();
if (
    !isset($_SESSION["login"]) ||
    !in_array($_SESSION["role"], ["superadmin", "inventory", "admin"])
) {
    header("Location: index.php");
    exit;
}
$barang = tampil("SELECT * FROM barang");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include "navbar.php"; ?>

  <div class="container my-4">
    <h2 class="mb-3">Data Barang</h2>
    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Barang</a>
    <div class="card p-3">
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
          <thead class="table-primary">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Stok</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($barang)) : ?>
              <tr><td colspan="5">Tidak ada data</td></tr>
            <?php else: ?>
              <?php foreach ($barang as $rows): ?>
                <tr>
                  <td><?= $rows["id_barang"]; ?></td>
                  <td><?= $rows["nama_barang"]; ?></td>
                  <td><?= $rows["stok"]; ?></td>
                  <td><?= $rows["harga"]; ?></td>
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


