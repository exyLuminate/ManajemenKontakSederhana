<?php require_once __DIR__.'/inc/functions.php'; ?>
<html>
<head>
  <meta charset="utf-8">
  <title>Sistem Manajemen Kontak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand">KontakApp</a>
    <div>
      <a href="login.php" class="btn btn-outline-light me-2">Login</a>
      <a href="add.php" class="btn btn-light">Tambah Kontak</a>
    </div>
  </div>
</nav>

<div class="container py-4">
  <h3>Daftar Kontak</h3>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nama</th><th>Email</th><th>Telepon</th><th>Sosial</th><th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="5" class="text-center text-muted">Belum ada data (placeholder)</td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>
