<?php
require "fungsi.php";

$id = $_GET["id"];
if (hapusPembeli($id) > 0) {
    echo "
        <script>
            alert('Data pembeli berhasil dihapus!');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus data!');
            document.location.href = 'index.php';
        </script>
    ";
}
?>
