<?php 
require "fungsi.php";
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
              <th>Aksi</th>
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
                  <td>
                    <a href="tambah_stok.php" class="btn btn-primary btn-sm">Tambah Stok</a>
                    <a href="edit.php?id_barang=<?= $rows['id_barang']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="hapus.php?id_barang=<?= $rows['id_barang']; ?>" onclick="return confirm('Yakin hapus barang ini?')" class="btn btn-outline-primary btn-sm">Delete</a>
                  </td>
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


