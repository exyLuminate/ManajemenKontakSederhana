<?php
require_once __DIR__ . '/inc/functions.php';
?>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
  <div class="card p-4" style="width:350px">
    <h3 class="card-title mb-3">Login</h3>
    <form method="post" action="login_action.php">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input class="form-control" name="username" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <div class="d-grid">
        <button class="btn btn-primary">Masuk</button>
      </div>
    </form>
  </div>
</main>
</body>
</html>
