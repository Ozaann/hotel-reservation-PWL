<?php
include_once "config.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];

$sql = "UPDATE user SET Email_User = '".$email."', Password = '".$password."', First_Name = '".$fname."', Last_Name = '".$lname."' WHERE Username ='".$_SESSION['username']."'";

$execute = mysqli_query($koneksi, $sql);
		if($execute){
		 header('Location: profile.php');
		 $_SESSION['email'] = $email;
    	 $_SESSION['password'] = $password;
    	 $_SESSION['fname'] = $fname;
    	 $_SESSION['lname'] = $lname;
		} else {
		 echo "Error : " . mysqli_error($koneksi);
		}
		// tutup koneksi
		mysqli_close($koneksi);
?>