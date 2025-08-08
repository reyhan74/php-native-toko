<?php include '../config/db.php'; include '../templates/header.php'; ?>

<h4>Checkout</h4>

<?php $cart = $_SESSION['cart'] ?? []; ?>
<?php if (empty($cart)): ?>
  <div class="alert alert-warning">Tidak ada produk dalam keranjang.</div>
<?php else: ?>
<form method="post" action="proses_checkout.php">
  <div class="mb-3">
    <label>Nama Lengkap</label>
    <input type="text" name="nama" required class="form-control">
  </div>
  <div class="mb-3">
    <label>Alamat Pengiriman</label>
    <textarea name="alamat" required class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label>No. HP</label>
    <input type="text" name="nohp" required class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Bayar Sekarang</button>
</form>
<?php endif; ?>

<?php include '../templates/footer.php'; ?>
