<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0 text text-primary">Laporan Transaksi</h4>
        <hr class="my-1 mx-start fw-bold border border-primary" style="width: 50px;">
            <small class="text-muted">Rekap peminjaman dan pengembalian</small>
        </div>

        <a href="index.php?url=laporan/cetak" class="btn btn-light border">
            <i class="bi bi-printer"></i> Cetak Laporan
        </a>
    </div>

    <!-- CARD FILTER -->
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <form method="GET" action="index.php">
                <input type="hidden" name="url" value="laporan">

                <div class="row g-3 align-items-end">

                    <!-- DARI TANGGAL -->
                    <div class="col-md-3">
                        <label class="form-label text-muted small">Dari Tanggal</label>
                        <input type="date" name="dari" class="form-control"
                               value="<?= $_GET['dari'] ?? date('Y-m-d') ?>">
                    </div>

                    <!-- SAMPAI TANGGAL -->
                    <div class="col-md-3">
                        <label class="form-label text-muted small">Sampai Tanggal</label>
                        <input type="date" name="sampai" class="form-control"
                               value="<?= $_GET['sampai'] ?? '' ?>">
                    </div>

                    <!-- BUTTON -->
                    <div class="col-md-3">
                        <button class="btn btn-primary w-100">
                            Filter Data
                        </button>
                    </div>
                    <div class="col-md-3">
                        <a href="index.php?url=laporan" class="btn btn-secondary w-100">
                            Reset Filter
                        </a>
                    </div>

                </div>
            </form>

            <!-- TABLE -->
            <div class="table-responsive mt-4">
                <table class="table table-borderless align-middle">
                    <thead class="text-muted small border-bottom">
                        <tr>
                            <th>WAKTU</th>
                            <th>BUKU</th>
                            <th>ANGGOTA</th>
                            <th>RETURN</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if($data->num_rows > 0): ?>
                            <?php while($d = $data->fetch_assoc()): ?>
                                <tr class="border-bottom">
                                    <td><?= $d['tanggal_pinjam'] ?></td>
                                    <td><?= $d['judul'] ?></td>
                                    <td><?= $d['nama'] ?></td>
                                    <td><?= $d['tanggal_kembali'] ?></td>

                                    <td>
                                        <?php if($d['status']=='dipinjam'): ?>
                                            <span class="badge bg-warning text-dark">
                                                Dipinjam
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-success">
                                                Kembali
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>

                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Tidak ada data
                                </td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>