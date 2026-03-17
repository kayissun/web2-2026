<?php
class Tugas {
    private $db;
    private $table = "tugas";

    public function __construct($koneksi){
        $this->db = $koneksi;
    }

    public function all(){
        $query = "SELECT * FROM ".$this->table." ORDER BY id DESC";
        return mysqli_query($this->db,$query);
    }

    public function find($id){
        $id = mysqli_real_escape_string($this->db, $id);
        $query = "SELECT * FROM ".$this->table." WHERE id='".$id."'";
        $result = mysqli_query($this->db,$query);
        
        if(!$result) return false;
        return (mysqli_num_rows($result) > 0) ? mysqli_fetch_assoc($result) : false;
    }

    public function insert($judul,$deskripsi,$deadline){
        $judul = mysqli_real_escape_string($this->db, $judul);
        $deskripsi = mysqli_real_escape_string($this->db, $deskripsi);
        $deadline = mysqli_real_escape_string($this->db, $deadline);
        
        $query = "INSERT INTO tugas(judul,deskripsi,deadline)
                  VALUES('".$judul."','".$deskripsi."','".$deadline."')";
        return mysqli_query($this->db,$query);
    }

    public function update($id,$judul,$deskripsi,$deadline){
        $id = mysqli_real_escape_string($this->db, $id);
        $judul = mysqli_real_escape_string($this->db, $judul);
        $deskripsi = mysqli_real_escape_string($this->db, $deskripsi);
        $deadline = mysqli_real_escape_string($this->db, $deadline);
        
        $query = "UPDATE ".$this->table." SET
                    judul='".$judul."',
                    deskripsi='".$deskripsi."',
                    deadline='".$deadline."'
                 WHERE id='".$id."'";
        return mysqli_query($this->db,$query);
    }

    public function delete($id){
        $id = mysqli_real_escape_string($this->db, $id);
        $query = "DELETE FROM tugas WHERE id='".$id."'";
        return mysqli_query($this->db,$query);
    }
}