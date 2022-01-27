<?php  
	include_once "config.php";

	$sql = "UPDATE admin SET Nama_Admin = '".$_POST["aname"]."', Password_Admin = '".$_POST["apass"]."' WHERE Username_Admin = '".$_POST["selectidam"]."'";
	$exe = mysqli_query($koneksi, $sql);
	header('location: adminpannel.php');

?>