<!-- TUGAS 1 -->

<!-- Buatlah sebuah class bernama Mahasiswa dengan ketentuan berikut:
1.Memiliki property :
    nama
    nim
    Jurusan
2. Memiliki method :
    tampildata()
    Menampilkan data mahasiswa dalam format berikut:
    Nama : Andi
    NIM : 12345
    Jurusan : Teknik Informatika
3. Buat 1 object dan tampilkan datanya. -->

<?php
class Mahasiswa {
    public $nama;
    public $nim;
    public $jurusan;
    
    public function tampilData() {
        echo "Nama : " . $this->nama . "<br>";
        echo "NIM : " . $this->nim . "<br>";
        echo "Jurusan : " . $this->jurusan . "<br>";
    }
}

$mahasiswa1 = new Mahasiswa();
$mahasiswa1->nama = "Andi";
$mahasiswa1->nim = "12345";
$mahasiswa1->jurusan = "Teknik Informatika";

$mahasiswa1->tampilData();
?>