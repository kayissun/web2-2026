<div class="container-fluid">

    <!-- TITLE -->
    <div class="mb-3">
        <h4 class="fw-bold text-primary">Data Buku</h4>
        <hr class="my-1 mx-start fw-bold border border-primary" style="width: 50px;">
        <small class="text-muted">Kelola data buku disini</small>
    </div>

    <!-- bootsrap alert  -->
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php unset($_SESSION['success']); endif; ?>

    <!-- FILTER CARD -->
    <form method="GET" action="index.php" class="card shadow-sm mb-3">
        <div class="card-body d-flex gap-2 flex-wrap">

            <input type="hidden" name="url" value="buku">

            <input type="text" name="keyword" class="form-control w-auto"
                placeholder="Cari Judul..."
                value="<?= $_GET['keyword'] ?? '' ?>">

            <input type="text" name="penulis" class="form-control w-auto"
                placeholder="Penulis"
                value="<?= $_GET['penulis'] ?? '' ?>">

            <select name="sort" class="form-select w-auto">
                <option value="">Urutkan</option>
                <option value="asc" <?= (($_GET['sort'] ?? '')=='asc')?'selected':'' ?>>Stok ASC</option>
                <option value="desc" <?= (($_GET['sort'] ?? '')=='desc')?'selected':'' ?>>Stok DESC</option>
            </select>

            <button class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>

            <a href="index.php?url=buku" class="btn btn-secondary">
                Reset
            </a>

        </div>
    </form>

    <!-- ACTION BUTTON -->
    <div class="action mb-3 d-flex justify-content-end">
        <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-lg"></i> Tambah Buku
        </button>
    </div>

    <!-- TABLE -->
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0 align-middle ">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1; foreach($buku as $b): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $b['judul'] ?></td>
                        <td><?= $b['penulis'] ?></td>
                        <td><?= $b['penerbit'] ?></td>
                        <td><?= $b['tahun_terbit'] ?></td>
                        <td><?= $b['stok'] ?></td>
                        <td class="text-center">

                            <!-- EDIT -->
                            <button 
                                class="btn btn-warning btn-sm btn-edit"
                                data-id="<?= $b['id'] ?>"
                                data-judul="<?= $b['judul'] ?>"
                                data-penulis="<?= $b['penulis'] ?>"
                                data-penerbit="<?= $b['penerbit'] ?>"
                                data-tahun="<?= $b['tahun_terbit'] ?>"
                                data-stok="<?= $b['stok'] ?>"
                                data-bs-toggle="modal" 
                                data-bs-target="#modalEdit">
                                Edit
                            </button>

                            <!-- HAPUS -->
                            <a href="index.php?url=buku/hapus/<?= $b['id'] ?>" 
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
<div class="modal fade" id="modalTambah" tabindex="1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- HEADER -->
      <div class="modal-header">
        <h5 class="modal-title">Tambah Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- BODY -->
      <form method="POST" action="index.php?url=buku/simpan">
        <div class="modal-body">

          <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="penulis" class="form-control" required required onkeyup="this.value = this.value.toUpperCase()">
          </div>

        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="penerbit" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="form-control" placeholder="2024" required>
        </div>

          <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
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
<div class="modal fade" id="modalEdit" tabindex="1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5>Edit Buku</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST" id="formEdit">
        <div class="modal-body">

          <input type="hidden" name="id" id="edit_id">

          <div class="mb-2">
            <label>Judul</label>
            <input type="text" name="judul" id="edit_judul" class="form-control">
          </div>

          <div class="mb-2">
            <label>Penulis</label>
            <input type="text" name="penulis" id="edit_penulis" 
                   class="form-control"
                   onkeyup="this.value=this.value.toUpperCase()">
          </div>

          <div class="mb-2">
            <label>Penerbit</label>
            <input type="text" name="penerbit" id="edit_penerbit" class="form-control">
          </div>

          <div class="mb-2">
            <label>Tahun</label>
            <input type="number" name="tahun_terbit" id="edit_tahun" class="form-control">
          </div>

          <div class="mb-2">
            <label>Stok</label>
            <input type="number" name="stok" id="edit_stok" class="form-control">
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
        document.getElementById('edit_judul').value = this.dataset.judul;
        document.getElementById('edit_penulis').value = this.dataset.penulis;
        document.getElementById('edit_penerbit').value = this.dataset.penerbit;
        document.getElementById('edit_tahun').value = this.dataset.tahun;
        document.getElementById('edit_stok').value = this.dataset.stok;

        document.getElementById('formEdit').action =
            "index.php?url=buku/update/" + this.dataset.id;

    });
});
</script>

