<?php
require_once __DIR__ . '/inc/functions.php';
require_login();

// Ambil data lama jika ada (dari validasi gagal)
start_session();
$old_data = $_SESSION['old_data'] ?? [];
unset($_SESSION['old_data']); 

$error_msg = get_flash_message('danger');
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Kontak </title>
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
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i> Tambah Kontak Baru</h4>
        </div>
        
        <div class="card-body p-4">
          
          <?php if ($error_msg): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Gagal!</strong><br>
            <?php echo $error_msg; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php endif; ?>

          <form action="add_action.php" method="post">
            
            <div class="mb-3">
              <label for="nameInput" class="form-label">Nama</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                <input type="text" name="name" id="nameInput" class="form-control" required 
                       value="<?= esc($old_data['name'] ?? '') ?>"> 
              </div>
            </div>

            <div class="mb-3">
              <label for="emailInput" class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                <input type="email" name="email" id="emailInput" class="form-control" required
                       value="<?= esc($old_data['email'] ?? '') ?>"> 
              </div>
            </div>

            <div class="mb-3">
              <label for="phoneInput" class="form-label">Telepon</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input type="text" name="phone" id="phoneInput" class="form-control"
                       value="<?= esc($old_data['phone'] ?? '') ?>"> 
              </div>
            </div>

            <div class="mb-3">
              <label for="socialsInput" class="form-label">Sosial Media (1 link per baris)</label>
              <textarea name="socials" id="socialsInput" class="form-control" rows="3"><?= esc(implode("\n", $old_data['socials'] ?? [])) ?></textarea>
              <div class="form-text">
                Contoh: https://github.com/username
              </div>
            </div>
            
        </div>
        
        <div class="card-footer text-end bg-light border-0 pt-3">
            <a href="index.php" class="btn btn-secondary me-2">
                <i class="bi bi-x-circle me-1"></i> Batal
            </a>
            <button typeM="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan
            </button>
        </div>
        </form>

      </div>
    </div>
  </div>
</div>

<footer class="text-center text-muted py-4 mt-auto border-top bg-white">
  <small>MyContacts © <?= date('Y') ?></small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>