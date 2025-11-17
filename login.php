<?php require_once __DIR__ . '/inc/functions.php'; ?>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
  <div class="card p-4" style="width:320px;">
    <h4 class="mb-3">Login</h4>

    <form method="post" action="login_action.php">
      <div class="mb-3">
        <label>Username</label>
        <input class="form-control" name="username" required>
      </div>

      <div class="mb-3">
        <label>Password</label>
        <input class="form-control" type="password" name="password" required>
      </div>

      <button class="btn btn-primary w-100">Masuk</button>
    </form>

  </div>
</div>

</body>
