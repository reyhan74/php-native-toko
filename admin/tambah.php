<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
  exit;
}
include '../config/db.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    // Proses upload gambar
    $foto = '';
    if ($_FILES['foto']['name']) {
        $tmp = $_FILES['foto']['tmp_name'];
        $newname = time() . '-' . $_FILES['foto']['name'];
        move_uploaded_file($tmp, "../assets/produk/" . $newname);
        $foto = $newname;
    }

    // Insert ke database
    $query = "INSERT INTO produk (nama, harga, stok, deskripsi, foto)
              VALUES ('$nama', '$harga', '$stok', '$deskripsi', '$foto')";
    mysqli_query($conn, $query);

    header("Location: produk.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f7f7f7;
    }
    .container {
      max-width: 700px;
    }
  </style>
</head>
<body>
  <div class="container mt-5 p-4 bg-white shadow rounded">
    <h4 class="mb-4">Tambah Produk Baru</h4>
    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label>Foto Produk</label>
        <input type="file" name="foto" class="form-control" required>
      </div>
      <button type="submit" name="submit" class="btn btn-success">Simpan</button>
      <a href="produk.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
