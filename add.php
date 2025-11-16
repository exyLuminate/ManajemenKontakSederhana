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

  <form action="add_action.php" method="post">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
      <label>Telepon</label>
      <input type="text" name="phone" class="form-control">
    </div>

    <div class="mb-3">
      <label>Sosial Media (1 link per baris)</label>
      <textarea name="socials" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
  </form>
</div>

</body>
