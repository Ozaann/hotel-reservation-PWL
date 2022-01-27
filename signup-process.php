<?php

session_start();
include_once "config.php";

	$email = $_POST['email'];
	$uname = $_POST['username'];
	$Fname = $_POST['Fname'];
	$Lname = $_POST['Lname'];
	$password = $_POST['password'];


$imgData =addslashes(file_get_contents("testi.png"));
$imageProperties = getimageSize("testi.png");

$sql = "INSERT INTO user VALUES ('".$Fname."','".$Lname."','".$email."','".$uname."','".$password."', '".$imgData."')";

$execute = mysqli_query($koneksi, $sql);
		if($execute){
		 $_SESSION['user_session'] = true;
		 $_SESSION['email'] = $email;
    	 $_SESSION['username'] = $uname;
    	 $_SESSION['password'] = $password;
    	 $_SESSION['fname'] = $Fname;
    	 $_SESSION['lname'] = $Lname;
		 header('Location: landing_logged.php');
		} else {
		 echo "Error : " . mysqli_error($koneksi);
		}
		// tutup koneksi
		mysqli_close($koneksi);
		

?>

?>