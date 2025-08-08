<?php
include 'config/db.php';

if (!isset($_GET['id'])) {
  echo "<script>alert('Pesanan tidak ditemukan');location.href='index.php';</script>";
  exit;
}

$id = (int)$_GET['id'];
$query = mysqli_query($conn, "SELECT t.*, p.nama AS produk 
                              FROM transaksi t 
                              JOIN produk p ON t.produk_id = p.id 
                              WHERE t.id = $id");

$transaksi = mysqli_fetch_assoc($query);
if (!$transaksi) {
  echo "<script>alert('Pesanan tidak ditemukan');location.href='index.php';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Status Pesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Segoe UI', sans-serif;
    }
    .status-box {
      border-left: 5px solid #0d6efd;
      background: white;
      padding: 20px;
      margin-top: 40px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      border-radius: 10px;
    }
    .status-label {
      font-size: 1.2rem;
      font-weight: bold;
      color: #0d6efd;
    }
  </style>
</head>
<body>
<div class="container py-5">
  <div class="status-box">
    <h3>Status Pesanan Anda</h3>
    <p><strong>Produk:</strong> <?= $transaksi['produk'] ?></p>
    <p><strong>Nama:</strong> <?= $transaksi['nama'] ?></p>
    <p><strong>Jumlah:</strong> <?= $transaksi['qty'] ?></p>
    <p><strong>Alamat:</strong> <?= $transaksi['alamat'] ?></p>
    <p><strong>No HP:</strong> <?= $transaksi['nohp'] ?></p>
    <p><strong>Tanggal:</strong> <?= date('d-m-Y H:i', strtotime($transaksi['created_at'])) ?></p>
    <hr>
    <p class="status-label">Status: 
      <span class="badge bg-<?= 
        $transaksi['status'] == 'Menunggu' ? 'secondary' :
        ($transaksi['status'] == 'Diproses' ? 'warning' :
        ($transaksi['status'] == 'Dikirim' ? 'info' : 'success')) ?>">
        <?= $transaksi['status'] ?>
      </span>
    </p>
  </div>
</div>
</body>
</html>
