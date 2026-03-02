<!-- TUGAS 2 -->

<!-- Buatlah class bernama PersegiPanjang
Ketentuan:
1. Memiliki properti:
    Panjang
    Lebar
2. Memiliki method:
    hitungLuas() → Mengembalikan nilai luas
    hitungKeliling() → Mengembalikan nilai keliling
3. Buat object dengan nilai:
    panjang = 10
    lebar = 5
4. Tampilkan hasil: -->
<?php
class PersegiPanjang {
    public $panjang;
    public $lebar;

    public function hitungLuas() {
        return $this->panjang * $this->lebar; // luas = panjang x lebar
    }

    public function hitungKeliling() {
        return 2 * ($this->panjang + $this->lebar); // keliling = 2 x (panjang + lebar)
    }
}

// Buat object dengan nilai panjang = 10, lebar = 5
$persegi = new PersegiPanjang();
$persegi->panjang = 10;
$persegi->lebar = 5;

// Tampilkan hasil
echo "Panjang: " . $persegi->panjang . " cm<br>";
echo "Lebar: " . $persegi->lebar . " cm<br>";
echo "Luas: " . $persegi->hitungLuas() . " cm²<br>";
echo "Keliling: " . $persegi->hitungKeliling() . " cm";
?>