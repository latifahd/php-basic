<?php
	// ARRAY ASSOCOATIVE
	// definisinya seperti array numerik, kecuali
	// key-nya adalah string yang kita buat sendiri
 
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
	<title>Daftar Buku</title>
</head>
<body>
	<h1>Daftar Buku</h1>
	<?php foreach($books as $book) : ?>
	<ul>
		<li>
			<img src="img/<?= $book["gambar"]; ?>">
		</li>
		<li>Judul Buku 	: <?= $book["judul"]; ?></li>
		<li>Penulis	: <?= $book["penulis"]; ?></li>
		<li>Isi	Buku	: <?= $book["tebal"]; ?></li>
		<li>ISBN	: <?= $book["isbn"]; ?></li>
	</ul>
	<?php endforeach; ?>
</body>
</html>
