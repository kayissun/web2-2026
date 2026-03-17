<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "web2_tugas";
    private $koneksi;

    public function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        
        if (!$this->koneksi) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Auto-setup database jika belum ada
        $this->setupDatabase();
    }

    private function setupDatabase() {
        // Cek apakah tabel users sudah ada
        $result = mysqli_query($this->koneksi, "SHOW TABLES LIKE 'users'");
        
        if (mysqli_num_rows($result) == 0) {
            // Buat tabel users
            $createTable = "CREATE TABLE users (
                id_user INT AUTO_INCREMENT PRIMARY KEY,
                nama VARCHAR(100) NOT NULL,
                username VARCHAR(100) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                level ENUM('admin', 'user') NOT NULL DEFAULT 'user',
                alamat LONGTEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            
            if (!mysqli_query($this->koneksi, $createTable)) {
                die("Error membuat tabel: " . mysqli_error($this->koneksi));
            }

            // Insert admin default
            $adminPassword = password_hash("123", PASSWORD_DEFAULT);
            $insertAdmin = "INSERT INTO users (nama, username, password, level, alamat) 
                           VALUES ('Admin', 'admin', '$adminPassword', 'admin', 'Jalan Admin')";
            
            if (!mysqli_query($this->koneksi, $insertAdmin)) {
                die("Error insert admin: " . mysqli_error($this->koneksi));
            }

            // Insert user default
            $userPassword = password_hash("123", PASSWORD_DEFAULT);
            $insertUser = "INSERT INTO users (nama, username, password, level, alamat) 
                          VALUES ('User Test', 'user', '$userPassword', 'user', 'Jalan User')";
            
            if (!mysqli_query($this->koneksi, $insertUser)) {
                die("Error insert user: " . mysqli_error($this->koneksi));
            }
        }

        // Cek apakah tabel mahasiswa sudah ada
        $resultMahasiswa = mysqli_query($this->koneksi, "SHOW TABLES LIKE 'mahasiswa'");
        
        if (mysqli_num_rows($resultMahasiswa) == 0) {
            // Buat tabel mahasiswa
            $createMahasiswa = "CREATE TABLE mahasiswa (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nim VARCHAR(20) NOT NULL UNIQUE,
                nama VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL,
                telepon VARCHAR(20),
                alamat LONGTEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            
            if (!mysqli_query($this->koneksi, $createMahasiswa)) {
                die("Error membuat tabel mahasiswa: " . mysqli_error($this->koneksi));
            }
        }
    }

    public function getKoneksi() {
        return $this->koneksi;
    }

    public function close() {
        mysqli_close($this->koneksi);
    }
}