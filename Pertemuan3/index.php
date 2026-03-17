<!-- File LOGic -->
<?php
session_start();

$page = $_GET['page'] ?? 'login';

switch ($page) {

    case 'login':
        require 'views/login.php';
        break;

    case 'login-proses':
        require 'controllers/AuthController.php';
        break;

    case 'logout':
        require 'controllers/AuthController.php';
        break;

    case 'dashboard':
        if (!isset($_SESSION['level'])) {
            header("Location: index.php?page=login");
            exit;
        }

        if ($_SESSION['level'] == 'admin') {
            require 'controllers/AdminController.php';
        } else {
            require 'views/dashboard.php';
        }
        break;

    case 'mahasiswa':
        require 'controllers/MahasiswaController.php';
        break;

    case 'form_mahasiswa':
        require 'controllers/MahasiswaController.php';
        break;

    case 'tugas':
        require 'controllers/TugasController.php';
        break;

    case 'form_tugas':
        require 'controllers/TugasController.php';
        break;

    default:
        require 'views/login.php';
        break;
}