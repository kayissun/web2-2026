<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body onload="window.print()">

<div class="container mt-4">

<h4>Laporan Transaksi</h4>
<p>Dari: <?= $dari ?? '' ?> | Sampai: <?= $sampai ?? '' ?></p>

<table class="table table-bordered">
<tr>
    <th>Tanggal</th>
    <th>Buku</th>
    <th>Anggota</th>
    <th>Kembali</th>
    <th>Status</th>
</tr>

<?php while($d = $data->fetch_assoc()): ?>
<tr>
    <td><?= $d['tanggal_pinjam'] ?></td>
    <td><?= $d['judul'] ?></td>
    <td><?= $d['nama'] ?></td>
    <td><?= $d['tanggal_kembali'] ?></td>
    <td><?= $d['status'] ?></td>
</tr>
<?php endwhile; ?>

</table>

</div>

</body>
</html>