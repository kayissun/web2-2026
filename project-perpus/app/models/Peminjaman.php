<?php
require_once __DIR__ . "/../../core/Database.php";

class Peminjaman {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function getAll() {
        $query = "SELECT p.*, b.judul, a.nama 
                  FROM peminjaman p
                  JOIN buku b ON p.id_buku = b.id
                  JOIN anggota a ON p.id_anggota = a.id
                  ORDER BY p.id DESC";

        return $this->conn->query($query);
    }

    public function tambah($data) {
        $id_buku = (int)$data['id_buku'];
        $id_anggota = (int)$data['id_anggota'];
        $tgl_pinjam = $data['tanggal_pinjam'];
        $tgl_kembali = $data['tanggal_kembali'];

        // cek stok
        $cek = $this->conn->query("SELECT stok FROM buku WHERE id=$id_buku")->fetch_assoc();

        if ($cek['stok'] <= 0) {
            return "stok_habis";
        }

        // insert peminjaman
        $this->conn->query("
            INSERT INTO peminjaman (id_buku, id_anggota, tanggal_pinjam, tanggal_kembali, status)
            VALUES ($id_buku, $id_anggota, '$tgl_pinjam', '$tgl_kembali', 'dipinjam')
        ");

        // kurangi stok
        $this->conn->query("
            UPDATE buku SET stok = stok - 1 WHERE id=$id_buku
        ");

        return "sukses";
    }

    public function kembali($id) {
        $id = (int)$id;

        // ambil id buku
        $data = $this->conn->query("SELECT id_buku FROM peminjaman WHERE id=$id")->fetch_assoc();

        // update status
        $this->conn->query("UPDATE peminjaman SET status='kembali' WHERE id=$id");

        // tambah stok lagi
        $this->conn->query("UPDATE buku SET stok = stok + 1 WHERE id=".$data['id_buku']);
    }

    public function filter($data) {
        $keyword = $this->conn->real_escape_string($data['keyword'] ?? '');
        $status  = $data['status'] ?? '';

        $query = "SELECT p.*, b.judul, a.nama 
                FROM peminjaman p
                JOIN buku b ON p.id_buku = b.id
                JOIN anggota a ON p.id_anggota = a.id
                WHERE 1=1";

        if (!empty($keyword)) {
            $query .= " AND (b.judul LIKE '%$keyword%' OR a.nama LIKE '%$keyword%')";
        }

        if (!empty($status)) {
            $query .= " AND p.status = '$status'";
        }

        $query .= " ORDER BY p.id DESC";

        return $this->conn->query($query);
    }

    public function hapus($id) {
        $id = (int)$id;

        // ambil data dulu
        $data = $this->conn->query("SELECT * FROM peminjaman WHERE id=$id")->fetch_assoc();

        // kalau masih dipinjam, balikin stok
        if ($data['status'] == 'dipinjam') {
            $this->conn->query("
                UPDATE buku SET stok = stok + 1 
                WHERE id = ".$data['id_buku']."
            ");
        }

        // hapus data
        $this->conn->query("DELETE FROM peminjaman WHERE id=$id");
    }

    public function laporan($dari = null, $sampai = null) {

    $query = "
        SELECT p.*, b.judul, a.nama 
        FROM peminjaman p
        JOIN buku b ON p.id_buku = b.id
        JOIN anggota a ON p.id_anggota = a.id
        WHERE 1=1
    ";

    if ($dari && $sampai) {
        $query .= " AND tanggal_pinjam BETWEEN '$dari' AND '$sampai'";
    }

    $query .= " ORDER BY p.id DESC";

    return $this->conn->query($query);
    }
}