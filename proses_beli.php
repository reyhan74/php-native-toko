<?php
include 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $produk_id = (int)$_POST['produk_id'];
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
  $jumlah = (int)$_POST['jumlah'];
  $nohp = mysqli_real_escape_string($conn, $_POST['nohp']);

  // Upload bukti pembayaran
  $bukti = '';
  if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] == 0) {
    $ext = pathinfo($_FILES['bukti']['name'], PATHINFO_EXTENSION);
    $bukti = 'bukti_' . time() . '.' . $ext;
    move_uploaded_file($_FILES['bukti']['tmp_name'], 'uploads/bukti/' . $bukti);
  }

  $query = "INSERT INTO transaksi (produk_id, nama, alamat, nohp, qty, bukti, status_pembayaran)
            VALUES ($produk_id, '$nama', '$alamat', '$nohp', $jumlah, '$bukti', 'Sudah Bayar')";

  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Transaksi berhasil. Pesanan Anda sedang diproses.');location.href='status.php?nohp=$nohp';</script>";
  } else {
    echo "Gagal menyimpan transaksi: " . mysqli_error($conn);
  }
}
?>
