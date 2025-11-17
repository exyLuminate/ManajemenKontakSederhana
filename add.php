<?php
require_once __DIR__ . '/inc/functions.php';
require_login();

// Ambil data lama jika ada (dari validasi gagal)
$old_data = get_flash_message('old_data') ?? [];
$error_msg = get_flash_message('danger');
?>

<head>
  <meta charset="utf-8">
  <title>Tambah Kontak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-light bg-light">
  <div class="container">
    <a href="index.php" class="navbar-brand">← Kembali</a>
  </div>
</nav>

<div class="container py-4">
  <h3>Tambah Kontak</h3>

  <?php if ($error_msg): ?>
      <div class="alert alert-danger"><?php echo $error_msg; ?></div>
  <?php endif; ?>

  <form action="add_action.php" method="post">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="name" class="form-control" required 
             value="<?= esc($old_data['name'] ?? '') ?>"> 
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required
             value="<?= esc($old_data['email'] ?? '') ?>"> 
    </div>

    <div class="mb-3">
      <label>Telepon</label>
      <input type="text" name="phone" class="form-control"
             value="<?= esc($old_data['phone'] ?? '') ?>"> 
    </div>

    <div class="mb-3">
      <label>Sosial Media (1 link per baris)</label>
      <textarea name="socials" class="form-control" rows="3"><?= esc(implode("\n", $old_data['socials'] ?? [])) ?></textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
  </form>
</div>
</body>