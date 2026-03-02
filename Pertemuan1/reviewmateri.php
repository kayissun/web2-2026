<!-- REVIEW MATERI -->

<!-- Membuat program PHP native sederhana  -->
<!-- Menerima input nama barang dan harga, menghitung PPn 11% dan menampilkan total bayar -->
<!-- Buat fungsi yang mengembalikan hasil perkalian harga dan QTY -->
<!-- TAMPILKAN HASILNYA DI BROWSER -->

<?php
// Fungsi untuk menghitung subtotal (harga x qty)
function hitungSubtotal($harga, $qty) {
    return $harga * $qty; // perkalian harga dan jumlah barang
}

// Cek apakah form sudah disubmit
if(isset($_POST['submit'])){

    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $qty   = $_POST['qty'];

    // Hitung subtotal
    $subtotal = hitungSubtotal($harga, $qty);

    // Hitung PPN 11%
    $ppn = $subtotal * 0.11;

    // Hitung total bayar
    $total = $subtotal + $ppn;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan PPN 11%</title>
</head>
<body>

<h2>Form Input Barang</h2>

<form method="POST">
    Nama Barang : <input type="text" name="nama" required><br><br>
    Harga : <input type="number" name="harga" required><br><br>
    Quantity : <input type="number" name="qty" required><br><br>
    <button type="submit" name="submit">Hitung</button>
</form>

<?php if(isset($_POST['submit'])){ ?>

    <h3>Hasil Perhitungan</h3>
    Nama Barang : <?php echo $nama; ?> <br>
    Harga : Rp <?php echo number_format($harga,0,',','.'); ?> <br>
    Quantity : <?php echo $qty; ?> <br>
    Subtotal : Rp <?php echo number_format($subtotal,0,',','.'); ?> <br>
    PPN 11% : Rp <?php echo number_format($ppn,0,',','.'); ?> <br>
    <strong>Total Bayar : Rp <?php echo number_format($total,0,',','.'); ?></strong>

<?php } ?>

</body>
</html>