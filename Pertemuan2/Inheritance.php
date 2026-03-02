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
Jadikan User sebagai parent class dan buat class turunan Mahasiswa dan Dosen
Tambahkan property khusus:
    Mahasiswa: $nim
    Dosen: $nidn
Gunakan constructor dan panggil constructor parent dengan
parent::__construct() untuk menginisialisasi properti nama dan email -->

<?php

// Parent Class
class User {
    protected $nama;
    protected $email;

    // Constructor parent
    public function __construct($nama, $email) {
        $this->nama = $nama;
        $this->email = $email;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getEmail() {
        return $this->email;
    }
}


// Child Class Mahasiswa
class Mahasiswa extends User {
    private $nim;

    public function __construct($nama, $email, $nim) {
        parent::__construct($nama, $email); // memanggil constructor parent
        $this->nim = $nim;
    }

    public function getNim() {
        return $this->nim;
    }
}


// Child Class Dosen
class Dosen extends User {
    private $nidn;

    public function __construct($nama, $email, $nidn) {
        parent::__construct($nama, $email); // memanggil constructor parent
        $this->nidn = $nidn;
    }

    public function getNidn() {
        return $this->nidn;
    }
}


// Membuat object
$user = new Mahasiswa("Kayis", "kayis@email.com", "32241004");
$dosen = new Dosen("Pak Budi", "smith@email.com", "12345678");

// Output
echo "=== Data Mahasiswa ===<br>";
echo "Nama: " . $user->getNama() . "<br>";
echo "Email: " . $user->getEmail() . "<br>";
echo "NIM: " . $user->getNim() . "<br><br>";

echo "=== Data Dosen ===<br>";
echo "Nama: " . $dosen->getNama() . "<br>";
echo "Email: " . $dosen->getEmail() . "<br>";
echo "NIDN: " . $dosen->getNidn();

?>