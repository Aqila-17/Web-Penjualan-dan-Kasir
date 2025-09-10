<?php 
require "fungsi.php";
$barang = tampil("SELECT * FROM barang");


if (isset($_POST["tambahStok"])) {
    $id_barang = $_POST["id_barang"];
    $jumlah_tambah = (int)$_POST["jumlah"];

    
    $stok_lama = tampil("SELECT stok FROM barang WHERE id_barang = $id_barang")[0]["stok"];
    $stok_baru = $stok_lama + $jumlah_tambah;

    
    global $conn;
    $update = mysqli_query($conn, "UPDATE barang SET stok = $stok_baru WHERE id_barang = $id_barang");

    if ($update) {
        echo "<script>alert('Stok berhasil ditambahkan!'); window.location='barang.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan stok');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Stok</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include "navbar.php"; ?>

  <div class="container my-4">
    <h2 class="mb-3">Tambah Stok Barang</h2>
    <form method="post" class="card p-4">
      <div class="mb-3">
        <label class="form-label fw-bold">Pilih Barang</label>
        <?php if (empty($barang)) : ?>
          <p>Tidak ada barang tersedia</p>
        <?php else: ?>
          <?php foreach ($barang as $rows): ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="id_barang" id="barang<?= $rows['id_barang']; ?>" value="<?= $rows['id_barang']; ?>" required>
              <label class="form-check-label" for="barang<?= $rows['id_barang']; ?>">
                <?= $rows["nama_barang"]; ?> (Stok: <?= $rows["stok"]; ?>)
              </label>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="jumlah" class="form-label fw-bold">Jumlah Tambah</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" required>
      </div>

      <button type="submit" name="tambahStok" class="btn btn-primary">Tambah Stok</button>
      <a href="barang.php" class="btn btn-outline-primary">Kembali</a>
    </form>
  </div>
</body>
</html>
