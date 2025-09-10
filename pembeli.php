<?php 
require "fungsi.php";
$pembeli = tampil("SELECT * FROM pembeli");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pembeli</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include "navbar.php"; ?>

  <div class="container my-4">
    <h2 class="mb-3">Data Pembeli</h2>
    <a href="tambah_pembeli.php" class="btn btn-primary mb-3">+ Tambah Pembeli</a>
    <div class="card p-3">
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
          <thead class="table-primary">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>No HP</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($pembeli)) : ?>
              <tr><td colspan="5">Tidak ada data</td></tr>
            <?php else: ?>
              <?php foreach ($pembeli as $rows): ?>
                <tr>
                  <td><?= $rows["id_pembeli"]; ?></td>
                  <td><?= $rows["nama_pembeli"]; ?></td>
                  <td><?= $rows["alamat"]; ?></td>
                  <td><?= $rows["no_hp"]; ?></td>
                  <td>
                    <a href="edit_pembeli.php?id=<?= $rows['id_pembeli']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="hapus_pembeli.php?id=<?= $rows['id_pembeli']; ?>" onclick="return confirm('Yakin hapus pembeli ini?')" class="btn btn-outline-primary btn-sm">Delete</a>
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
