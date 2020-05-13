<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data buku berdasarkan id
$buku = query("SELECT * FROM buku WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan
if(isset ($_POST["submit"]) ) {
	

	

	// cek apakah data berhasil diubah
	if( ubah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil diubah');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah');
				document.location.href = 'index.php';
			</script>
		";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data buku</title>
</head>
<body>
	<h1>Ubah data buku</h1>

	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $buku["id"]; ?>">
		<ul>
			<li>
				<label for="judul">Judul : </label>
				<input type="text" name="judul" id="judul" required value="<?= $buku["judul"]; ?>">
			</li>
			<li>
				<label for="penulis">Penulis : </label>
				<input type="text" name="penulis" id="penulis" required value="<?= $buku["penulis"]; ?>">
			</li>
			<li>
				<label for="tebal">Tebal : </label>
				<input type="text" name="tebal" id="tebal"required value="<?= $buku["tebal"]; ?>">
			</li>
			<li>
				<label for="isbn">ISBN : </label>
				<input type="text" name="isbn" id="isbn" required value="<?= $buku["isbn"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<input type="text" name="gambar" id="gambar" value="<?= $buku["gambar"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah data</button>
			</li>

		</ul>

	</form>
</body>
</html>
