<?php
session_start();

$page = $_GET['page'] ?? 'login';

// Load dasar
require_once 'models/database.php';
require_once 'models/User.php';
require_once 'controllers/AuthController.php';

switch ($page) {

    case 'login':
        require 'views/login.php';
        break;

    case 'login-proses':
        (new AuthController())->login();
        break;

    case 'logout':
        (new AuthController())->logout();
        break;
        
        case 'dashboard_admin':
            require 'controllers/AdminController.php';
            $controller = new AdminController();
            $controller->dashboard();
            break;

     case 'dashboard_mahasiswa':
    if (!isset($_SESSION['level']) || $_SESSION['level'] != 'mahasiswa') {
        header("Location: index.php?page=login");
        exit;
    }
    require 'views/mahasiswa/dashboard_mhs.php';
    break;

    case 'mahasiswa':
    case 'form_mahasiswa':
        require 'controllers/MahasiswaController.php';
        break;

    case 'tugas':
    case 'form_tugas':
        require 'controllers/TugasController.php';
    break;

    case 'upload_tugas':
        echo "oke trimagaji";
        break;

    case 'selesai_tugas':
        echo "Tugas ditandai selesai!";
        break;

    default:
        require 'views/login.php';
}