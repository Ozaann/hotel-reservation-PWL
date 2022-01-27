<?php  
	include_once "config.php";

	$sql = "INSERT INTO admin VALUES ('".$_POST["aname"]."','".$_POST["auname"]."','".$_POST["apass"]."')";
	$exe = mysqli_query($koneksi, $sql);
	header('location: adminpannel.php');

?>