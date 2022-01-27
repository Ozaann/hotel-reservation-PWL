<?php
	include_once "config.php";
	session_start();

	$sql = "SELECT * FROM hotel_detail JOIN hotel_photo ON hotel_detail.ID_Hotel = hotel_photo.ID_Hotel WHERE hotel_detail.AC = '".$_POST[$filter1]."' AND hotel_detail.Parking = '".$_POST[$filter2]."' AND hotel_detail.Wifi = '".$_POST[$filter3]."' AND hotel_detail.Smoking = '".$_POST[$filter4]."'";
?>