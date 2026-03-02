<!-- KONTEKS
Sebuah kampus ingin membuat sistem sederhana berbasis OOP. Terdapat beberapa jenis pengguna:
    Mahasiswa
    Dosen
    Admin
Setiap pengguna memiliki:
    Nama
    Email
Setiap role memiliki perilaku berbeda dalam sistem.

SOAL 
Buat class User
tambahkan property $nama dan $email
Gunakan constructor untuk menginisialisasi properti tersebut
Buat object dan tampilkan  datanya -->

<?php
class User {
    public $nama;
    public $email;

    // Constructor untuk menginisialisasi properti
    public function __construct($nama, $email) {
        $this->nama = $nama;
        $this->email = $email;
    }
    public function tampil() {
        return "Nama: " . $this->nama . ", Email: " . $this->email;
    }
}
// Membuat object User
$user1 = new User("Kayis", "kayis@example.com");
echo $user1->tampil();
?>