<style>
body {
    background-color: #f4f6f9;
}

.card {
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
</style>


<div class="container-fluid">

    <!-- TITLE -->
    <div class="mb-4">
        <h4 class="fw-bold text text-primary">Dashboard</h4>
        <hr class="my-1 mx-start fw-bold border border-primary" style="width: 50px;">
        <small class="text-muted">Ringkasan data perpustakaan</small>
    </div>

    <div class="row g-4">
        <!-- CARD BUKU -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted small fw-bold mb-2">TOTAL BUKU</h6>
                        <h2 class="fw-bold mb-0"><?= $buku ?></h2>
                    </div>

                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-4">
                        <i class="bi bi-book-half fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD ANGGOTA -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted small fw-bold mb-2">TOTAL ANGGOTA</h6>
                        <h2 class="fw-bold mb-0"><?= $anggota ?></h2>
                    </div>

                    <div class="bg-success bg-opacity-10 text-success p-3 rounded-4">
                        <i class="bi bi-people-fill fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD PEMINJAMAN -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted small fw-bold mb-2">TOTAL PEMINJAMAN</h6>
                        <h2 class="fw-bold mb-0"><?= $peminjaman ?></h2>
                    </div>

                    <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-4">
                        <i class="bi bi-arrow-left-right fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>