<?php
class Database {
    private $koneksi;

    public function __construct() {
        $this->koneksi = mysqli_connect("localhost", "root", "", "web2_tugas");

        if (!$this->koneksi) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    }

    public function getKoneksi() {
        return $this->koneksi;
    }
}