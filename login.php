<?php
require_once __DIR__ . '/inc/functions.php';

// Jika sudah login, lempar ke index
if (is_logged_in()) {
    redirect('index.php');
}

$error_msg = get_flash_message('danger');
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
  
  <div style="width: 360px;">
    <div class="text-center mb-4">
      <i class="bi bi-person-lines-fill display-4 text-primary"></i>
      <h1 class="h3 mb-0">MyContacts</h1>
    </div>

    <div class="card shadow-sm border-0 p-4">
      <h4 class="mb-3 text-center">Admin Login</h4>

      <?php if ($error_msg): ?>
      <div class="alert alert-danger" role="alert">
        <?= $error_msg ?>
      </div>
      <?php endif; ?>

      <form method="post" action="login_action.php">
        <div class="mb-3">
          <label for="usernameInput" class="form-label">Username</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <input type="text" class="form-control" id="usernameInput" name="username" value="<?= esc(ADMIN_USER) ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="passwordInput" class="form-label">Password</label>
           <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input class="form-control" type="password" id="passwordInput" name="password" required>
          </div>
        </div>

        <button class="btn btn-primary w-100 mt-3" type="submit">
          <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
        </button>
      </form>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>