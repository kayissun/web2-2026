<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistem Admin</a>
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
    <h3>Dashboard Admin</h3>
    <p>Selamat datang, <b><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Guest'; ?></b></p>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h5>User</h5>
                    <p>Kelola data user</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-success">
                <div class="card-body">
                    <h5>Mahasiswa</h5>
                    <p>Kelola data mahasiswa</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-warning">
                <div class="card-body">
                    <h5>Tugas</h5>
                    <p>Kelola data tugas</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>