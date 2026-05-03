<?php
require_once __DIR__ . "/../../core/Database.php";

class Buku {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function getAll() {
        $query = "SELECT * FROM buku";
        return $this->conn->query($query);
    }

    public function tambah($data) {
        $judul        = $this->conn->real_escape_string($data['judul']);
        $penulis      = strtoupper($this->conn->real_escape_string($data['penulis']));
        $penerbit     = $this->conn->real_escape_string($data['penerbit']);
        $tahun_terbit = (int)$data['tahun_terbit'];
        $stok         = (int)$data['stok'];

        $query = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, stok)
                VALUES ('$judul', '$penulis', '$penerbit', '$tahun_terbit', '$stok')";

        return $this->conn->query($query);
    }

    public function hapus($id) {
        $id = (int)$id;
        $query = "DELETE FROM buku WHERE id = $id";
        return $this->conn->query($query);
    }

    public function getById($id) {
        $id = (int)$id;
        return $this->conn->query("SELECT * FROM buku WHERE id=$id")->fetch_assoc();
    }

    public function update($id, $data) {
        $id           = (int)$id;
        $judul        = $this->conn->real_escape_string($data['judul']);
        $penulis      = strtoupper($this->conn->real_escape_string($data['penulis']));
        $penerbit     = $this->conn->real_escape_string($data['penerbit']);
        $tahun_terbit = (int)$data['tahun_terbit'];
        $stok         = (int)$data['stok'];

        $query = "UPDATE buku SET 
                    judul='$judul',
                    penulis='$penulis',
                    penerbit='$penerbit',
                    tahun_terbit='$tahun_terbit',
                    stok='$stok'
                WHERE id=$id";

        return $this->conn->query($query);
    }

    public function filter($data) {
        $keyword  = $this->conn->real_escape_string($data['keyword'] ?? '');
        $penulis  = $this->conn->real_escape_string($data['penulis'] ?? '');
        $sort     = $data['sort'] ?? '';

        $query = "SELECT * FROM buku WHERE 1=1";

        if (!empty($keyword)) {
            $query .= " AND judul LIKE '%$keyword%'";
        }

        if (!empty($penulis)) {
            $query .= " AND penulis LIKE '%$penulis%'";
        }

        if ($sort == 'asc') {
            $query .= " ORDER BY stok ASC";
        } elseif ($sort == 'desc') {
            $query .= " ORDER BY stok DESC";
        }

        return $this->conn->query($query);
    }

}