<?php
require 'functions.php';

// cek apakah tombol submit sudah ditekan
if(isset ($_POST["submit"]) ) {
	

	

	// cek apakah data berhasil ditambahkan
	if( tambah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah data mahasiswa</title>
</head>
<body>
	<h1>Tambah data mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="judul">Judul : </label>
				<input type="text" name="judul" id="judul" required>
			</li>
			<li>
				<label for="penulis">Penulis : </label>
				<input type="text" name="penulis" id="penulis" required>
			</li>
			<li>
				<label for="tebal">Tebal : </label>
				<input type="text" name="tebal" id="tebal"required>
			</li>
			<li>
				<label for="isbn">ISBN : </label>
				<input type="text" name="isbn" id="isbn" required>
			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<input type="file" name="gambar" id="gambar"required>
			</li>
			<li>
				<button type="submit" name="submit">Tambah data</button>
			</li>

		</ul>

	</form>
</body>
</html>