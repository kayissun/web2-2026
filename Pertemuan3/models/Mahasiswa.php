<?php
class Mahasiswa {
    private $db;
    private $table = "mahasiswa";

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

    public function insert($nim,$nama,$email){
        $nim = mysqli_real_escape_string($this->db, $nim);
        $nama = mysqli_real_escape_string($this->db, $nama);
        $email = mysqli_real_escape_string($this->db, $email);
        
        $query = "INSERT INTO mahasiswa(nim,nama,email)
                  VALUES('".$nim."','".$nama."','".$email."')";
        return mysqli_query($this->db,$query);
    }

    public function update($id,$nim,$nama,$email){
        $id = mysqli_real_escape_string($this->db, $id);
        $nim = mysqli_real_escape_string($this->db, $nim);
        $nama = mysqli_real_escape_string($this->db, $nama);
        $email = mysqli_real_escape_string($this->db, $email);
        
        $query = "UPDATE ".$this->table." SET
                    nim='".$nim."',
                    nama='".$nama."',
                    email='".$email."'
                 WHERE id='".$id."'";
        return mysqli_query($this->db,$query);
    }

    public function delete($id){
        $id = mysqli_real_escape_string($this->db, $id);
        $query = "DELETE FROM mahasiswa WHERE id='".$id."'";
        return mysqli_query($this->db,$query);
    }
}