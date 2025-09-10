<?php
require "fungsi.php";

$id = $_GET["id"];
$pembeli = tampil("SELECT * FROM pembeli WHERE id_pembeli = $id")[0];

if (isset($_POST["submit"])) {
    if (editPembeli($_POST) > 0) {
        echo "
            <script>
                alert('Data pembeli berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal mengubah data!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pembeli</title>
</head>
<body>
    <h1>Edit Data Pembeli</h1>
    <form action="" method="post">
        <input type="hidden" name="id_pembeli" value="<?= $pembeli["id_pembeli"]; ?>">
        <label>Nama:</label><br>
        <input type="text" name="nama_pembeli" value="<?= $pembeli["nama_pembeli"]; ?>" required><br><br>
        <label>Alamat:</label><br>
        <input type="text" name="alamat" value="<?= $pembeli["alamat"]; ?>" required><br><br>
        <label>No HP:</label><br>
        <input type="text" name="no_hp" value="<?= $pembeli["no_hp"]; ?>" required><br><br>
        <button type="submit" name="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
