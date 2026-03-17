<?php
require_once 'models/database.php';
require_once 'models/Tugas.php';

class TugasController {

    private $model;

    public function __construct(){
        $db = new Database();
        $koneksi = $db->getKoneksi();
        $this->model = new Tugas($koneksi);
    }

    public function index(){
        $data = $this->model->all();
        require 'views/tugas.php';
    }

    public function create(){
        $data = null;
        require 'views/form_tugas.php';
    }

    public function store(){
        if(!isset($_POST['judul']) || !isset($_POST['deskripsi']) || !isset($_POST['deadline'])){
            header("Location:index.php?page=form_tugas&error=1");
            exit;
        }

        $judul = trim($_POST['judul']);
        $deskripsi = trim($_POST['deskripsi']);
        $deadline = trim($_POST['deadline']);

        if(empty($judul) || empty($deskripsi) || empty($deadline)){
            header("Location:index.php?page=form_tugas&error=1");
            exit;
        }

        if($this->model->insert($judul,$deskripsi,$deadline)){
            header("Location:index.php?page=tugas&success=1");
            exit;
        }else{
            header("Location:index.php?page=form_tugas&error=2");
            exit;
        }
    }

    public function edit(){
        if(!isset($_GET['id'])){
            header("Location:index.php?page=tugas");
            exit;
        }

        $data = $this->model->find($_GET['id']);

        if(!$data){
            header("Location:index.php?page=tugas");
            exit;
        }

        require 'views/form_tugas.php';
    }

    public function update(){
        if(!isset($_POST['id']) || !isset($_POST['judul']) || !isset($_POST['deskripsi']) || !isset($_POST['deadline'])){
            header("Location:index.php?page=tugas&error=1");
            exit;
        }

        $id = trim($_POST['id']);
        $judul = trim($_POST['judul']);
        $deskripsi = trim($_POST['deskripsi']);
        $deadline = trim($_POST['deadline']);

        if(empty($judul) || empty($deskripsi) || empty($deadline)){
            header("Location:index.php?page=tugas&error=1");
            exit;
        }

        if($this->model->update($id,$judul,$deskripsi,$deadline)){
            header("Location:index.php?page=tugas&success=2");
            exit;
        }else{
            header("Location:index.php?page=tugas&error=2");
            exit;
        }
    }

    public function delete(){
        if(!isset($_GET['id'])){
            header("Location:index.php?page=tugas");
            exit;
        }

        if($this->model->delete($_GET['id'])){
            header("Location:index.php?page=tugas&success=3");
            exit;
        }else{
            header("Location:index.php?page=tugas&error=2");
            exit;
        }
    }
}

$controller = new TugasController();

if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action == "create") $controller->create();
    elseif($action == "store") $controller->store();
    elseif($action == "edit") $controller->edit();
    elseif($action == "update") $controller->update();
    elseif($action == "delete") $controller->delete();
    else $controller->index();
}else{
    $controller->index();
}