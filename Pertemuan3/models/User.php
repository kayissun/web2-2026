<?php
class User {
    private $db;
    private $table = 'users';

    public function __construct($koneksi) {
        $this->db = $koneksi;
    }

    public function login($username, $password) {
        $username = mysqli_real_escape_string($this->db, $username);
        $query = "SELECT * FROM " . $this->table . " WHERE username='" . $username . "'";
        $result = mysqli_query($this->db, $query);

        if (!$result) {
            die("Query Error: " . mysqli_error($this->db) . "<br>Query: " . $query);
        }

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
            // Verify password
            if (password_verify($password, $row['password'])) {
                return $row;
            }
        }
        
        return false;
    }

    public function all() {
        $query = "SELECT * FROM " . $this->table;
        return mysqli_query($this->db, $query);
    }

    public function find($id) {
        $id = mysqli_real_escape_string($this->db, $id);
        $query = "SELECT * FROM " . $this->table . " WHERE id_user='" . $id . "'";
        return mysqli_query($this->db, $query);
    }

    public function findByUsername($username) {
        $username = mysqli_real_escape_string($this->db, $username);
        $query = "SELECT * FROM " . $this->table . " WHERE username='" . $username . "'";
        $result = mysqli_query($this->db, $query);

        if (!$result) {
            return false;
        }

        return (mysqli_num_rows($result) > 0) ? mysqli_fetch_assoc($result) : false;
    }

    public function insert($nama, $username, $password, $level, $alamat) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $username = mysqli_real_escape_string($this->db, $username);
        $nama = mysqli_real_escape_string($this->db, $nama);
        $alamat = mysqli_real_escape_string($this->db, $alamat);
        $level = mysqli_real_escape_string($this->db, $level);
        
        $query = "INSERT INTO " . $this->table . " (nama, username, password, level, alamat)
                 VALUES ('" . $nama . "','" . $username . "','" . $password . "','" . $level . "','" . $alamat . "')";
        
        return mysqli_query($this->db, $query);
    }

    public function update($id, $nama, $username, $level, $alamat) {
        $id = mysqli_real_escape_string($this->db, $id);
        $username = mysqli_real_escape_string($this->db, $username);
        $nama = mysqli_real_escape_string($this->db, $nama);
        $alamat = mysqli_real_escape_string($this->db, $alamat);
        $level = mysqli_real_escape_string($this->db, $level);
        
        $query = "UPDATE " . $this->table . " SET
                    nama='" . $nama . "',
                    username='" . $username . "',
                    level='" . $level . "',
                    alamat='" . $alamat . "'
                 WHERE id_user='" . $id . "'";
        
        return mysqli_query($this->db, $query);
    }

    public function delete($id) {
        $id = mysqli_real_escape_string($this->db, $id);
        $query = "DELETE FROM " . $this->table . " WHERE id_user='" . $id . "'";
        return mysqli_query($this->db, $query);
    }
}