<?php 
require "fungsi.php";
$id = $_GET['id_barang'];
$edit = tampil("SELECT * FROM barang WHERE id_barang = $id")[0];

if(isset($_GET["kirim"])) {
    if(edit($_GET)>0) {
        ?>
        <script>
            alert('data berhasil di update');
            document.location.href = 'index.php';
        </script>
        <?php
    } else {
        echo "
        <script>
        alert('data gagal di update');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit</title>
</head>
<body>
    <h1>Form Edit Barang</h1>
    <form action="" method="get">
        <input type="hidden" name="id_barang" value="<?= $edit['id_barang']; ?>">
        
        <p>
            <label for="nama_barang">Nama Barang</label><br>
            <input type="text" name="nama_barang" id="nama_barang" value="<?= $edit['nama_barang']; ?>">
        </p>
        
        <p>
            <label for="harga">Harga</label><br>
            <input type="number" name="harga" id="harga" value="<?= $edit['harga']; ?>">
        </p>
        
        <p>
            <label for="stok">Stok</label><br>
            <input type="number" name="stok" id="stok" value="<?= $edit['stok']; ?>">
        </p>
        
        <p>
            <button type="submit" name="kirim">Update</button>
        </p>
    </form>
</body>
</html>
