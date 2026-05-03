<?php
require_once __DIR__ . "/../../core/Database.php";

class Anggota {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function getAll() {
        return $this->conn->query("SELECT * FROM anggota ORDER BY id DESC");
    }

    public function tambah($data) {
        $nama   = $this->conn->real_escape_string($data['nama']);
        $alamat = $this->conn->real_escape_string($data['alamat']);

        $query = "INSERT INTO anggota (nama, alamat)
                VALUES ('$nama', '$alamat')";

        return $this->conn->query($query);
    }

    public function hapus($id) {
        $id = (int)$id;
        $query = "DELETE FROM anggota WHERE id = $id";
        return $this->conn->query($query);
    }

    public function getById($id) {
        $id = (int)$id;
        return $this->conn->query("SELECT * FROM anggota WHERE id=$id")->fetch_assoc();
    }

    public function update($id, $data) {
        $id     = (int)$id;
        $nama   = $this->conn->real_escape_string($data['nama']);
        $alamat = $this->conn->real_escape_string($data['alamat']);

        $query = "UPDATE anggota SET 
                    nama='$nama',
                    alamat='$alamat'
                WHERE id=$id";

        return $this->conn->query($query);
    }

    public function filter($data) {
        $keyword = $this->conn->real_escape_string($data['keyword'] ?? '');

        $query = "SELECT * FROM anggota WHERE 1=1";

        if (!empty($keyword)) {
            $query .= " AND nama LIKE '%$keyword%'";
        }

        return $this->conn->query($query);
    }
}
