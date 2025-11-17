<?php
require_once __DIR__ . '/inc/functions.php';
require_login();

$id = $_GET['id'] ?? '';
$contacts = read_contacts();

start_session();
$error_msg = get_flash_message('danger');

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
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Kontak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<main class="container py-4">
  <h1 class="h4 mb-3">Edit Kontak</h1>

  <?php if ($error_msg): ?>
      <div class="alert alert-danger"><?= $error_msg ?></div>
  <?php endif; ?>

  <form method="post" action="edit_action.php">
    <input type="hidden" name="id" value="<?= esc($contact['id']) ?>">

    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="name" class="form-control" 
             value="<?= esc($contact['name']) ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" 
             value="<?= esc($contact['email']) ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Telepon</label>
      <input type="text" name="phone" class="form-control" 
             value="<?= esc($contact['phone']) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Sosial Media (1 link per baris)</label>
      <textarea name="socials" class="form-control" rows="3"><?= esc(implode("\n", $contact['socials'])) ?></textarea>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
  </form>
</main>

</body>