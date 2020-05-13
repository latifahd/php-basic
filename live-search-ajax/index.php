<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$buku = query("SELECT * FROM buku");

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
		<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari">Cari!</button>
	</form>	
	<br>
	<div id="container">
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
			<td><img src="img/<?= $row["gambar"] ?>" width="50"></td>
			<td><?= $row["judul"]; ?></td>
			<td><?= $row["penulis"]; ?></td>
			<td><?= $row["tebal"]; ?></td>
			<td><?= $row["isbn"]; ?></td>	
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>

	</table>
	</div>

	<script src="js/script.js"></script>
</body>
</html>
