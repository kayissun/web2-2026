<?php
class AdminController {
    public function dashboard() {
        if (!isset($_SESSION['level']) || $_SESSION['level'] != 'admin') {
            header("Location: index.php?page=login");
            exit;
        }

        require 'views/admin/dashboard_admin.php';
    }

}