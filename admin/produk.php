<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}
include '../config/db.php';

// Hapus produk jika ada permintaan
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM produk WHERE id=$id");
    header("Location: produk.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Produk</title>
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
    .card-header {
      background-color: #ff5722;
      color: white;
    }
    img.thumbnail {
      width: 60px;
      height: 60px;
      object-fit: cover;
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
      <a href="transaksi.php">Transaksi</a>
      <a href="logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
    </div>

    <!-- Content -->
    <div class="container-fluid p-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Produk</h4>
        <a href="tambah.php" class="btn btn-primary">+ Tambah Produk</a>
      </div>
      <div class="card shadow-sm">
        <div class="card-body table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><img src="../assets/produk/<?= $row['foto'] ?>" class="thumbnail"></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td>Rp<?= number_format($row['harga']) ?></td>
                <td><?= $row['stok'] ?></td>
                <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                <td>
                  <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus produk ini?')" class="btn btn-sm btn-danger">Hapus</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <hr class="mt-4">
      <p class="text-muted text-center">&copy; <?= date('Y') ?> - Toko Online</p>
    </div>
  </div>
</body>
</html>
