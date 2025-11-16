<?php require_once __DIR__.'/inc/functions.php'; ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Kontak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-light bg-light">
  <div class="container">
    <a href="index.php" class="navbar-brand">← Kembali</a>
  </div>
</nav>

<div class="container py-4">
  <h3>Edit Kontak</h3>

  <form action="edit_action.php" method="post">
    <input type="hidden" name="id" value="placeholder">

    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="name" class="form-control" value="Placeholder" required>
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="placeholder@mail.com">
    </div>

    <div class="mb-3">
      <label>Telepon</label>
      <input type="text" name="phone" class="form-control" value="08123456789">
    </div>

    <div class="mb-3">
      <label>Sosial Media</label>
      <textarea name="socials" class="form-control">https://instagram.com/placeholder</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>
