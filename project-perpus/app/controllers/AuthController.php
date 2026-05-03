<?php
require_once __DIR__ . "/../../core/Controller.php";

class AuthController extends Controller {

    public function index() {
        $this->viewAuth("auth/login");
    }

    public function login() {
        $user = $this->model("User");

        $data = $user->login($_POST['username'], $_POST['password'], $_POST['role']);

        if ($data) {
            session_start();
            $_SESSION['user'] = $data;
            // Redirect ke dashboard untuk admin dan petugas
            header("Location: index.php?url=dashboard");
        } else {
            echo "<script>
                    alert('Username, password, atau role salah!');
                    window.location.href = 'index.php?url=auth';
                </script>";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php");
    }
}