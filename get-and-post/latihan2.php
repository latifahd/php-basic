<?php
	// cek apakah tidak ada data di $_GET
	if( !isset($_GET["judul"]) || 
	    !isset($_GET["penulis"]) ||
	    !isset($_GET["tebal"]) || 
	    !isset($_GET["isbn"]) ) {
		// redirect
		header("Location: latihan1.php");
		exit;
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Buku</title>
</head>
<body>
	<ul>
		<li> <img src="img/<?= $_GET["gambar"]; ?>"></li>
		<li>Judul Buku 	: <?= $_GET["judul"]; ?></li>
		<li>Penulis	: <?= $_GET["penulis"]; ?></li>
		<li>Tebal Buku	: <?= $_GET["tebal"]; ?></li>
		<li>ISBN	: <?= $_GET["isbn"]; ?></li>
	</ul>
	<a href="latihan1.php">Kembali ke daftar buku</a>
</body>
</html>
