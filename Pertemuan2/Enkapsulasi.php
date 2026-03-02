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
Ubah property $nama dan $email menjadi private dan buat method
setNama dan getNama, setEmail dan getEmail 
Pastikan data tidak bisa diakses langsung dari luar class!! -->

<?php
class User {
    private $nama;
    private $email; 

    // Setter nama
    public function setNama($namaBaru) {
        $this->nama = $namaBaru;
    }

    // Getter nama
    public function getNama() {
        return $this->nama;
    }

    // Setter email
    public function setEmail($emailBaru) {
        $this->email = $emailBaru;
    }

    // Getter email
    public function getEmail() {
        return $this->email;
    }
}

$user1 = new User();
$user1->setNama("Kayis");
$user1->setEmail("kayis@email.com");

echo "Nama: " . $user1->getNama();
echo "Email: " . $user1->getEmail();
?>