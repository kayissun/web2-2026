<?php
require_once 'models/database.php';
require_once 'models/User.php';

class AuthController {
    private $user;

    public function __construct() {
        $db = new Database();
        $this->user = new User($db->getKoneksi());
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?page=login");
            exit;
        }

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (!$username || !$password) {
            header("Location: index.php?page=login&error=1");
            exit;
        }

        $user = $this->user->findByUsername($username);

        if (!$user || !password_verify($password, $user['password'])) {
            header("Location: index.php?page=login&error=3");
            exit;
        }

        $_SESSION['id'] = $user['id_user'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['level'] = $user['level'];

        if ($user['level'] == 'admin') {
            header("Location: index.php?page=dashboard_admin");
        } else if ($user['level'] == 'mahasiswa') {
            header("Location: index.php?page=dashboard_mahasiswa");
        }
        exit;
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?page=login");
        exit;
    }
}