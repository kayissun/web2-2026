<?php
require_once 'models/database.php';
require_once 'models/User.php';

class AdminController {
    private $user;

    public function __construct() {
        $database = new Database();
        $koneksi = $database->getKoneksi();
        $this->user = new User($koneksi);
    }

    public function dashboard() {
        require 'views/dashboard.php';
    }
}

// Jalankan controller
$admin = new AdminController();
$admin->dashboard();