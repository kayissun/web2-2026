<!DOCTYPE html>
<html>
<head>
    <title>Admin - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="d-flex">
        <!-- SIDEBAR -->
        <?php include __DIR__ . '/../layout/sidebar_admin.php'; ?>

        <!-- CONTENT -->
        <div class="flex-grow-1 p-4">

            <div class="d-flex justify-content-between mb-4">
                <h3>Dashboard</h3>
                <span>👋 <?= $_SESSION['nama']; ?></span>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm text-bg-primary">
                        <div class="card-body">
                            <h5>Mahasiswa</h5>
                            <p>Kelola data mahasiswa</p>
                            <a href="index.php?page=mahasiswa" class="btn btn-light btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm text-bg-success">
                        <div class="card-body">
                            <h5>Tugas</h5>
                            <p>Kelola data tugas</p>
                            <a href="index.php?page=tugas" class="btn btn-light btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- END CONTENT -->

    </div> <!-- END FLEX -->

</body>
</html>