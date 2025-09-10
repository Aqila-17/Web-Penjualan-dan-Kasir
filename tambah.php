<?php 

require "fungsi.php";

$barang = tampil($query = "SELECT * FROM barang");

if(isset($_GET["kirim"])) {
 if(tambah($_GET)>0) {
    ?>
    <script>
        alert('data berhasil di tambahkan');
        document.location.href = 'index.php';
    </script>

<?php
        }else{
            echo "
            <script>
            alert('data gagal di tambahkan');
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
    <title>Form Tambah</title>
</head>
<body>
    <h1>Menambah Data</h1>
    <form action="" method="get">
        <label for="nama_barang">Nama</label>
        <input type="text" name="nama_barang" id="nama">

        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok">

        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga">

        <input type="submit" name="kirim" value="Tambah Data">
    </form>
</body>
</html>