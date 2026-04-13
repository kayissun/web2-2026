<?php
class User {
    private $db;
    private $table = 'users';

    public function __construct($koneksi) {
        $this->db = $koneksi;
    }

    public function findByUsername($username) {
        $username = mysqli_real_escape_string($this->db, $username);
        $query = "SELECT * FROM $this->table WHERE username='$username'";
        $result = mysqli_query($this->db, $query);

        return ($result && mysqli_num_rows($result) > 0)
            ? mysqli_fetch_assoc($result)
            : false;
    }
}