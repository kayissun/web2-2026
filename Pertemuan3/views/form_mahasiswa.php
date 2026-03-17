<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($data) ? 'Edit' : 'Tambah'; ?> Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?page=dashboard">Sistem Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <a class="nav-link" href="index.php?page=mahasiswa">Mahasiswa</a>
            <a class="nav-link" href="index.php?page=tugas">Tugas</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <span class="nav-link">Halo, <b><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Guest'; ?></b></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h3><?php echo isset($data) ? 'Edit' : 'Tambah'; ?> Mahasiswa</h3>

            <?php if(isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    <?php if($_GET['error'] == 1): ?>
                        Semua field harus diisi!
                    <?php else: ?>
                        Terjadi kesalahan. Silakan coba lagi!
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo isset($data) ? 'index.php?page=mahasiswa&action=update' : 'index.php?page=mahasiswa&action=store'; ?>">
                <?php if(isset($data)): ?>
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" 
                           value="<?php echo isset($data) ? $data['nim'] : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa" 
                           value="<?php echo isset($data) ? $data['nama'] : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" 
                           value="<?php echo isset($data) ? $data['email'] : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php?page=mahasiswa" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
