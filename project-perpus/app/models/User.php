<?php
require_once __DIR__ . "/../../core/Database.php";

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($username, $password, $role) {
        $query = "SELECT * FROM users WHERE username='$username' AND role='$role'";
        $result = $this->db->conn->query($query);

        if ($data = $result->fetch_assoc()) {
            if ($password == $data['password']) {
                return $data;
            }
        }
        return false;
    }
}