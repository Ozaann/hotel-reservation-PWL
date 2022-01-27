<?php
	include_once "config.php";
	session_start();

if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
    $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
	$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
	
	$sql = "UPDATE user SET Photo_Profile = '".$imgData."' WHERE Username = '".$_SESSION["username"]."'";
	$current_id = mysqli_query($koneksi, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($koneksi));
	if(isset($current_id)) {
		header("Location: profile.php");
	}
}
}
?>