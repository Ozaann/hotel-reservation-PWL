<?php  
	include_once "config.php";
	session_start();

	$sql = "SELECT * FROM admin";

	$result = mysqli_query($koneksi, $sql);
	$count=mysqli_num_rows($result);
	$data_username_admin = array();
	$data_password_admin = array();
	$data_nama_admin = array();

	while($record = mysqli_fetch_array($result)){
	$data_username_admin[] = $record['Username_Admin'];
	$data_password_admin[] = $record['Password_Admin'];
	$data_nama_admin[] = $record['Nama_Admin'];
	}
	$username = $_POST['adminid'];
	$password = $_POST['password'];
	$i=0;
	while ($i < $count) {
	// cek jika sama
	if( ($username == $data_username_admin[$i]) && ($password == $data_password_admin[$i]) ) {
    // buat session
	    $_SESSION['user_session'] = true;
	    $_SESSION['nama_admin'] = $data_nama_admin[$i];
	    $_SESSION['username_admin'] = $data_username_admin[$i];
	    $_SESSION['password_admin'] = $data_password_admin[$i];
	    // menuju halaman utama
	    header('location: adminpannel.php');
		}
		$i++;
	}
	if ($_SESSION['user_session'] == null) {
		header('Location: adminlanding.php');
	}

?>