<?php
require "fungsi.php"; // pastikan file koneksi sudah ada

// password default
$plainPassword = "123456";
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

// daftar akun default
$users = [
    ["superadmin1", "superadmin"],
    ["admin1", "admin"],
    ["inventory1", "inventory"],
    ["kasir1", "kasir"]
];

foreach ($users as $user) {
    $username = $user[0];
    $role     = $user[1];

    // cek apakah username sudah ada
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($cek) == 0) {
        $query = "INSERT INTO users (username, password, role) 
                  VALUES ('$username', '$hashedPassword', '$role')";
        if (mysqli_query($conn, $query)) {
            echo "Akun $username berhasil dibuat dengan role $role <br>";
        } else {
            echo "Gagal membuat akun $username: " . mysqli_error($conn) . "<br>";
        }
    } else {
        echo "Akun $username sudah ada, dilewati.<br>";
    }
}

echo "<br>Selesai. Semua akun default siap login dengan password: $plainPassword";
