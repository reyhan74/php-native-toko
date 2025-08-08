<?php
include 'config/db.php';

$id = $_GET['id'] ?? 0;
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id = $id");
$produk = mysqli_fetch_assoc($query);

if (!$produk) {
  echo "Produk tidak ditemukan.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Beli - <?= $produk['nama'] ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f2f2f2;
    }
    .product-img {
      max-height: 400px;
      object-fit: contain;
      border-radius: 10px;
    }
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .btn-buy {
      background-color: #ff5722;
      color: #fff;
      font-weight: bold;
    }
    .btn-buy:hover {
      background-color: #e64a19;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="card p-4">
    <div class="row g-4">
      <!-- Gambar Produk -->
      <div class="col-md-5">
        <img src="assets/produk/<?= $produk['foto'] ?>" alt="<?= $produk['nama'] ?>" class="img-fluid product-img">
      </div>

      <!-- Informasi dan Form Pembelian -->
      <div class="col-md-7">
        <h2><?= $produk['nama'] ?></h2>
        <h4 class="text-danger mb-3">Rp<?= number_format($produk['harga'], 0, ',', '.') ?></h4>
        <p><?= $produk['deskripsi'] ?></p>
        <p><strong>Stok:</strong> <?= $produk['stok'] ?></p>

        <hr>

        <form action="proses_beli.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="produk_id" value="<?= $produk['id'] ?>">

          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Pengiriman</label>
            <textarea name="alamat" id="alamat" rows="3" class="form-control" required></textarea>
          </div>

          <div class="mb-3">
            <label for="nohp" class="form-label">No HP / WhatsApp</label>
            <input type="text" name="nohp" id="nohp" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" max="<?= $produk['stok'] ?>" value="1" required>
          </div>

          <div class="mb-3">
            <label for="bukti" class="form-label">Upload Bukti Pembayaran (QRIS)</label>
            <input type="file" name="bukti" id="bukti" class="form-control" accept="image/*" required>
          </div>

          <div class="text-center mb-3">
            <p class="mb-2"><strong>Scan QRIS untuk Bayar:</strong></p>
            <img src="assets/qe.png" alt="QRIS" width="200" class="img-thumbnail">
          </div>

          <button type="submit" class="btn btn-buy w-100">Kirim & Bayar</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
