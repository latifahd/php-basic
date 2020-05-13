<?php
require 'functions.php';
$buku = query("SELECT * FROM buku");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Daftar Buku</h1>

	<a href="tambah.php">Tambah data buku</a>
	<br><br>	

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
