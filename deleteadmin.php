<?php  
	include_once "config.php";

	$sql = "DELETE FROM admin WHERE Username_Admin = '".$_POST["selectidam"]."'";
	$exe = mysqli_query($koneksi, $sql);
	header('location: adminpannel.php');

?>