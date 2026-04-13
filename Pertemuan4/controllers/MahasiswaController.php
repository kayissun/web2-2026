<?php
require_once 'models/database.php';
require_once 'models/Mahasiswa.php';

class MahasiswaController {

    private $model;

    public function __construct(){
        $db = new Database();
        $this->model = new Mahasiswa($db->getKoneksi());
    }

    public function index(){
        $data = $this->model->all();
        require 'views/admin/mahasiswa.php';
    }

    public function create(){
        $data = null;
        require 'views/admin/form_mahasiswa.php';
    }

    public function store(){
        $nim = trim($_POST['nim'] ?? '');
        $nama = trim($_POST['nama'] ?? '');
        $email = trim($_POST['email'] ?? '');

        if (!$nim || !$nama || !$email) {
            header("Location:index.php?page=form_mahasiswa&error=1");
            exit;
        }

        $this->model->insert($nim,$nama,$email);
        header("Location:index.php?page=mahasiswa&success=1");
    }

    public function edit(){
        $data = $this->model->find($_GET['id'] ?? '');
        require 'views/admin/form_mahasiswa.php';
    }

    public function update(){
        $id = $_POST['id'] ?? '';
        $nim = $_POST['nim'] ?? '';
        $nama = $_POST['nama'] ?? '';
        $email = $_POST['email'] ?? '';

        $this->model->update($id,$nim,$nama,$email);
        header("Location:index.php?page=mahasiswa&success=2");
    }

    public function delete(){
        $this->model->delete($_GET['id'] ?? '');
        header("Location:index.php?page=mahasiswa&success=3");
    }
}

// Router kecil
$controller = new MahasiswaController();

$action = $_GET['action'] ?? 'index';
$controller->$action();