<!DOCTYPE html>
<html>
<head>
    <title>Admin - Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="d-flex">
        <!-- SIDEBAR -->
        <?php include __DIR__ . '/../layout/sidebar_admin.php'; ?>

        <!-- CONTENT -->
        <div class="flex-grow-1 p-4">

            <!-- TOP BAR -->
            <div class="d-flex justify-content-between mb-4">
                <h3>Manajemen Mahasiswa</h3>
                <span>👋 <?php echo $_SESSION['nama']; ?></span>
            </div>

            <a href="index.php?page=mahasiswa&action=create" class="btn btn-primary mb-3">
                + Tambah Mahasiswa
            </a>

            <!-- TABLE -->
            <div class="card shadow-sm">
                <div class="card-body">

                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $no = 1;
                            if(mysqli_num_rows($data) > 0):
                                while($row = mysqli_fetch_assoc($data)):
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><span class="badge bg-secondary"><?= $row['nim'] ?></span></td>
                                <td class="fw-bold"><?= $row['nama'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td>
                                    <a href="index.php?page=mahasiswa&action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?page=mahasiswa&action=delete&id=<?= $row['id'] ?>" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin?')">
                                    Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted">Tidak ada data</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

</body>
</html>