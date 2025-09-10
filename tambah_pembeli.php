<?php
require "fungsi.php";

if (isset($_POST["submit"])) {
    if (tambahPembeli($_POST) > 0) {
        echo "
            <script>
                alert('Data pembeli berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal menambahkan data!');
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
    <title>Tambah Pembeli</title>
</head>
<body>
    <h1>Tambah Data Pembeli</h1>
    <form action="" method="post">
        <label>Nama:</label><br>
        <input type="text" name="nama_pembeli" required><br><br>
        <label>Alamat:</label><br>
        <input type="text" name="alamat" required><br><br>
        <label>No HP:</label><br>
        <input type="text" name="no_hp" required><br><br>
        <button type="submit" name="submit">Tambah</button>
    </form>
</body>
</html>
