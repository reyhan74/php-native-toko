<?php include '../config/db.php'; session_start();

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$cart = $_SESSION['cart'] ?? [];

foreach ($cart as $id => $qty) {
  mysqli_query($conn, "INSERT INTO transaksi (produk_id, qty, nama, alamat, nohp) VALUES ('$id', '$qty', '$nama', '$alamat', '$nohp')");
}

unset($_SESSION['cart']);
header("Location: selesai.php");
