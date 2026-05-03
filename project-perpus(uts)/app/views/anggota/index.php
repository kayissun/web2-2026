<div class="container-fluid">

    <!-- TITLE -->
    <div class="mb-3">
        <h4 class="fw-bold text-primary">Data Anggota</h4>
        <hr class="my-1 mx-start fw-bold border border-primary" style="width: 50px;">
        <small class="text-muted">Kelola data anggota disini</small>
    </div>

    <!-- bootstrap alert  -->
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php unset($_SESSION['success']); endif; ?>

    <!-- FILTER CARD -->
    <form method="GET" action="index.php" class="card shadow-sm mb-3">
        <div class="card-body d-flex gap-2 flex-wrap">

            <input type="hidden" name="url" value="anggota">

            <input type="text" name="keyword" class="form-control w-auto"
                placeholder="Cari Nama..."
                value="<?= $_GET['keyword'] ?? '' ?>">

            <button class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>

            <a href="index.php?url=anggota" class="btn btn-secondary">
                Reset
            </a>

        </div>
    </form>

    <!-- ACTION BUTTON -->
    <div class="action mb-3 d-flex justify-content-end">
        <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-lg"></i> Tambah Anggota
        </button>
    </div>

    <!-- TABLE -->
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0 align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1; foreach($anggota as $a): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $a['nama'] ?></td>
                        <td><?= $a['alamat'] ?></td>
                        <td class="text-center">

                            <!-- EDIT -->
                            <button 
                                class="btn btn-warning btn-sm btn-edit"
                                data-id="<?= $a['id'] ?>"
                                data-nama="<?= $a['nama'] ?>"
                                data-alamat="<?= $a['alamat'] ?>"
                                data-bs-toggle="modal" 
                                data-bs-target="#modalEdit">
                                Edit
                            </button>

                            <!-- HAPUS -->
                            <a href="index.php?url=anggota/hapus/<?= $a['id'] ?>" 
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin hapus data?')">
                                Hapus
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

<!-- modal tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- HEADER -->
      <div class="modal-header">
        <h5 class="modal-title">Tambah Anggota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- BODY -->
      <form method="POST" action="index.php?url=anggota/simpan">
        <div class="modal-body">

          <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required></textarea>
          </div>

        </div>

        <!-- FOOTER -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- modal edit -->
<div class="modal fade" id="modalEdit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5>Edit Anggota</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST" id="formEdit">
        <div class="modal-body">

          <input type="hidden" name="id" id="edit_id">

          <div class="mb-2">
            <label>Nama</label>
            <input type="text" name="nama" id="edit_nama" class="form-control">
          </div>

          <div class="mb-2">
            <label>Alamat</label>
            <textarea name="alamat" id="edit_alamat" class="form-control" rows="3"></textarea>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>

      </form>

    </div>
  </div>
</div>

<script>
document.querySelectorAll('.btn-edit').forEach(btn => {
    btn.addEventListener('click', function() {

        document.getElementById('edit_id').value = this.dataset.id;
        document.getElementById('edit_nama').value = this.dataset.nama;
        document.getElementById('edit_alamat').value = this.dataset.alamat;

        document.getElementById('formEdit').action =
            "index.php?url=anggota/update/" + this.dataset.id;

    });
});
</script>

