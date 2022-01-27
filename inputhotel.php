<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<?php
		// buka koneksi
		$koneksi = mysqli_connect("localhost", "root", "");
		if (!$koneksi) {
		 die('Koneksi gagal: ' . mysqli_error());
		} else {
		 $database = mysqli_select_db($koneksi, "hotel_reservation");
		 if (!$database) {
		 die ("Database tidak dapat di gunakan : " . mysqli_error());
		 }
		}

		// query INSERT INTO
		$sql = "INSERT INTO hotel_detail VALUES ('" . $$_POST["id"] . "', '" . $_POST["nama"] . "', '" . $_POST["loc"] . "', '".$_POST["st"]."', '" . $_POST["price"] . "', '". $_POST["disc"] ."', '" . $_POST["avail"] . "', '', '".$_POST["total"]."', " .$_POST["ac"] .", " .$_POST["wifi"] .", " .$_POST["parking"] .", " .$_POST["smoking"] .", '".$_POST["desc"]."')";

		// perintah untuk eksekusi query
		$status_eksekusi = mysqli_query($koneksi, $sql);
		if($status_eksekusi){
		 echo "Query berhasil dieksekusi";
		 header('location: adminpannel.php');
		} else {
		 echo "Error : " . mysqli_error($koneksi);
		}

		// tutup koneksi
		mysqli_close($koneksi);
		?>
	
</body>
</html>