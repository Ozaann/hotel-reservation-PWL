<?php
	session_start();
	include_once "config.php";
	$sqlimgprof = "SELECT * FROM user WHERE Username = '".$_SESSION["username"]."'";
  	$resimg = mysqli_query($koneksi, $sqlimgprof);
  	while($recprof = mysqli_fetch_array($resimg)){
    $imgprof = $recprof["Photo_Profile"];}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css\bootstrap.min.css">
	<link rel="stylesheet" href="daterangepicker.css">
	<link rel="stylesheet" href="css\style-index.css">
	<link rel="stylesheet" href="css\style-index-mobile.css">
	<link rel="icon" href="css/Group 36.png">
	<title>Lorem Hotel reservation</title>

</head>
<body>
<!-- =========================           Account / Profile         ========================= -->
		<div class="right-pad dropdown profile">
				<button type="button" onclick="myFunction()" class="dropbtn">
					<img src='<?php echo "data:image/jpeg;base64,".base64_encode ($imgprof);?>' onclick="myFunction()" class="profile-img resize">
				</button>
				<div id="myDropdown"  class="dropdown-content profile-txt">
					<a href="profile.php" class="logx1">My Account</a>
					<a href="Transaction.php" class="signx1">My Transactions</a>
					<a href="#" class="signx1">Help</a>
					<a href="logout-process.php" class="helpx1">Log out</a>
				</div>
			</div>
<!-- =========================          Search filter        ========================= -->
		<section class="banner-1">
			<div class="head-padding">
				<a href="landing.php" ><img src="assets\logo-white.svg" style="shadow: 10px" alt=""></a>
			</div>
			<div class="banner-wrap">
				<div class="centre">
					<div class="btn-group">
						<form action="browsingprocess.php" method="post">
<!-- =========================           location          ========================= -->
							<select class="open" name="location" required="">
							<option value="" disabled selected>Location</option>
							<option value="Bali">Bali</option>
							<option value="Bandung">Bandung</option>
							<option value="Jakarta">Jakarta</option>
							<option value="Surabaya">Surabaya</option>
							<option value="Yogyakarta">Yogyakarta</option>
						</select>
<!-- =========================          Date selector          ========================= -->
							<input id="from" name="checkin" type="date" class="pik-1 cin" style="padding-top: 30px"></input>
							<input id="to" name="checkout" type="date" class="pik-1 cout" style="padding-top: 30px"></input>
							<select class="pik-2" name="roompick">
							<option value="" disabled selected>Room</option>
							<option value="1">1 Room</option>
							<option value="2">2 Rooms</option>
							<option value="3">3 Rooms</option>
							<option value="4">4 Rooms</option>
							<option value="5">5 Rooms</option>
						</select>
						<button class="closee" type="submit" name="button">
						</button>
						</form>
					</div>
				</div>
				<p style="margin-bottom: 0px;">GO<br></p>
				<h1>N Explore!</h1>
				<button type="button" class="explore-btn">Hotels Near You</button>
			</div>
		</section>
		<div class="head-padding">
			<h1>Popular Location</h1>
		</div>
		<div class="popcontent">
			<div class="inbutton">
				<form action="browsingprocess.php" method="post">
				<input type="hidden" name="location" value="Bali">
				<input type="hidden" name="roompick" value="1">
				<input type="hidden" name="checkin" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time) ,date("Y", $time)));

				echo $date;?>">
				<input type="hidden" name="checkout" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time)+ 1 ,date("Y", $time)));

				echo $date;;?>">
				<input type="submit" href="#" style="font-size: 25px" class="citybutton popico-1" value="Bali"></input>
				</form>
				
			</div>
			<div class="inbutton ">
				<form action="browsingprocess.php" method="post">
				<input type="hidden" name="location" value="Bandung">
				<input type="hidden" name="roompick" value="1">
				<input type="hidden" name="checkin" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time) ,date("Y", $time)));

				echo $date;?>">
				<input type="hidden" name="checkout" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time)+ 1 ,date("Y", $time)));

				echo $date;;?>">
				<input type="submit" href="#" style="font-size: 25px" class="citybutton popico-2" value="Bandung"></input>
				</form>
			</div>
			<div class="inbutton">
				<form class=""action="browsingprocess.php" method="post">
				<input type="hidden" name="location" value="Jakarta">
				<input type="hidden" name="roompick" value="1">
				<input type="hidden" name="checkin" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time) ,date("Y", $time)));

				echo $date;?>">
				<input type="hidden" name="checkout" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time)+ 1 ,date("Y", $time)));

				echo $date;;?>">
				<input type="submit" href="#" style="font-size: 25px" class="citybutton popico-3" value="Jakarta"></input>
				</form>
			</div>
			<div class="inbutton">
				<form class=""action="browsingprocess.php" method="post">
				<input type="hidden" name="location" value="Surabaya">
				<input type="hidden" name="roompick" value="1">
				<input type="hidden" name="checkin" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time) ,date("Y", $time)));

				echo $date;?>">
				<input type="hidden" name="checkout" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time)+ 1 ,date("Y", $time)));

				echo $date;;?>">
				<input type="submit" href="#" style="font-size: 25px" class="citybutton popico-4" value="Surabaya"></input>
				</form>
			</div>
			<div class="inbutton">
				<form class=""action="browsingprocess.php" method="post">
				<input type="hidden" name="location" value="Yogyakarta">
				<input type="hidden" name="roompick" value="1">
				<input type="hidden" name="checkin" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time) ,date("Y", $time)));

				echo $date;?>">
				<input type="hidden" name="checkout" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time)+ 1 ,date("Y", $time)));

				echo $date;;?>">
				<input type="submit" href="#" style="font-size: 25px" class="citybutton popico-5" value="Yogyakarta"></input>
				</form>
			</div>
			<div class="inbutton">
				<form class=""action="" method="post">
				<input type="hidden" name="location" value="Jakarta">
				<input type="hidden" name="roompick" value="1">
				<input type="hidden" name="checkin" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time) ,date("Y", $time)));

				echo $date;?>">
				<input type="hidden" name="checkout" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time)+ 1 ,date("Y", $time)));

				echo $date;;?>">
				<input type="submit" href="#" style="font-size: 20px" class="citybutton popico-2" value="Coming Soon"></input>
				</form>
			</div>
			<div class="inbutton">
				<form class=""action="" method="post">
				<input type="hidden" name="location" value="Jakarta">
				<input type="hidden" name="roompick" value="1">
				<input type="hidden" name="checkin" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time) ,date("Y", $time)));

				echo $date;?>">
				<input type="hidden" name="checkout" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time)+ 1 ,date("Y", $time)));

				echo $date;;?>">
				<input type="submit" href="#" style="font-size: 20px" class="citybutton popico-6" value="Coming Soon"></input>
				</form>
			</div>
			<div class="inbutton">
				<form class=""action="" method="post">
				<input type="hidden" name="location" value="Jakarta">
				<input type="hidden" name="roompick" value="1">
				<input type="hidden" name="checkin" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time) ,date("Y", $time)));

				echo $date;?>">
				<input type="hidden" name="checkout" value="<?php $time = time();
				$date = date("d-m-Y", mktime(0,0,0,date("n", $time),date("j",$time)+ 1 ,date("Y", $time)));

				echo $date;;?>">
				<input type="submit" href="#" style="font-size: 20px" class="citybutton popico-7" value="Coming Soon"></input>
				</form>
			</div>
		</div>
		<div class="popbanner">
			<button type="button" class="adsbanner" name="button"> ADS</button>
		</div>
		<span class="testitext">Testimony</span>
		<div class="popbanner">
			<div class="testibanner">
				<div class="testicontent">
					<img src="css\ico\testi.svg" alt="">
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt"</p>
				</div>
				<div class="testicontent">
					<img src="css\ico\testi.svg" alt="">
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt"</p>
				</div>
				<div class="testicontent">
					<img src="css\ico\testi.svg" alt="">
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt"</p>
				</div>
				<div class="testicontent">
					<img src="css\ico\testi.svg" alt="">
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt"</p>
				</div>
			</div>
		</div>
		<div class="foot">
		</div>
<!-- =========================           Javascript          ========================= -->
<script src="js\script.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
				var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; // January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
        dd = '0' + dd
    } 

    if (mm < 10) {
        mm = '0' + mm
    } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("from").setAttribute("min", today);

    var nextday = new Date();
    var ddd = nextday.getDate() + 1;
    var mmm = nextday.getMonth() + 1; // January is 0!
    var yyyyy = nextday.getFullYear();

    if (ddd < 10) {
        ddd = '0' + ddd
    } 

    if (mmm < 10) {
        mmm = '0' + mmm
    } 

    nextday = yyyyy+'-'+mmm+'-'+ddd;

    document.getElementById("to").setAttribute("min", nextday);

</script>
</body>
</html>
