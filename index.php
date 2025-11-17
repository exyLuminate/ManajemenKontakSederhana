<?php
require_once __DIR__ . '/inc/functions.php';
require_login();

$contacts = read_contacts();

$success_msg = get_flash_message('success');
$error_msg = get_flash_message('danger');
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Kontak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <i class="bi bi-person-lines-fill me-2"></i> MyContacts
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      
      <span class="navbar-text text-light me-3">
        Login sebagai: <strong><?= esc(ADMIN_USER) ?></strong>
      </span>
      <a class="btn btn-outline-light" href="logout.php">
        <i class="bi bi-box-arrow-right me-1"></i> Logout
      </a>
    </div>
  </div>
</nav>

<div class="container py-4 flex-grow-1">

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 mb-0">Daftar Kontak (<?= count($contacts) ?>)</h2>
    <a class="btn btn-primary" href="add.php">
       <i class="bi bi-plus-circle me-1"></i> Tambah Kontak
    </a>
  </div>
  
  <?php if ($success_msg): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $success_msg ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif; ?>
  <?php if ($error_msg): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= $error_msg ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif; ?>

  <div class="card shadow-sm border-0">
    <div class="card-body p-0">
      <table class="table table-striped table-hover mb-0 align-middle">
        <thead class="table-dark">
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Telepon</th>
            <th scope="col">Sosial Media</th>
            <th scope="col" class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($contacts)): ?>
            <tr>
              <td colspan="5">
                <div class="alert alert-secondary text-center mb-0">
                  Belum ada kontak. Silakan <a href="add.php" class="alert-link">tambah kontak baru</a>.
                </div>
              </td>
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
                      <a href="<?= esc($s) ?>" target="_blank" 
                         class="me-2 text-decoration-none" 
                         title="Kunjungi <?= $details['name'] ?>">
                          <i class="bi <?= $details['icon'] ?> fs-5"></i>
                      </a>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </td>
                <td class="text-end">
                  <a class="btn btn-warning btn-sm" href="edit.php?id=<?= esc($c['id']) ?>" title="Edit">
                    <i class="bi bi-pencil me-1"></i> Edit
                  </a>

                  <form action="delete_action.php" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus <?= esc(addslashes($c['name'])) ?>?')">
                    <input type="hidden" name="id" value="<?= esc($c['id']) ?>">
                    <button class="btn btn-danger btn-sm" title="Hapus">
                      <i class="bi bi-trash me-1"></i> Hapus
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<footer class="text-center text-muted py-4 mt-auto border-top bg-white">
  <small>MyContacts © <?= date('Y') ?></small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>