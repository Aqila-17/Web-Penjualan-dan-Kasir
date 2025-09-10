<?php 
require 'fungsi.php';

$id = $_GET["id_barang"];

if (hapus($id) > 0) {
   
    header("Location: index.php?pesan=hapus_sukses");
    exit;
} else {
    
    header("Location: index.php?pesan=hapus_gagal");
    exit;
}
?>
