<?php
require_once __DIR__ . '/inc/functions.php';

$contacts = read_contacts();
?>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Sistem Manajemen Kontak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">KontakApp</a>
    <div>
      <a class="btn btn-outline-light me-2" href="login.php">Login</a>
      <a class="btn btn-light" href="add.php">+ Tambah Kontak</a>
    </div>
  </div>
</nav>

<main class="container py-4">
  <h1 class="h4 mb-3">Daftar Kontak</h1>

  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead>
        <tr><th>Nama</th><th>Email</th><th>Telepon</th><th>Sosial</th><th>Aksi</th></tr>
      </thead>
      <tbody>
        <?php if (empty($contacts)): ?>
        <tr>
          <td colspan="5" class="text-center text-muted py-4">Belum ada kontak. Tambah kontak melalui tombol di kanan atas.</td>
        </tr>
        <?php else: ?>
          <?php foreach ($contacts as $c): ?>
            <tr>
              <td><?= esc($c['name'] ?? '') ?></td>
              <td><?= esc($c['email'] ?? '') ?></td>
              <td><?= esc($c['phone'] ?? '') ?></td>
              <td>
                <a class="btn btn-sm btn-warning" href="edit.php?id=<?= urlencode($c['id'] ?? '') ?>">Edit</a>
                <form method="post" action="delete_action.php" style="display:inline">
                  <input type="hidden" name="id" value="<?= esc($c['id'] ?? '') ?>">
                  <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</main>

</body>
</html>
