<?php
require_once __DIR__ . '/inc/functions.php';
?>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Tambah Kontak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">← Kembali</a>
  </div>
</nav>

<main class="container py-4">
  <h1 class="h5 mb-3">Tambah Kontak</h1>

  <form method="post" action="add_action.php">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">Telepon</label>
      <input type="text" name="phone" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">Sosial Media (1 link per baris)</label>
      <textarea name="socials" class="form-control" rows="3"></textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
  </form>
</main>

</body>
</html>
