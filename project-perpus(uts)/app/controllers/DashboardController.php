<?php
require_once __DIR__ . "/../../core/Controller.php";
require_once __DIR__ . "/../../core/Database.php";

class DashboardController extends Controller {

    public function index() {
        $db = new Database();

        $buku = $db->conn->query("SELECT COUNT(*) as total FROM buku")->fetch_assoc();
        $anggota = $db->conn->query("SELECT COUNT(*) as total FROM anggota")->fetch_assoc();
        $peminjaman = $db->conn->query("SELECT COUNT(*) as total FROM peminjaman WHERE status='dipinjam'")->fetch_assoc();

        $this->view("dashboard/index", [
            "buku" => $buku['total'],
            "anggota" => $anggota['total'],
            "peminjaman" => $peminjaman['total']
        ]);
    }
}