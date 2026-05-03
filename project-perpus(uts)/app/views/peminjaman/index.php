<div class="container-fluid">


<div class="mb-3">
    <h4 class="fw-bold text-primary">Transaksi Peminjaman</h4>
    <hr class="my-1 mx-start fw-bold border border-primary" style="width: 50px;">
    <small class="text-muted">Kelola data peminjaman buku</small>
</div>


<!-- NOTIF -->
<?php if(isset($_SESSION['success'])): ?>
<div class="alert alert-success">
    <?= $_SESSION['success']; ?>
</div>
<?php unset($_SESSION['success']); endif; ?>


<!-- pencarian dan filter status -->
<form method="GET" action="index.php" class="card shadow-sm mb-3">
    <div class="card-body d-flex gap-2 flex-wrap">

        <input type="hidden" name="url" value="peminjaman">

        <!-- SEARCH -->
        <input type="text" name="keyword" class="form-control w-auto"
               placeholder="Cari buku / anggota..."
               value="<?= $_GET['keyword'] ?? '' ?>">

        <!-- FILTER STATUS -->
        <select name="status" class="form-select w-auto">
            <option value="">Semua Status</option>
            <option value="dipinjam" <?= (($_GET['status'] ?? '')=='dipinjam')?'selected':'' ?>>
                Dipinjam
            </option>
            <option value="kembali" <?= (($_GET['status'] ?? '')=='kembali')?'selected':'' ?>>
                Kembali
            </option>
        </select>

        <!-- BUTTON -->
        <button class="btn btn-primary">
            <i class="bi bi-search"></i>
        </button>
        
        <a href="index.php?url=peminjaman" class="btn btn-secondary">
            Reset
        </a>
        
    </div>
</form>

<!-- button tambah -->
<div class="action mb-3 d-flex justify-content-end">
    <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg"></i> Tambah Peminjaman
    </button>
</div>

<!-- TABLE -->
<div class="card shadow-sm">
    <table class="table table-bordered table-hover mb-0">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Buku</th>
                <th>Anggota</th>
                <th>Tanggal</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $no=1; foreach($peminjaman as $p): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $p['judul'] ?></td>
                <td><?= $p['nama'] ?></td>
                <td><?= $p['tanggal_pinjam'] ?></td>
                <td><?= $p['tanggal_kembali'] ?></td>

                <td>
                    <?php if($p['status']=='dipinjam'): ?>
                        <span class="badge bg-warning text-dark">Dipinjam</span>
                    <?php else: ?>
                        <span class="badge bg-success">Kembali</span>
                    <?php endif; ?>
                    
                </td>

                <td>
                    <?php if($p['status']=='dipinjam'): ?>
                        <a href="index.php?url=peminjaman/kembali/<?= $p['id'] ?>" 
                        class="btn btn-success btn-sm">
                        Selesaikan
                        </a>

                    <?php else: ?>
                        <a href="index.php?url=peminjaman/hapus/<?= $p['id'] ?>" 
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus data ini?')">
                        Hapus
                        </a>

                    <?php endif; ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>

<!-- MODAL TAMBAH PEMINJAMAN -->
<div class="modal fade" id="modalTambah" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">

<form method="POST" action="index.php?url=peminjaman/simpan">

<div class="modal-header">
    <h5>Tambah Peminjaman</h5>
    <button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

    <div class="mb-2">
        <label>Buku</label>
        <select name="id_buku" class="form-control">
            <?php foreach($buku as $b): ?>
                <option value="<?= $b['id'] ?>"><?= $b['judul'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-2">
        <label>Anggota</label>
        <select name="id_anggota" class="form-control">
            <?php foreach($anggota as $a): ?>
                <option value="<?= $a['id'] ?>"><?= $a['nama'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-2">
        <label>Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" class="form-control" value="<?= date('Y-m-d') ?>" required>
    </div>

    <div class="mb-2">
        <label>Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" class="form-control" required>
    </div>

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
    <button class="btn btn-primary">Simpan</button>
</div>

</form>

</div>
</div>
</div>