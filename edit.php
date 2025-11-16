<?php
require_once __DIR__ . '/inc/functions.php';

//  placeholder data 
$contact = [
  'id' => 'c-placeholder',
  'name' => 'Nama Placeholder',
  'email' => 'email@mail.test',
  'phone' => '08123456789',
];
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Kontak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">← Kembali</a>
  </div>
</nav>

<main class="container py-4">
  <h1 class="h5 mb-3">Edit Kontak</h1>

  <form method="post" action="edit_action.php">
    <input type="hidden" name="id" value="<?= esc($contact['id']) ?>">

    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="name" class="form-control" value="<?= esc($contact['name']) ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?= esc($contact['email']) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Telepon</label>
      <input type="text" name="phone" class="form-control" value="<?= esc($contact['phone']) ?>">
    </div>

    <button class="btn btn-primary">Update</button>
  </form>
</main>

</body>
</html>
