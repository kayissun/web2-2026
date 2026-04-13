<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="d-flex">

    <!-- SIDEBAR -->
        <!-- SIDEBAR -->
        <?php include __DIR__ . '/../layout/sidebar_mhs.php'; ?>

    <!-- CONTENT -->
    <div class="flex-grow-1 p-4">

        <!-- HEADER -->
        <div class="d-flex justify-content-between mb-4">
            <h3>Dashboard Mahasiswa</h3>
            <span>👋 <?php echo $_SESSION['nama']; ?></span>
        </div>

        <!-- WELCOME CARD -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5>Selamat datang, <?php echo $_SESSION['nama']; ?> 🎉</h5>
                <p>Semangat belajar hari ini! Jangan lupa cek tugas yang harus dikerjakan ya.</p>
            </div>
        </div>

<!-- LIST TUGAS -->
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5>📚 Daftar Tugas</h5>

        <?php
        require_once 'models/database.php';
        require_once 'models/Tugas.php';

        $db = new Database();
        $tugas = new Tugas($db->getKoneksi());
        $data = $tugas->all();
        ?>

        <table class="table table-hover mt-3">
            <thead class="table-primary">
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Deadline</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($data) > 0): 
                    while($row = mysqli_fetch_assoc($data)): ?>
                <tr>
                    <td class="fw-bold"><?= $row['judul'] ?></td>
                    <td><?= substr($row['deskripsi'],0,50) ?>...</td>
                    <td>
                        <span class="badge bg-warning text-dark">
                            <?= $row['deadline'] ?>
                        </span>
                    </td>
                    <td>
                        <!-- BUTTON DETAIL -->
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detail<?= $row['id'] ?>">
                            Detail
                        </button>
                    </td>
                </tr>

                <!-- MODAL DETAIL -->
                <div class="modal fade" id="detail<?= $row['id'] ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title"><?= $row['judul'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <p><b>Deskripsi:</b></p>
                                <p><?= $row['deskripsi'] ?></p>

                                <p><b>Deadline:</b> <?= $row['deadline'] ?></p>

                                <hr>

                                <!-- FORM UPLOAD -->
                                <form method="POST" action="index.php?page=upload_tugas" enctype="multipart/form-data">
                                    <input type="hidden" name="id_tugas" value="<?= $row['id'] ?>">

                                    <div class="mb-3">
                                        <label class="form-label">Upload File</label>
                                        <input type="file" name="file" class="form-control" required>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <!-- TANDAI SELESAI -->
                                        <a href="index.php?page=selesai_tugas&id=<?= $row['id'] ?>" 
                                           class="btn btn-outline-primary">
                                           ✔ Tandai Selesai
                                        </a>

                                        <!-- UPLOAD -->
                                        <button type="submit" class="btn btn-primary">
                                            ⬆ Upload
                                        </button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

                <?php endwhile; else: ?>
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Belum ada tugas
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>


        <!-- MOTIVASI -->
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>💡 Motivasi</h5>
                <p>"Jangan menunda pekerjaan, karena deadline tidak pernah menunda datangnya. selebeww"</p>
            </div>
        </div>

    </div>
</div>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>