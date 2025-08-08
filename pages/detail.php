<?php include '../config/db.php'; include '../templates/header.php'; ?>

<?php
$id = $_GET['id'] ?? 0;
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
$row = mysqli_fetch_assoc($query);
?>

<div class="row">
  <div class="col-md-5">
    <img src="../assets/<?= $row['gambar'] ?>" class="img-fluid rounded border" alt="<?= $row['nama'] ?>">
  </div>
  <div class="col-md-7">
    <h3><?= $row['nama'] ?></h3>
    <h4 class="price">Rp<?= number_format($row['harga']) ?></h4>
    <p><?= $row['deskripsi'] ?></p>
    <form action="cart.php" method="get">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <div class="mb-2">
        <label>Jumlah:</label>
        <input type="number" name="qty" value="1" min="1" class="form-control w-25">
      </div>
      <button type="submit" class="btn btn-buy">+ Tambah ke Keranjang</button>
    </form>
  </div>
</div>

<?php include '../templates/footer.php'; ?>
