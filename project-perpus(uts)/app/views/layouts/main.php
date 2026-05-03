<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<style>
body {
    font-family: 'Poppins', sans-serif;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-content {
    animation: fadeInUp 0.5s ease-out forwards;
}
</style>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-light bg-light sticky-top shadow">
    <div class="container-fluid mt-2 mb-3 ms-5">
        <span class="navbar-brand fw-bold text-black fs-4">
            <span class="text-bg-primary fs-5 badge">Si</span>Pus</span>
        <div class="ms-auto">
            <span class="text text-muted d-flex align-items-center gap-2">👋Halo
                <?= $_SESSION['user']['username'] ?? 'User' ?> 
                (<?= strtoupper($_SESSION['user']['role'] ?? 'guest') ?>)
            </span>
        </div>
    </div>
</nav>

    <!-- SIDEBAR -->
    <div class="bg-white border-end shadow position-absolute p-3" 
         style="width: 250px; height: 100vh; top:85px; z-index: 100;">
        
            <ul class="nav nav-pills flex-column gap-2 fs-6 fw-semibold">

                <li class="nav-item">
                    <a href="index.php?url=dashboard"
                    class="nav-link d-flex align-items-center gap-2 
                    <?= ($_GET['url'] ?? '') == 'dashboard' 
                        ? 'bg-primary bg-opacity-10 text-primary' 
                        : 'text-dark' ?>">
                        
                        <i class="bi bi-house-door-fill"></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a href="index.php?url=buku"
                    class="nav-link d-flex align-items-center gap-2 
                    <?= ($_GET['url'] ?? '') == 'buku' 
                        ? 'bg-primary bg-opacity-10 text-primary' 
                        : 'text-dark' ?>">
                    
                        <i class="bi bi-book-half"></i>
                        Data Buku
                    </a>
                </li>

                <li class="nav-item">
                    <a href="index.php?url=anggota"
                    class="nav-link d-flex align-items-center gap-2 
                    <?= ($_GET['url'] ?? '') == 'anggota' 
                        ? 'bg-primary bg-opacity-10 text-primary' 
                        : 'text-dark' ?>">
                    
                        <i class="bi bi-people-fill"></i>
                        Data Anggota
                    </a>
                </li>

                <li class="nav-item">
                    <a href="index.php?url=peminjaman"
                    class="nav-link d-flex align-items-center gap-2 
                    <?= ($_GET['url'] ?? '') == 'peminjaman' 
                        ? 'bg-primary bg-opacity-10 text-primary' 
                        : 'text-dark' ?>">
                    
                        <i class="bi bi-arrow-left-right"></i>
                        Data Peminjaman
                    </a>
                </li>

                <li class="nav-item">
                    <a href="index.php?url=laporan"
                    class="nav-link d-flex align-items-center gap-2 
                    <?= (strpos($_GET['url'] ?? '', 'laporan') !== false
                        ? 'bg-primary bg-opacity-10 text-primary' 
                        : 'text-dark') ?>">
                    
                        <i class="bi bi-graph-up"></i>
                        Laporan
                    </a>
                </li>

                <li class="nav-item pt-4 border-top">
                    <a href="index.php?url=auth/logout" class="btn btn-danger w-100 fw-semibold d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-box-arrow-left"></i> 
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
    </div>



    <!-- CONTENT -->
    <div class="p-4 animate-content" 
        style="margin-left: 250px; min-height:100vh; background-color: #f4f6f9;">
        <?php require_once $content; ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Move semua modal ke body agar z-index bekerja dengan baik
document.addEventListener('DOMContentLoaded', function() {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        document.body.appendChild(modal);
    });
});
</script>
</body>
</html>