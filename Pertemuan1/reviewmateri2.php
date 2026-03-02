<!-- REVIEW MATERI 2 -->

<!-- Buat program sederhana: -->
<!-- Array berisi 5 nilai mahasiswa -->
<!-- Hitung rata-rata -->
<!-- Tentukan status: -->
<!-- ≥ 75 → Lulus -->
<!-- < 75 → Tidak Lulus -->
<!-- Tampilkan hasilnya. -->

<?php
// Array berisi 5 nilai mahasiswa
$nilai = [70, 65, 70, 75, 65];


// Hitung rata-rata
$total = array_sum($nilai);
$rata_rata = $total / count($nilai);

// Tentukan status
if ($rata_rata >= 75) {
    $status = "Lulus";
} else {
    $status = "Tidak Lulus";
}

// Tampilkan hasilnya
echo "Nilai Mahasiswa: " . implode(", ", $nilai) . "<br>";
echo "Rata-rata: " . round($rata_rata, 2) . "<br>";
echo "Status: " . $status;
?>