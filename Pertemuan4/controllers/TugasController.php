<?php
require_once 'models/database.php';
require_once 'models/Tugas.php';

class TugasController {

    private $model;

    public function __construct(){
        $db = new Database();
        $this->model = new Tugas($db->getKoneksi());
    }

    public function index(){
        $data = $this->model->all();
        require 'views/admin/tugas.php';
    }

    public function create(){
        $data = null;
        require 'views/admin/form_tugas.php';
    }

    public function store(){
        $judul = $_POST['judul'] ?? '';
        $deskripsi = $_POST['deskripsi'] ?? '';
        $deadline = $_POST['deadline'] ?? '';

        if (!$judul || !$deskripsi || !$deadline) {
            header("Location:index.php?page=form_tugas&error=1");
            exit;
        }

        $this->model->insert($judul,$deskripsi,$deadline);
        header("Location:index.php?page=tugas&success=1");
    }

    public function edit(){
        $data = $this->model->find($_GET['id'] ?? '');
        require 'views/admin/form_tugas.php';
    }

    public function update(){
        $this->model->update(
            $_POST['id'],
            $_POST['judul'],
            $_POST['deskripsi'],
            $_POST['deadline']
        );

        header("Location:index.php?page=tugas&success=2");
    }

    public function delete(){
        $this->model->delete($_GET['id']);
        header("Location:index.php?page=tugas&success=3");
    }
}

$controller = new TugasController();
$action = $_GET['action'] ?? 'index';
$controller->$action();