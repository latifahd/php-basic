<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");



function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;

	}
	return $rows;	
}

function tambah($data) {
	global $conn;
	
	$judul = htmlspecialchars($data["judul"]);
	$penulis = htmlspecialchars($data["penulis"]);
	$tebal = htmlspecialchars($data["tebal"]);
	$isbn = htmlspecialchars($data["isbn"]);
	$gambar = htmlspecialchars($data["gambar"]);

	// query insert data
	$query = "INSERT INTO buku
			VALUES
		('', '$judul', '$penulis', '$tebal', '$isbn', '$gambar')
		 ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM buku WHERE  id = $id");
	
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;
	
	$id = $data["id"];
	$judul = htmlspecialchars($data["judul"]);
	$penulis = htmlspecialchars($data["penulis"]);
	$tebal = htmlspecialchars($data["tebal"]);
	$isbn = htmlspecialchars($data["isbn"]);
	$gambar = htmlspecialchars($data["gambar"]);

	// query insert data
	$query = "UPDATE buku SET
		 	judul = '$judul',
			penulis = '$penulis',
			tebal = '$tebal',
			isbn = '$isbn',
			gambar = '$gambar'
		  WHERE id = $id
		 ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM buku
			WHERE 
		  judul LIKE '%$keyword%' OR
		  penulis LIKE '%$keyword%' OR
		  isbn LIKE '%$keyword%'
		";
	return query($query);	
}

function registrasi($data) {
	global $conn;
	
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");	
	if (mysqli_fetch_assoc($result)) {
	echo "
		<script>
			alert('username sudah terdaftar!');
		</script>";
	return false;
	} 
	
	//cek konfirmasi password
	if ($password !== $password2) {
	echo "
		<script>
			alert('konfirmasi password tidak sesuai!');
		</script>";
	return false;
	} 
	
	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");
	
	return mysqli_affected_rows($conn);
}
?>
