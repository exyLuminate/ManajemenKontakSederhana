<?php
require_once __DIR__ . '/inc/functions.php';
require_login();

$id = $_GET['id'] ?? '';
$contacts = read_contacts();

start_session();
$error_msg = get_flash_message('danger');

// Ambil Old Data langsung dari Session dan segera unset
$old_data = $_SESSION['old_data'] ?? [];
unset($_SESSION['old_data']);

$contact_from_json = null;
foreach ($contacts as $c) {
    if ($c['id'] === $id) {
        $contact_from_json = $c;
        break;
    }
}

if (!$contact_from_json) {
    set_flash_message('danger', "Kontak tidak ditemukan.");
    redirect('index.php');
}

if (!empty($old_data) && $old_data['id'] === $id) {
    $contact = $old_data;
} else {
    $contact = $contact_from_json;
}

$contact['socials'] = $contact['socials'] ?? []; // Pastikan array
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Kontak</title>
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
        <div class="card-header bg-warning">
          <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i> Edit Kontak</h4>
        </div>
        
        <div class="card-body p-4">
          
          <?php if ($error_msg): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Gagal!</strong><br>
            <?php echo $error_msg; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php endif; ?>

          <form action="edit_action.php" method="post">
            <input type="hidden" name="id" value="<?= esc($contact['id']) ?>">
            
            <div class="mb-3">
              <label for="nameInput" class="form-label">Nama</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                <input type="text" name="name" id="nameInput" class="form-control" required 
                       value="<?= esc($contact['name']) ?>"> 
              </div>
            </div>

            <div class="mb-3">
              <label for="emailInput" class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                <input type="email" name="email" id="emailInput" class="form-control" required
                       value="<?= esc($contact['email']) ?>"> 
              </div>
            </div>

            <div class="mb-3">
              <label for="phoneInput" class="form-label">Telepon</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input type="text" name="phone" id="phoneInput" class="form-control"
                       value="<?= esc($contact['phone']) ?>"> 
              </div>
            </div>

            <div class="mb-3">
              <label for="socialsInput" class="form-label">Sosial Media (1 link per baris)</label>
              <textarea name="socials" id="socialsInput" class="form-control" rows="3"><?= esc(implode("\n", $contact['socials'])) ?></textarea>
              <div class="form-text">
                Contoh: https://github.com/username
              </div>
            </div>
            
        </div>
        
        <div class="card-footer text-end bg-light border-0 pt-3">
            <a href="index.php" class="btn btn-secondary me-2">
                <i class="bi bi-x-circle me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-arrow-clockwise me-1"></i> Update
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