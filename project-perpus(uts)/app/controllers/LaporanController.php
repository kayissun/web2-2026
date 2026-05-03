<?php
require_once __DIR__ . "/../../core/Controller.php";

class LaporanController extends Controller {

    public function index() {

        $dari   = $_GET['dari'] ?? null;
        $sampai = $_GET['sampai'] ?? null;

        $data = $this->model("Peminjaman")->laporan($dari, $sampai);

        $this->view("laporan/index", [
            "data" => $data,
            "dari" => $dari,
            "sampai" => $sampai
        ]);
    }

    public function cetak() {

        $dari   = $_GET['dari'] ?? null;
        $sampai = $_GET['sampai'] ?? null;

        $data = $this->model("Peminjaman")->laporan($dari, $sampai);

        require_once "app/views/laporan/cetak.php";
    }
}