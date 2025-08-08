<?php
session_start();
include 'config/db.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
  $data = mysqli_fetch_assoc($query);

  if ($data && password_verify($password, $data['password'])) {
    $_SESSION['admin'] = $data;
    header('Location: admin/index.php');
    exit;
  } else {
    $error = "Username atau Password salah!";
  }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #f5515f, #a1051d);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 0 30px rgba(0,0,0,0.1);
    }
    .form-control {
      border-radius: 12px;
    }
    .btn-primary {
      border-radius: 12px;
      background-color: #ff5722;
      border: none;
    }
    .btn-primary:hover {
      background-color: #e64a19;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card p-4" style="max-width: 400px; margin: auto;">
      <h3 class="text-center mb-4">Login Admin</h3>
      <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php endif; ?>
      <form method="post">
        <div class="mb-3">
          <label>Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
