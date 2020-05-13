<?php
	// SUPERGLOBAL
	// variable global milik PHP
	// merupakan Array Associative

	//$_GET

	$books = [
		[ 
			"judul" => "Bumi Manusia", 
			"penulis" => "Pramoedya Ananta Toer",
			"tebal" => "535 halaman",
			"isbn" => "979-97312-3-2",
			"gambar" => "bumimanusia.jpg"
		],
		[
			"judul" => "The Cuckoo's Calling", 
			"penulis" => "Robert Galbraith",
			"tebal" => "520 halaman",
			"isbn" => "978-602-03-00062-7",
			"gambar" => "thecuckooscalling.jpg"
		]
	];
?>
<!DOCTYPE html>
<html>
<head>
	<title>GET</title>
</head>
<body>
	<h1>Daftar Buku</h1>
	<ul>
		<?php foreach($books as $book) : ?>
			<li>
				<a href="latihan2.php?judul=<?= $book["judul"]; ?>&penulis=<?= $book["penulis"]; ?>&tebal=<?= $book["tebal"]; ?>&isbn=<?= $book["isbn"]; ?>&gambar=<?= $book["gambar"]; ?>"><?= $book["judul"]; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</body>
</html>
