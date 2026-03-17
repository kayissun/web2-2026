<?php
require_once 'models/database.php';
require_once 'models/Mahasiswa.php';

class MahasiswaController {

    private $model;

    public function __construct(){
        $db = new Database();
        $koneksi = $db->getKoneksi();
        $this->model = new Mahasiswa($koneksi);
    }

    public function index(){
        $data = $this->model->all();
        require 'views/mahasiswa.php';
    }

    public function create(){
        $data = null;
        require 'views/form_mahasiswa.php';
    }

    public function store(){
        if(!isset($_POST['nim']) || !isset($_POST['nama']) || !isset($_POST['email'])){
            header("Location:index.php?page=form_mahasiswa&error=1");
            exit;
        }

        $nim = trim($_POST['nim']);
        $nama = trim($_POST['nama']);
        $email = trim($_POST['email']);

        if(empty($nim) || empty($nama) || empty($email)){
            header("Location:index.php?page=form_mahasiswa&error=1");
            exit;
        }

        if($this->model->insert($nim,$nama,$email)){
            header("Location:index.php?page=mahasiswa&success=1");
            exit;
        }else{
            header("Location:index.php?page=form_mahasiswa&error=2");
            exit;
        }
    }

    public function edit(){
        if(!isset($_GET['id'])){
            header("Location:index.php?page=mahasiswa");
            exit;
        }

        $data = $this->model->find($_GET['id']);

        if(!$data){
            header("Location:index.php?page=mahasiswa");
            exit;
        }

        require 'views/form_mahasiswa.php';
    }

    public function update(){
        if(!isset($_POST['id']) || !isset($_POST['nim']) || !isset($_POST['nama']) || !isset($_POST['email'])){
            header("Location:index.php?page=mahasiswa&error=1");
            exit;
        }

        $id = trim($_POST['id']);
        $nim = trim($_POST['nim']);
        $nama = trim($_POST['nama']);
        $email = trim($_POST['email']);

        if(empty($nim) || empty($nama) || empty($email)){
            header("Location:index.php?page=mahasiswa&error=1");
            exit;
        }

        if($this->model->update($id,$nim,$nama,$email)){
            header("Location:index.php?page=mahasiswa&success=2");
            exit;
        }else{
            header("Location:index.php?page=mahasiswa&error=2");
            exit;
        }
    }

    public function delete(){
        if(!isset($_GET['id'])){
            header("Location:index.php?page=mahasiswa");
            exit;
        }

        if($this->model->delete($_GET['id'])){
            header("Location:index.php?page=mahasiswa&success=3");
            exit;
        }else{
            header("Location:index.php?page=mahasiswa&error=2");
            exit;
        }
    }
}

$controller = new MahasiswaController();

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