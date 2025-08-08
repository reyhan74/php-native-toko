<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
  exit;
}
include '../config/db.php';

// Proses update status
if (isset($_POST['update_status'])) {
  $id = $_POST['id'];
  $status = $_POST['status'];
  mysqli_query($conn, "UPDATE transaksi SET status='$status' WHERE id=$id");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Transaksi - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
    }

    .sidebar {
      height: 100vh;
      width: 220px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #dc3545;
      padding-top: 60px;
    }

    .sidebar a {
      color: #fff;
      padding: 12px 20px;
      display: block;
      text-decoration: none;
    }

    .sidebar a:hover,
    .sidebar .active {
      background-color: #dc3545;
    }

    .main-content {
      margin-left: 220px;
      padding: 20px;
    }

    .navbar {
      position: fixed;
      top: 0;
      left: 220px;
      right: 0;
      z-index: 1000;
      background-color: #343a40;
    }

    .navbar .navbar-brand,
    .navbar .navbar-text {
      color: white !important;
    }

    .table thead {
      background-color: #343a40;
      color: white;
    }

    .badge-status {
      font-size: 0.75rem;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar p-3">
      <h4 class="text-white">ADMIN</h4>
      <a href="index.php">Dashboard</a>
      <a href="produk.php">Produk</a>
      <a href="pesanan.php">pesanan</a>
      <a href="transaksi.php">Transaksi</a>
      <a href="logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
    </div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <span class="navbar-text ms-auto me-3">Transaksi</span>
  </div>
</nav>

<!-- Main Content -->
<div class="main-content pt-5 mt-3">
  <h4 class="mb-4">Daftar Pesanan Masuk</h4>
  <div class="table-responsive">
    <table class="table table-bordered table-hover bg-white">
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Pembeli</th>
          <th>Qty</th>
          <th>Alamat</th>
          <th>Kontak</th>
          <th>Status</th>
          <th>Waktu</th>
          <th>Ubah</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $result = mysqli_query($conn, "SELECT t.*, p.nama AS nama_produk 
                                       FROM transaksi t 
                                       JOIN produk p ON t.produk_id = p.id 
                                       ORDER BY t.created_at DESC");
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['nama_produk']) ?></td>
          <td><?= htmlspecialchars($row['nama']) ?></td>
          <td><?= $row['qty'] ?></td>
          <td><?= htmlspecialchars($row['alamat']) ?></td>
          <td><?= htmlspecialchars($row['nohp']) ?></td>
          <td>
            <span class="badge bg-<?= 
              $row['status'] == 'Menunggu' ? 'secondary' :
              ($row['status'] == 'Diproses' ? 'warning' :
              ($row['status'] == 'Dikirim' ? 'info' : 'success')) ?> badge-status">
              <?= $row['status'] ?>
            </span>
          </td>
          <td><?= date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>
          <td>
            <form method="POST" class="d-flex">
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <select name="status" class="form-select form-select-sm me-2">
                <?php
                $statuses = ['Menunggu', 'Diproses', 'Dikirim', 'Selesai'];
                foreach ($statuses as $status) {
                  echo "<option value='$status'" . ($row['status'] == $status ? ' selected' : '') . ">$status</option>";
                }
                ?>
              </select>
              <button type="submit" name="update_status" class="btn btn-sm btn-primary">✔</button>
            </form>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
