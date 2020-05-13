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
?>
