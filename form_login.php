<?php
session_start();
require "fungsi.php";

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];
            $_SESSION["role"] = $row["role"];

           
            switch ($row["role"]) {
                case "superadmin":
                    header("Location: index.php");
                    break;
                case "admin":
                    header("Location: admin_dashboard.php");
                    break;
                case "kasir":
                    header("Location: form_pembelian.php");
                    break;
                case "inventory":
                    header("Location: inventoryp.php");
                    break;
                default:
                    header("Location: form_register.php");
            }
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: "Segoe UI", sans-serif;
    }
    .login-card {
      max-width: 400px;
      margin: 80px auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      background: white;
    }
    .login-card h2 {
      margin-bottom: 20px;
      font-weight: bold;
      text-align: center;
      color: #0d6efd;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="login-card">
    <h2>Login</h2>
    <?php if (isset($error)) : ?>
      <div class="alert alert-danger">Username atau password salah!</div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>

      <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>

    <p class="mt-3 text-center">
      Belum punya akun? <a href="form_register.php">Daftar sekarang</a>
    </p>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
