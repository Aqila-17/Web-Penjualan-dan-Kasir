
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php">Data Barang & Pembeli</a>
    <div>
      
      
      <?php if (isset($_SESSION["username"])): ?>
        
        <span class="text-white me-2">
          Halo, <?= $_SESSION["username"]; ?> (<?= $_SESSION["role"]; ?>)
        </span>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
      <?php else: ?>
        
        <a href="form_login.php" class="btn btn-light btn-sm me-2">Login</a>
        <a href="form_register.php" class="btn btn-light btn-sm">Register</a>
      <?php endif; ?>
    </div>
  </div>
</nav>
