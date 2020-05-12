<?php
	// Date
	// untuk menampilkan tanggal dengan format tertentu
	echo date("l, d-M-Y ");

	// Time
	// UNIX Timestamp / EPOCH time
	// detik yang sudah berlalu sejak 1 Januari 1970
	echo time();	
	echo date(" l, d-M-Y ", time()-60*60*24*100);

	// mktime
	// membuat sendiri detik
	// jam, menit, detik, bulan, tanggal, tahun
	echo date("l ", mktime(0,0,0,12,27,2000));

	// strtotime
	echo strtotime("20 dec 2000");
?>
