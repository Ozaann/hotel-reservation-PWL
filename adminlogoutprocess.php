<?php

// start session
session_start();

// hapus session
unset ($_SESSION['user_session']);

// ke halaman login
header('location: adminlanding.php');

?>
