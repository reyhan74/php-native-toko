<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}
include '../config/db.php';

// Ambil ID produk dari URL
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
$produk = mysqli_fetch_assoc($result);

// Proses form saat disubmit
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $foto = $produk['foto'];

    // Jika ada upload foto baru
    if ($_FILES['foto']['name']) {
        $tmp = $_FILES['foto']['tmp_name'];
        $newname = time() . '-' . $_FILES['foto']['name'];
        move_uploaded_file($tmp, "../assets/produk/" . $newname);
        $foto = $newname;
    }

    $query = "UPDATE produk SET 
                nama='$nama',
                harga='$harga',
                stok='$stok',
                deskripsi='$deskripsi',
                foto='$foto'
              WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: produk.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk</title>
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
    <h4 class="mb-4">Edit Produk</h4>
    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" required value="<?= $produk['nama'] ?>">
      </div>
      <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required value="<?= $produk['harga'] ?>">
      </div>
      <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required value="<?= $produk['stok'] ?>">
      </div>
      <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required><?= $produk['deskripsi'] ?></textarea>
      </div>
      <div class="mb-3">
        <label>Ganti Foto (opsional)</label><br>
        <img src="../assets/produk/<?= $produk['foto'] ?>" width="80" class="mb-2"><br>
        <input type="file" name="foto" class="form-control">
      </div>
      <button type="submit" name="submit" class="btn btn-warning">Simpan Perubahan</button>
      <a href="produk.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
