<?php
session_start();
require "fungsi.php";

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // role default -> kasir
    $role = "kasir";

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah digunakan!');</script>";
    } else {
        $query = mysqli_query($conn, "INSERT INTO users (username, password, role) 
                                      VALUES ('$username','$hashedPassword','$role')");
        if ($query) {
            echo "<script>alert('Registrasi berhasil! Silakan login'); window.location='form_login.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: "Segoe UI", sans-serif;
    }
    .register-card {
      max-width: 400px;
      margin: 80px auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      background: white;
    }
    .register-card h2 {
      margin-bottom: 20px;
      font-weight: bold;
      text-align: center;
      color: #0d6efd;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="register-card">
    <h2>Register</h2>
    <form method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>

      <button type="submit" name="register" class="btn btn-success w-100">Register</button>
    </form>

    <p class="mt-3 text-center">
      Sudah punya akun? <a href="form_login.php">Login</a>
    </p>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
