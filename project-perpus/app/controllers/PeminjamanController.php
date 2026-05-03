<?php
require_once __DIR__ . "/../../core/Controller.php";

class PeminjamanController extends Controller {

    public function index() {

        if (isset($_GET['keyword']) || isset($_GET['status'])) {
            $peminjaman = $this->model("Peminjaman")->filter($_GET);
        } else {
            $peminjaman = $this->model("Peminjaman")->getAll();
        }

        $buku = $this->model("Buku")->getAll();
        $anggota = $this->model("Anggota")->getAll();

        $this->view("peminjaman/index", [
            "peminjaman" => $peminjaman,
            "buku" => $buku,
            "anggota" => $anggota
        ]);
    }

    public function simpan() {
        session_start();

        $result = $this->model("Peminjaman")->tambah($_POST);

        if ($result == "stok_habis") {
            $_SESSION['error'] = "Stok buku habis!";
        } else {
            $_SESSION['success'] = "Peminjaman berhasil ditambahkan";
        }

        header("Location: index.php?url=peminjaman");
    }

    public function kembali($id) {
        session_start();

        $this->model("Peminjaman")->kembali($id);

        $_SESSION['success'] = "Buku berhasil dikembalikan";
        header("Location: index.php?url=peminjaman");
    }

    public function hapus($id) {
        session_start();

        $this->model("Peminjaman")->hapus($id);

        $_SESSION['success'] = "Data peminjaman berhasil dihapus";
        header("Location: index.php?url=peminjaman");
    }

    // filter tanggal
    public function filterTanggal($dari, $sampai) {
    $query = "
        SELECT p.*, b.judul, a.nama 
        FROM peminjaman p
        JOIN buku b ON p.id_buku = b.id
        JOIN anggota a ON p.id_anggota = a.id
        WHERE tanggal_pinjam BETWEEN '$dari' AND '$sampai'
        ORDER BY p.id DESC
    ";

    return $this->conn->query($query);
    }
}