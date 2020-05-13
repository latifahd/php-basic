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
	
	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	// query insert data
	$query = "INSERT INTO buku
			VALUES
		('', '$judul', '$penulis', '$tebal', '$isbn', '$gambar')
		 ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {

	$namafile = $_FILES['gambar']['name'];
	$ukuranfile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang di-upload
	if( $error === 4 ) {
		echo "
			<script>
				alert('pilih gambar terlebih dahulu!');
				document.location.href = 'index.php';
			</script>
		";
		return false;
	}

	// cek apakah yang diunggah adalah gambar
	$ekstensigambarvalid = ['jpg','jpeg','png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));
	if( !in_array($ekstensigambar, $ekstensigambarvalid) {
		echo "
			<script>
				alert('yang Anda upload bukan gambar!');
				document.location.href = 'index.php';
			</script>
		";
		return false;
	}
	
	// cek jika ukuran terlalu besar
	if( $ukuranfile > 1000000) {
		echo "
			<script>
				alert('ukuran gambar terlalu besar!');
				document.location.href = 'index.php';
			</script>
		";
		return false;
	}
		
	// lolos pengecekan, gambar siap di-upload
	// generate nama gambar baru
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensigambar;	

	move_uploaded_file($tmpname,'img/'.$namafilebaru);

	return $namafilebaru;
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
	$gambarlama = htmlspecialchars($data["gambarlama"]);

	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarlama;
	} else {
		$gambar = upload();
	}	

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
