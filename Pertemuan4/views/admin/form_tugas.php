<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($data) ? 'Edit' : 'Tambah'; ?> Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
        }

        .card-form {
            border-radius: 15px;
        }

        .form-control {
            border-radius: 10px;
        }

        textarea.form-control {
            resize: none;
        }

        .btn {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">

    <div class="col-md-5">
        <div class="card shadow-sm card-form p-4">

            <h4 class="mb-4 text-center">
                <?php echo isset($data) ? 'Edit' : 'Tambah'; ?> Tugas
            </h4>

            <?php if(isset($_GET['error'])): ?>
                <div class="alert alert-danger text-center">
                    <?php if($_GET['error'] == 1): ?>
                        Semua field harus diisi!
                    <?php else: ?>
                        Terjadi kesalahan. Silakan coba lagi!
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo isset($data) ? 'index.php?page=tugas&action=update' : 'index.php?page=tugas&action=store'; ?>">

                <?php if(isset($data)): ?>
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" 
                           placeholder="Judul Tugas"
                           value="<?php echo isset($data) ? $data['judul'] : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4"
                              placeholder="Deskripsi Tugas" required><?php echo isset($data) ? $data['deskripsi'] : ''; ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Deadline</label>
                    <input type="date" name="deadline" class="form-control"
                           value="<?php echo isset($data) ? $data['deadline'] : ''; ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="index.php?page=tugas" class="btn btn-secondary w-45">
                        ← Kembali
                    </a>
                    <button type="submit" class="btn btn-primary w-45">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>