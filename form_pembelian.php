<?php 
require "fungsi.php";
session_start();
if (
    !isset($_SESSION["login"]) ||
    !in_array($_SESSION["role"], ["superadmin", "kasir", "admin"])
) {
    header("Location: index.php");
    exit;
}
$barang = tampil("SELECT * FROM barang");
$barang = tampil("SELECT * FROM barang");

if (isset($_POST["beli"])) {
    $nama_pembeli = $_POST["nama_pembeli"];
    $alamat       = $_POST["alamat"];
    $no_hp        = $_POST["no_hp"];
    $id_barang    = $_POST["id_barang"];
    $jumlah       = (int) $_POST["jumlah"];

    $hasil = tambahPembelianBaru($nama_pembeli, $alamat, $no_hp, $id_barang, $jumlah);

    if ($hasil == "stok_kurang") {
        echo "<script>alert('Stok barang tidak mencukupi!');</script>";
    } elseif ($hasil == "sukses") {
        echo "<script>alert('Pembelian berhasil!'); window.location.href='transaksi.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat pembelian');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pembelian</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include "navbar.php"; ?>

  <div class="container my-4">
    <h2 class="mb-3">Form Pembelian</h2>
    <div class="card p-4">
      <form action="" method="POST">
        <!-- Input pembeli manual -->
        <div class="mb-3">
          <label class="form-label">Nama Pembeli</label>
          <input type="text" name="nama_pembeli" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea name="alamat" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">No HP</label>
          <input type="text" name="no_hp" class="form-control" required>
        </div>

        <!-- Pilih barang -->
        <div class="mb-3">
          <label class="form-label">Pilih Barang</label>
          <select name="id_barang" class="form-select" required>
            <option value="">-- Pilih Barang --</option>
            <?php foreach($barang as $b): ?>
              <option value="<?= $b["id_barang"]; ?>">
                <?= $b["nama_barang"]; ?> (Stok: <?= $b["stok"]; ?> | Harga: <?= number_format($b["harga"],0,',','.'); ?>)
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Jumlah -->
        <div class="mb-3">
          <label class="form-label">Jumlah</label>
          <input type="number" name="jumlah" min="1" class="form-control" required>
        </div>

        <button type="submit" name="beli" class="btn btn-primary">Beli</button>
        <a href="transaksi.php" class="btn btn-outline-secondary">Kembali</a>
      </form>
    </div>
  </div>
</body>
</html>
