<?php
	$mahasiswa = [
			["Andi", "02454567", "Teknologi Informasi", "andi@univ.ac.id"],
			["Budi", "02567890", "Teknik Elektro", "budi@univ.ac.id"]
	];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<?php foreach($mahasiswa as $mhs) : ?>
	<ul>
		<li>Nama : <?= $mhs[0]; ?></li>
		<li>NIM : <?= $mhs[1]; ?></li>
		<li>Program Studi : <?= $mhs[2]; ?></li>
		<li>E-mail : <?= $mhs[3]; ?></li>
	</ul>
	<?php endforeach; ?>
</body>
</html>
