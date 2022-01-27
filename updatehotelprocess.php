<?php  
	include_once "config.php";

	$sql = "UPDATE hotel_detail SET Nama_Hotel = '".$_POST['nama']."', Location = '".$_POST['loc']."', Street = '".$_POST['st']."', Room_Price = '".$_POST['price']."', Discount = '".$_POST['disc']."', Total_Room = '".$_POST['total']."', AC = '".$_POST["ac"]."', Wifi = '".$_POST["wifi"]."', Parking = '".$_POST["parking"]."', Smoking = '".$_POST["smoking"]."', Description = '".$_POST["desc"]."' WHERE ID_Hotel = '".$_POST['selectid']."'";
	$result = mysqli_query($koneksi, $sql);
	if($result){
		header('location: adminpannel.php');
	}
	else{
		echo "Error : " . mysqli_error($koneksi);
	}

?>