<?php
  include_once "config.php";
  session_start();
  $sqlimgprof = "SELECT * FROM user WHERE Username = '".$_SESSION["username"]."'";
    $resimg = mysqli_query($koneksi, $sqlimgprof);
    while($recprof = mysqli_fetch_array($resimg)){
    $imgprof = $recprof["Photo_Profile"];}

  $sql = "SELECT * FROM hotel_detail WHERE Nama_Hotel = '".$_SESSION["nama6"]."'";
  $result = mysqli_query($koneksi, $sql);
  while($record = mysqli_fetch_array($result)){
    $disc1 = $record['Discount']/100;
    $total1 = $record['Room_Price'] - ($record['Room_Price'] * $disc1);
    $hotelid = $record['ID_Hotel'];
    $harga = $record['Room_Price'];
    $disco = $record['Discount'];
    $namahotel = $record['Nama_Hotel'];


      $sqlim = "SELECT * FROM hotel_photo WHERE ID_Hotel = '".$hotelid."'";
      $hasilim = mysqli_query($koneksi,$sqlim);
      while ($rec = mysqli_fetch_array($hasilim)) {
        $img = $rec["imageData1"];
        $img2 = $rec["imageData2"];
        $img3 = $rec["imageData3"];
        $img4 = $rec["imageData4"];
        break;
      }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
<link  rel="stylesheet" href="css/style-browsing.css">
<link  rel="stylesheet" href="css/style-product.css">
<script src="js/script.js"></script>
<title>product page</title>
</head>
<body>
	<!--                         HEADER AND NAVBAR                        -->
	<div class="container-fluid centre shadow-1 sticky-1 " style=" background-color: #ffffff;">
		<a href="landing.php"><img class="logo" src="assets/logo-black.svg"></a>
		<div class="dropdown profile">
			<button type="button" onclick="myFunction()" class="dropbtn">
				<!--V V V CODE PHP UNTUK FOTO PROFILR TARUH DIBAWAH INI V VV -->
				<img src='<?php echo "data:image/jpeg;base64,".base64_encode ($imgprof);?>' class="profile-img resize">
			</button>
				<div id="myDropdown" class="dropdown-content profile-txt">
					<a href="profile.php" class="logx1">My Account</a>
					<a href="transaction.html" class="signx1">My Transactions</a>
					<a href="help" class="helpx1">Help</a>
				</div>
		</div>
	</div>
	<div class="heading wrap">
		<!-- silahkan diganti sesuai fungsi filter-->
		<div><h1><b><?php echo $record["Nama_Hotel"];?></b></h1></div>
		<p style="font-size: 20px"><?php echo $record["Street"];?></p>
	</div>
<!--                              BODY                                  -->
<div class="wrap">
	<div class="container">
  <div class="mySlides">
    <div class="numbertext">1 / 4</div>
    <img src='<?php echo "data:image/jpeg;base64,".base64_encode ($img);?>' style="width:100%; height: 640.172px;">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 4</div>
    <img src='<?php echo "data:image/jpeg;base64,".base64_encode ($img2);?>' style="width:100%; height: 640.172px;">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 4</div>
    <img src='<?php echo "data:image/jpeg;base64,".base64_encode ($img3);?>' style="width:100%; height: 640.172px;">
  </div>

  <div class="mySlides">
    <div class="numbertext">4 / 4</div>
    <img src='<?php echo "data:image/jpeg;base64,".base64_encode ($img4);?>' style="width:100%; height: 640.172px;">
  </div>


  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>



  <div class="row">
    <div class="column">
      <img class="demo cursor" src='<?php echo "data:image/jpeg;base64,".base64_encode ($img);?>' style="width:277.5px; height:164.359px; " onclick="currentSlide(1)">
    </div>
    <div class="column">
      <img class="demo cursor" src='<?php echo "data:image/jpeg;base64,".base64_encode ($img2);?>' style="width:277.5px; height:164.359px; " onclick="currentSlide(2)">
    </div>
    <div class="column">
      <img class="demo cursor" src='<?php echo "data:image/jpeg;base64,".base64_encode ($img3);?>' style="width:277.5px; height:164.359px;" onclick="currentSlide(3)">
    </div>
    <div class="column">
      <img class="demo cursor" src='<?php echo "data:image/jpeg;base64,".base64_encode ($img4);?>' style="width:277.5px; height:164.359px;" onclick="currentSlide(4)">
    </div>
  </div>
</div>

</div>

<div class="wrap">
	<div style="float: right; margin-top: 60px;" class="rectangle">
		<b style="margin-left: 33px; font-size: 25px;">Rp <?php echo $total1;?>/night</b>
		<button style="margin-top: 10px; margin-left: 10px; width: 250px; height: 50px;" type="button" class="btn btn-info btn-lg" onclick="javascript:location.href='checkout.php'">Book Now!</button>
	</div>
	<p style="font-size: 40px; padding-top: 24px;">Facilities :</p>
	<div class="grid-facilities">
		<?php echo '<div class="fcleft-1 fccontent '.$record["AC"].'">';?>
				<img src="Component_10_1.png" class="fcico">
				<p>AC</p>
		</div>
		<?php echo '<div class="fcleft-2 fccontent '.$record["Parking"].'">';?>
				<img src="Component_10_1.png" class="fcico">
				<p>Parking Area</p>
		</div>
		<?php echo '<div class="fcright-1 fccontent '.$record["Wifi"].'">';?>
				<img src="Component_10_1.png" class="fcico">
				<p>Wifi</p>
		</div>
		<?php echo '<div class="fcright-2 fccontent '.$record["Smoking"].'">';?>
				<img src="Component_10_1.png" class="fcico">
				<p>Smoking</p>
		</div>
	</div>
</div>

<div class="wrap">
	<p style="font-size: 30px; padding-top: 24px;">Details :</p>
	<p style="font-size: 25px;"><?php echo $record["Desscription"];?></p>

</div>
</div>
<?php }
    $_SESSION['hotelid'] = $hotelid ;
    $_SESSION['harga'] = $harga;
    $_SESSION['disco'] = $disco;
    $_SESSION['namahotel'] = $namahotel;
?>
<div class="foot">
</div>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
</body>
</html>
