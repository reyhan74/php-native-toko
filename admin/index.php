<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}
include '../config/db.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f7f7f7;
    }
    .sidebar {
      height: 100vh;
      background-color: #ff5722;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 15px;
    }
    .sidebar a:hover {
      background-color: #e64a19;
    }
    .card-stat {
      border-left: 5px solid #ff5722;
    }
  </style>
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3">
      <h4 class="text-white">ADMIN</h4>
      <a href="index.php">Dashboard</a>
      <a href="produk.php">Produk</a>
      <a href="pesanan.php">pesanan</a>
      <a href="transaksi.php">Transaksi</a>
      <a href="logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="container-fluid p-4">
      <h3 class="mb-4">Dashboard</h3>

      <div class="row">
        <?php
        $jml_produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM produk"))['total'];
        $jml_transaksi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM transaksi"))['total'];
        ?>
        <div class="col-md-4 mb-3">
          <div class="card card-stat shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Total Produk</h5>
              <h3><?= $jml_produk ?></h3>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card card-stat shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Total Transaksi</h5>
              <h3><?= $jml_transaksi ?></h3>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card card-stat shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Selamat Datang!</h5>
              <p class="text-muted">Admin Panel Toko Online</p>
            </div>
          </div>
        </div>
      </div>

      <hr>
      <p class="text-muted text-center">&copy; <?= date('Y') ?> - Toko Online</p>
    </div>
  </div>
</body>
</html>
