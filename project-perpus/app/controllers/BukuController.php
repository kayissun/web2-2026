<?php
require_once __DIR__ . "/../../core/Controller.php";

class BukuController extends Controller {

    public function index() {
        if (isset($_GET['keyword']) || isset($_GET['penulis']) || isset($_GET['sort'])) {
            $buku = $this->model("Buku")->filter($_GET);
        } else {
            $buku = $this->model("Buku")->getAll();
        }

        $this->view("buku/index", ["buku" => $buku]);
    }

    public function tambah() {
        $this->view("buku/tambah");
    }

    public function simpan() {
        session_start();

        $this->model("Buku")->tambah($_POST);

        $_SESSION['success'] = "Data buku berhasil ditambahkan.";

        header("Location: index.php?url=buku");
    }

    public function update($id) {
        session_start();

        $this->model("Buku")->update($id, $_POST);

        $_SESSION['success'] = "Data buku berhasil diupdate.";
        header("Location: index.php?url=buku");
    }

    public function hapus($id) {
        session_start();

        $this->model("Buku")->hapus($id);

        $_SESSION['success'] = "Data buku berhasil dihapus.";
        header("Location: index.php?url=buku");
    }
}