<?php
// start session
session_start();

include_once "config.php";

$sql = "SELECT * FROM user";

// data user
$result = mysqli_query($koneksi, $sql);
$count=mysqli_num_rows($result);
$data_username = array();
$data_password = array();
$data_email = array();
$data_fname = array();
$data_lname = array();

while($record = mysqli_fetch_array($result)){
	$data_username[] = $record['Username'];
	$data_password[] = $record['Password'];
	$data_email[] = $record['Email_User'];
	$data_fname[] = $record['First_Name'];
	$data_lname[] = $record['Last_Name'];
}

// post input
$username = $_POST['username'];
$password = $_POST['password'];

$i=0;
while ($i < $count) {
	// cek jika sama
	if( ($username == $data_username[$i]) && ($password == $data_password[$i]) ) {
    // buat session
    $_SESSION['user_session'] = true;
    $_SESSION['email'] = $data_email[$i];
    $_SESSION['username'] = $data_username[$i];
    $_SESSION['password'] = $data_password[$i];
    $_SESSION['fname'] = $data_fname[$i];
    $_SESSION['lname'] = $data_lname[$i];
    // menuju halaman utama
    header('location: landing_logged.php');
}
	$i++;
}
	if ($_SESSION['user_session'] == null) {
		header('Location: landing.php');
	}
?>
