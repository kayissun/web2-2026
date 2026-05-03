<?php
require_once __DIR__ . "/../../core/Controller.php";

class AnggotaController extends Controller {

    public function index() {
        if (isset($_GET['keyword'])) {
            $anggota = $this->model("Anggota")->filter($_GET);
        } else {
            $anggota = $this->model("Anggota")->getAll();
        }

        $this->view("anggota/index", ["anggota" => $anggota]);
    }

    public function tambah() {
        $this->view("anggota/tambah");
    }

    public function simpan() {
        session_start();

        $this->model("Anggota")->tambah($_POST);

        $_SESSION['success'] = "Data anggota berhasil ditambahkan.";

        header("Location: index.php?url=anggota");
    }

    public function update($id) {
        session_start();

        $this->model("Anggota")->update($id, $_POST);

        $_SESSION['success'] = "Data anggota berhasil diupdate.";
        header("Location: index.php?url=anggota");
    }

    public function hapus($id) {
        session_start();

        $this->model("Anggota")->hapus($id);

        $_SESSION['success'] = "Data anggota berhasil dihapus.";
        header("Location: index.php?url=anggota");
    }
}
