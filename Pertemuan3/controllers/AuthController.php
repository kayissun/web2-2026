<?php
require_once 'models/database.php';
require_once 'models/User.php';

class AuthController {
    private $user;

    public function __construct() {
        $database = new Database();
        $koneksi = $database->getKoneksi();
        $this->user = new User($koneksi);
    }

    public function login() {
        // Validasi POST data
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            header("Location: index.php?page=login&error=1");
            exit;
        }

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Validasi input tidak kosong
        if (empty($username) || empty($password)) {
            header("Location: index.php?page=login&error=1");
            exit;
        }

        // Cek apakah user ada
        $userRow = $this->user->findByUsername($username);

        if (!$userRow) {
            // user tidak ditemukan
            header("Location: index.php?page=login&error=2");
            exit;
        }

        // Periksa password
        if (!password_verify($password, $userRow['password'])) {
            header("Location: index.php?page=login&error=3");
            exit;
        }

        $data = $userRow;

        if ($data) {
            $_SESSION['id']    = $data['id_user'];
            $_SESSION['nama']  = $data['nama'];
            $_SESSION['level'] = $data['level'];

            // Redirect ke daftar_barang untuk pelanggan, dashboard untuk admin
            $page = ($_SESSION['level'] == 'admin') ? 'dashboard' : 'daftar_barang';
            header("Location: index.php?page=" . $page);
            exit;
        }

        header("Location: index.php?page=login&error=1");
        exit;
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?page=login");
        exit;
    }
}

// Jalankan controller
$auth = new AuthController();

// Check apakah ini request logout
$isLogout = isset($_REQUEST['action']) && $_REQUEST['action'] === 'logout';

if ($isLogout) {
    $auth->logout();
} else {
    $auth->login();
}