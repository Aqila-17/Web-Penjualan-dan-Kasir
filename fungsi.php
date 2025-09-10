<?php 
$conn = mysqli_connect("localhost", "root", "", "db_trigger");


function tampil($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $conn;
    $nama  = $data["nama_barang"];
    $stok  = $data["stok"];
    $harga = $data["harga"];

    $query = "INSERT INTO barang VALUES ('', '$nama', '$stok', '$harga')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function edit($data) {
    global $conn;
    $id    = $data["id_barang"];
    $nama  = $data["nama_barang"];
    $stok  = $data["stok"];
    $harga = $data["harga"];
    
    $query = "UPDATE barang 
              SET nama_barang = '$nama', 
                  stok = '$stok', 
                  harga = '$harga' 
              WHERE id_barang = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    $query = "DELETE FROM barang WHERE id_barang = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function tambahPembeli($data){
    global $conn;
    $nama   = $data["nama_pembeli"];
    $alamat = $data["alamat"];
    $no_hp  = $data["no_hp"];

    $query = "INSERT INTO pembeli VALUES ('', '$nama', '$alamat', '$no_hp')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editPembeli($data){
    global $conn;
    $id     = $data["id_pembeli"];
    $nama   = $data["nama_pembeli"];
    $alamat = $data["alamat"];
    $no_hp  = $data["no_hp"];

    $query = "UPDATE pembeli 
              SET nama_pembeli = '$nama',
                  alamat = '$alamat',
                  no_hp = '$no_hp'
              WHERE id_pembeli = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusPembeli($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM pembeli WHERE id_pembeli = $id");
    return mysqli_affected_rows($conn);
}

function tambahPembelianBaru($nama_pembeli, $alamat, $no_hp, $id_barang, $jumlah) {
    global $conn;

    // simpan pembeli baru
    mysqli_query($conn, "INSERT INTO pembeli (nama_pembeli, alamat, no_hp) 
                         VALUES ('$nama_pembeli', '$alamat', '$no_hp')");
    $id_pembeli = mysqli_insert_id($conn); // ambil id_pembeli terakhir

    // cek barang
    $barang = tampil("SELECT * FROM barang WHERE id_barang = $id_barang")[0];
    $stok   = $barang["stok"];
    $harga  = $barang["harga"];

    if ($jumlah > $stok) {
        return "stok_kurang";
    }

    $sisa    = $stok - $jumlah;
    $total   = $jumlah * $harga;
    $tanggal = date("Y-m-d H:i:s");

    // update stok
    mysqli_query($conn, "UPDATE barang SET stok = $sisa WHERE id_barang = $id_barang");

    // simpan transaksi
    $query = "INSERT INTO transaksi (id_barang, id_pembeli, jumlah, total_harga, tanggal_transaksi)
              VALUES ($id_barang, $id_pembeli, $jumlah, $total, '$tanggal')";
    mysqli_query($conn, $query);

    return "sukses";
}

?>
