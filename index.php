<?php
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Beranda Toko</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
      background-color: #ff5722;
    }

    .navbar-brand {
      color: #fff !important;
      font-weight: bold;
      font-size: 24px;
    }

    .sidebar {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      height: 100%;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .sidebar h5 {
      font-size: 16px;
      margin-bottom: 15px;
    }

    .sidebar ul {
      list-style: none;
      padding-left: 0;
    }

    .sidebar ul li {
      margin-bottom: 10px;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: #333;
    }

    .sidebar ul li a:hover {
      text-decoration: underline;
    }

    .product-card {
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      transition: all 0.3s;
      height: 100%;
    }

    .product-card:hover {
      transform: translateY(-3px);
    }

    .product-img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .product-body {
      padding: 15px;
    }

    .product-name {
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 5px;
    }

    .product-price {
      font-size: 15px;
      color: #e53935;
      font-weight: bold;
    }

    .footer {
      background: #222;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      margin-top: 50px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">TokoOnline.ID</a>
  </div>
</nav>

<!-- Main Content -->
<div class="container my-4">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
      <div class="sidebar">
        <h5>Kategori</h5>
        <ul>
          <li><a href="#">Elektronik</a></li>
          <li><a href="#">Pakaian</a></li>
          <li><a href="#">Aksesoris</a></li>
          <li><a href="#">Rumah Tangga</a></li>
          <li><a href="#">Makanan</a></li>
          <li><a href="#">Kesehatan</a></li>
        </ul>
      </div>
    </div>

    <!-- Produk -->
    <div class="col-md-9">
      <div class="row g-4">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-6 col-md-4">
          <div class="product-card">
            <img src="assets/produk/<?= $row['foto'] ?>" class="product-img" alt="<?= $row['nama'] ?>">
            <div class="product-body">
              <div class="product-name"><?= $row['nama'] ?></div>
              <div class="product-price">Rp<?= number_format($row['harga'], 0, ',', '.') ?></div>
              <a href="beli.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger mt-2 w-100">Beli</a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<div class="footer">
  <div class="container">
    <p>© <?= date('Y') ?> rhn.my.id - All rights reserved.</p>
  </div>
</div>

</body>
</html>
