<?php 
		$koneksi = mysqli_connect("localhost", "root", "");
		if (!$koneksi) {
		 die('Koneksi gagal: ' . mysqli_error($koneksi));
		} else {
		 $database = mysqli_select_db($koneksi, "hotel_reservation");
		 if (!$database) {
		 die ("Database tidak dapat di gunakan : " . mysqli_error());
		 }
		}

?>