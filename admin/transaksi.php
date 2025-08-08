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
  <title>Halaman Transaksi - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
    }
    .navbar {
      background-color: #dc3545;
    }
    .navbar-brand, .nav-link, .navbar-text {
      color: #fff !important;
    }
    .badge-status {
      font-size: 0.75rem;
    }
    .table thead {
      background-color: #343a40;
      color: #fff;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">Admin Toko</a>
    <span class="navbar-text ms-auto">Halaman Transaksi</span>
  </div>
</nav>

<div class="container mt-4">
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
