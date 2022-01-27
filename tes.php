<?php  
session_start();
$date = $_SESSION['checkout'];
$fixdate = strtotime($date);
$newdate = date('d-M-Y',$fixdate);

echo $date."<br>";
echo $newdate."<br>";

if(isset($_POST["submit"])){
	$dt = $_POST["date"];
	$ndt = date("d-m-Y",strtotime($dt));
	echo $ndt ."<br>";
	echo(date("d/m/Y") ."<br>");
}

?>
<form action="" method="post">
	<input type="date" name="date" value="">
	<input type="submit" name="submit" value="Get Date">
</form>