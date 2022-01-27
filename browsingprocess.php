<?php  
	include_once "config.php";
	session_start();
	$_SESSION["location"] = $_POST["location"];
	$_SESSION["checkin"] = $_POST["checkin"];
	$_SESSION["checkout"] = $_POST["checkout"];
	$_SESSION["roompick"] = $_POST["roompick"];
	header("Location: BrowsingPage.php")

?>