<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// pagination
// konfigurasi
$jumlahdataperhalaman = 2;
$jumlahdata = count(query("SELECT * FROM buku"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awaldata = ($jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;


$buku = query("SELECT * FROM buku LIMIT $awaldata, $jumlahdataperhalaman");

// tombol cari ditekan
if (isset($_POST["cari"])) {
	$buku = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<a href="logout.php">Logout</a>
	<h1>Daftar Buku</h1>

	<a href="tambah.php">Tambah data buku</a>
	<br><br>

	<form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomple="off">
		<button type="submit" name="cari">Cari!</button>
	</form>	
	<br><br>	

	<!-- navigasi -->
	<?php if($halamanaktif > 1) : ?>
		<a href="?halaman= <?= $halamanaktif - 1; ?>">&laquo;</a>
	<?php endif; ?>

	<?php for($i = 1; $i <= $jumlahhalaman; $i++) : ?>
		<?php if( $i == $halamanaktif) : ?>
			<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:red;"><?= $i; ?></a>
		<?php else : ?>
			<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
		<?php endif; ?>
	<?php endfor; ?>

	<?php if($halamanaktif < $jumlahhalaman) : ?>
		<a href="?halaman= <?= $halamanaktif + 1; ?>">&raquo;</a>
	<?php endif; ?>

	<br>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>Judul</th>
			<th>Penulis</th>
			<th>Tebal</th>
			<th>ISBN</th>
		</tr>
		
		<?php $i=1; ?>
		<?php foreach( $buku as $row) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
				<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
			</td>
			<td><img src="imf/<?= $row["gambar"] ?>" width="50"></td>
			<td><?= $row["judul"]; ?></td>
			<td><?= $row["penulis"]; ?></td>
			<td><?= $row["tebal"]; ?></td>
			<td><?= $row["isbn"]; ?></td>	
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>

	</table>
	
</body>
</html>
