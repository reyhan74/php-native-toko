<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Toko Online</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap + Icon -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="/templates/style.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light shopee-navbar px-3">
    <a class="navbar-brand fw-bold text-white" href="/index.php">ShopeeClone</a>
    <form class="d-flex ms-auto me-3" action="#">
      <input class="form-control form-control-sm me-2" type="search" placeholder="Cari produk..." aria-label="Search">
      <button class="btn btn-outline-light btn-sm" type="submit"><i class="bi bi-search"></i></button>
    </form>
    <a href="/pages/cart.php" class="btn btn-warning btn-sm">
      <i class="bi bi-cart-fill"></i> Keranjang
    </a>
  </nav>

  <div class="container mt-4">
