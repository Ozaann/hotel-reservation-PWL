<?php
	session_unset();
	session_start();

	if(isset($_SESSION["user_session"])){
	header('location: landing_logged.php');
}
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
					<img src="assets\Profile Icon.svg" onclick="myFunction()" class="profile-img">
				</button>
				<div id="myDropdown"  class="dropdown-content profile-txt">
					<a href="#" onclick="openLoginForm()" class="logx1">Login</a>
					<a href="#" onclick="openLoginForm2()" class="signx1">Sign up</a>
					<a href="landing_logged.html" class="helpx1">Help</a>
				</div>
			</div>
<!-- =========================           Login Form         ========================= -->
			<div class="popup-overlay"></div>
	    <div class="popup">
	    <div class="popup-close" onclick="closeLoginForm()">&times;</div>
	    <div class="form">
	        <div class="avatar">
	        <img src="css\logo-white.svg" alt="">
	    </div>
	    <div class="header">
	      Member login
	    </div>
				<form class="" action="login-process.php" method="post">
				<div class="element">
					<label for="email">Username</label>
		      <input type="text" id="email" name="username" placeholder="Username" required>
		    </div>
		    <div class="element">
		      <label for="password">Password</label>
		      <input type="password" id="password" name="password" placeholder="Password" required>
		    </div>
		    <div class="element-1">
		      <button class="sbmt1" type="submit">Login</button>
				</form>
	    </div>
	  </div>
	</div>
<!-- =========================           sign up Form         ========================= -->
			<div class="popup-overlay-2"></div>
	    <div class="popup-2">
	    <div class="popup-close-2" onclick="closeLoginForm2()">&times;</div>
		   <div class="form">
		     <div class="avatar">
	       <img src="css\logo-white.svg" alt="">
	    	</div>
				<div class="header">
		      Register
		    </div>
				<form action="signup-process.php" method="post">
				<div class="element">
						<label for="email">Email address</label>
			     	<input class="email" type="text" id="email" name="email" placeholder="Email" required>
				</div>
				<div id="mailerrorelement" style="color: red; margin-left:20px"></div>
				<div class="element">
						<label for="username">Username</label>
			      <input class="username" type="text" id="username" name="username" placeholder="Username" required>
			    </div>
		    <div class="element">
						<label for="name">First Name</label>
			      <input class="name" type="text" id="Fname" name="Fname" placeholder="first name" required>
			    </div>
					<div class="element">
							<label for="name">Last Name</label>
				      <input class="name" type="text" id="Lname" name="Lname" placeholder="Last name" required>
				    </div>
			    <div class="element">
			      <label for="password">Password</label>
			      <input class="password2" type="password" id="password" name="password" placeholder="Password" required>
			    </div>
					<div id="errorelement" style="color: red; margin-left:20px"></div>
					<div class="element">
			      <label for="password">Confirm Password</label>
			      <input class="password22" type="password" id="password2" name="password2" placeholder="Confirm Password" required>
			    </div>
					<div style="margin-left:20px" class="">
						<input class="chek" type="checkbox" name="" value="" required>
						 I agree with the <a href="#">Therms and Condition</a> And <a href="#"> Privacy and Policy</a>
					</div>
			    <div class="element-1">
			      <button class="submt" type="submit">Sign up</button>
					</form>
		    </div>
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
						<form action="landing.php" method="post">
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
							<input id="from" name="checkin" type="date" class="pik-1 cin"></input>
							<input id="to" name="checkout" type="date" class="pik-1 cout"></input>
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
				<button href="#" class="citybutton popico-1"></button>
				<span class="intext">Bali</span>
			</div>
			<div class="inbutton ">
				<button href="#" class="citybutton popico-2"></button>
				<span class="intext">Bandung</span>
			</div>
			<div class="inbutton">
				<button href="#" class="citybutton popico-3"></button>
				<span href="#"class="intext">Jakarta</span>
			</div>
			<div class="inbutton">
				<button href="#" class="citybutton popico-4"></button>
				<span class="intext">Surabaya</span>
			</div>
			<div class="inbutton">
				<button href="#" class="citybutton popico-3"></button>
				<span class="intext">Yogyakarta</span>
			</div>
			<div class="inbutton">
				<button  href="#" class="citybutton popico-5"></button>
				<span class="intext" style="color: lightgrey;">Coming Soon</span>
			</div>
			<div class="inbutton">
				<button href="#" class="citybutton popico-6"></button>
				<span class="intext" style="color: lightgrey;">Coming Soon</span>
			</div>
			<div class="inbutton">
				<button href="#"  class="citybutton popico-7"></button>
				<span class="intext" style="color: lightgrey;">Coming Soon</span>
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
