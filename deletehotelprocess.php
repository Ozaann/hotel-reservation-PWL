<?php  
	include_once "config.php";

	$sql = "DELETE FROM hotel_detail WHERE ID_Hotel = '".$_POST['id']."'";
	// perintah untuk eksekusi query
		$status_eksekusi = mysqli_query($koneksi, $sql);
		
		// tutup koneksi
		mysqli_close($koneksi);
		header('location: adminpannel.php');


?>