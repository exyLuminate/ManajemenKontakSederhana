<?php
require_once __DIR__ . '/inc/functions.php';
require_login();

$contacts = read_contacts();

$success_msg = get_flash_message('success');
$error_msg = get_flash_message('danger'); // Mengambil pesan error dari delete

?>
<head>
  <meta charset="utf-8">
  <title>Daftar Kontak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand">KontakApp</a>
    <div>
      <a class="btn btn-light" href="add.php">Tambah Kontak</a>
      <a class="btn btn-outline-light ms-2" href="logout.php">Logout</a>
    </div>
  </div>
</nav>

<div class="container py-4">
  <h3>Daftar Kontak</h3>
  
  <?php if ($success_msg): ?>
      <div class="alert alert-success"><?= $success_msg ?></div>
  <?php endif; ?>
  <?php if ($error_msg): ?>
      <div class="alert alert-danger"><?= $error_msg ?></div>
  <?php endif; ?>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nama</th><th>Email</th><th>Telepon</th><th>Sosial</th><th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php if (empty($contacts)): ?>
        <tr>
          <td colspan="5" class="text-center text-muted py-3">Belum ada kontak.</td>
        </tr>

      <?php else: ?>
        <?php foreach ($contacts as $c): ?>
          <tr>
            <td><?= esc($c['name']) ?></td>
            <td><?= esc($c['email']) ?></td>
            <td><?= esc($c['phone']) ?></td>
            <td>
              <?php if (!empty($c['socials'])): ?>
                <?php foreach ($c['socials'] as $s): 
                    $details = get_sosmed_details($s);
                ?>
                  <div>
                      <a href="<?= esc($s) ?>" target="_blank" title="Kunjungi <?= $details['name'] ?>">
                          <i class="bi <?= $details['icon'] ?>"></i> <?= $details['name'] ?>
                      </a>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </td>
            <td>
              <a class="btn btn-warning btn-sm" href="edit.php?id=<?= esc($c['id']) ?>">Edit</a>

              <form action="delete_action.php" method="post" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus kontak <?= esc($c['name']) ?>?')">
                <input type="hidden" name="id" value="<?= esc($c['id']) ?>">
                <button class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>

  </table>
</div>
</body>