<?php include '../config/db.php'; include '../templates/header.php'; ?>

<h4 class="mb-4">Keranjang Belanja</h4>

<?php
$cart = $_SESSION['cart'] ?? [];

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $qty = $_GET['qty'] ?? 1;
  $cart[$id] = ($cart[$id] ?? 0) + $qty;
  $_SESSION['cart'] = $cart;
}

if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  unset($cart[$id]);
  $_SESSION['cart'] = $cart;
}
?>

<?php if (empty($cart)): ?>
  <div class="alert alert-info">Keranjang kosong.</div>
<?php else: ?>
  <table class="table">
    <thead>
      <tr>
        <th>Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $grandTotal = 0;
      foreach ($cart as $id => $qty):
        $q = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
        $p = mysqli_fetch_assoc($q);
        $total = $p['harga'] * $qty;
        $grandTotal += $total;
      ?>
      <tr>
        <td><?= $p['nama'] ?></td>
        <td>Rp<?= number_format($p['harga']) ?></td>
        <td><?= $qty ?></td>
        <td>Rp<?= number_format($total) ?></td>
        <td><a href="?hapus=<?= $id ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a></td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td colspan="3" class="text-end fw-bold">Total Bayar:</td>
        <td colspan="2" class="fw-bold text-danger">Rp<?= number_format($grandTotal) ?></td>
      </tr>
    </tbody>
  </table>

  <a href="checkout.php" class="btn btn-success">Lanjut Checkout</a>
<?php endif; ?>

<?php include '../templates/footer.php'; ?>
