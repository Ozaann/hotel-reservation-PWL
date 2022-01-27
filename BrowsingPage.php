<?php
	include_once "config.php";
	session_start();
	$sqlimgprof = "SELECT * FROM user WHERE Username = '".$_SESSION["username"]."'";
  	$resimg = mysqli_query($koneksi, $sqlimgprof);
  	while($recprof = mysqli_fetch_array($resimg)){
    $imgprof = $recprof["Photo_Profile"];}

		
	if(!isset($_POST["lokasifil"])){
			$sql = "SELECT * FROM hotel_detail WHERE Location = '".$_SESSION["location"]."'";
		}
	if(isset($_POST["lokasifil"])){
			$locale = $_POST["lokasi"];
			switch ($locale){
			case "bali" :
			$_SESSION["location"] = "Bali";
			break;			
			case "bandung" :
			$_SESSION["location"] = "Bandung";
			break;
			case "jakarta" :
			$_SESSION["location"] = "Jakarta";
			break;
			case "surabaya" :
			$_SESSION["location"] = "Surabaya";
			break;
			case "yogyakarta" :
			$_SESSION["location"] = "Yogyakarta";
			break;
			}
			$sql = "SELECT * FROM hotel_detail WHERE Location = '".$_SESSION["location"]."'";
		}
		if(isset($_POST["asc"])){
			$sql = "SELECT * FROM hotel_detail WHERE Location = '".$_SESSION["location"]."' ORDER BY Nama_Hotel ASC";
			
		}
		if(isset($_POST["desc"])){
			$sql = "SELECT * FROM hotel_detail WHERE Location = '".$_SESSION["location"]."' ORDER BY Nama_Hotel DESC";
			
		}
		if(isset($_POST["high"])){
			$sql = "SELECT * FROM hotel_detail WHERE Location = '".$_SESSION["location"]."' ORDER BY Room_Price DESC";
			
		}
		if(isset($_POST["low"])){
			$sql = "SELECT * FROM hotel_detail WHERE Location = '".$_SESSION["location"]."' ORDER BY Room_Price ASC";
					}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
<link  rel="stylesheet" href="css/style-browsing.css">
<link  rel="stylesheet" href="css/style-browsing-mobile.css">
<script src="js/script.js"></script>
<title>Browsing page</title>
</head>
<body>
	<!--                         HEADER AND NAVBAR                        -->
	<div class="container-fluid centre shadow-1 sticky-1 " style=" background-color: #ffffff;">
		<a href="landing.php"><img class="logo" src="assets/logo-black.svg"></a>
		<div class="right-pad dropdown profile">
				<button type="button" onclick="myFunction()" class="dropbtn profdrop">
					<img src='<?php echo "data:image/jpeg;base64,".base64_encode ($imgprof);?>' onclick="myFunction()" class="profile-img resize">
				</button>
				<div id="myDropdown"  class="dropdown-content profile-txt">
					<a href="profile.php" class="logx1">My Account</a>
					<a href="Transaction.php" class="signx1">My Transactions</a>
					<a href="help" class="helpx1">Help</a>
				</div>
			</div>
	</div>

<!--                              BODY                                  -->
<div class="wrap-1">
		<div class="heading">
			<!-- silahkan diganti sesuai fungsi filter-->
			<div>
			<b>Hotels In <?php echo $_SESSION["location"];?><br></b>
		</div>
		<i>Available hotels from <b><?php echo $_SESSION["checkin"];?></b> to <b><?php echo $_SESSION["checkout"];?></b></i>
		</div>
	<!-- Sorting dropdown -->
	<div class="filterwrap">
		<div style="font-family: prox;font-weight: bold;margin-top: 22px;">

			<form action="" method="post" style="display: flex;">

					<div class="multiselect">
						<div class="selectBox" onclick="showCheckboxes()">
							<select>
								<option>Filter By</option>
							</select>
							<div class="overSelect"></div>
						</div>
						<div id="checkboxes">
							<label style="padding-left: 5px;" for="one">
								<input type="hidden" name="filter1" value="no">
								<input name="filter1" type="checkbox" id="one" value="yes"/>AC</label>
							<label style="padding-left: 5px;" for="two">
								<input type="hidden" name="filter2" value="no">
								<input name="filter2" type="checkbox" id="two" value="yes"/>Parking</label>
							<label style="padding-left: 5px;" for="three">
								<input type="hidden" name="filter3" value="no">
								<input name="filter3" type="checkbox" id="three" value="yes"/>Wifi</label>
							<label style="padding-left: 5px;" for="four">
								<input type="hidden" name="filter4" value="no">
								<input name="filter4" type="checkbox" id="four" value="yes"/>Smoking</label>
						</div>
					</div>
					<input name="FApply" type="submit" class="FApply" value="Apply"></input>
			</form>
			<div class="filtering">
				<span>Sort By:</span>
				<form class="" action="" method="post">
					<input class="filterapply" type="submit" name="asc" value="A-Z"></input>
				</form>
				<form class="" action="" method="post">
					<input class="filterapply" type="submit" name="desc" value="Z-A"></input>
				</form>
				<form class="" action="" method="post">
					<input class="filterapply-2" type="submit" name="high" value="Highest Price"></input>
				</form>
				<form class="" action="" method="post">
					<input class="filterapply-2" type="submit" name="low" value="Lowest Price"></input>
				</form>
				&emsp;
				<span>Filter by:</span>
				<form class="" action="" method="post">
					<select class="filterapply-2" name="lokasi">
						<option value="" disabled selected><?php echo $_SESSION["location"];?></option>
						<option value="bali">Bali</option>
						<option value="bandung">Bandung</option>
						<option value="jakarta">Jakarta</option>
						<option value="surabaya">Surabaya</option>
						<option value="yogyakarta">Yogyakarta</option>
					</select>
					<button type="submit" name="lokasifil" class="filterapply">Filter</button>
				</form>
			</div>


			</div>
		</div>
	</div>
<!-- Filter Dropdown-->

<!---+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
	</div>
</div>
<div class="containing">
	<div class="Grid">
		<?php

		
			$hasil = mysqli_query($koneksi, $sql);
			while($record = mysqli_fetch_array($hasil)){
			$nama[] = $record["Nama_Hotel"];
			$lokasi[] = $record['Location'];
			$price[] = $record['Room_Price'];
			$disc[] = $record['Discount'];
			$street[] = $record['Street'];
			$id[] = $record["ID_Hotel"];
		}
			$i=0;
			$k=0;
			while (count($nama) > $i){
			$k=$i+1;
			$disc1 = $disc[$i]/100;
			$total1 = $price[$i] - ($price[$i] * $disc1);
			$_SESSION["nama$i"] = $nama[$i];

			$sqlim = "SELECT * FROM hotel_photo	WHERE ID_Hotel = '".$id[$i]."'";
			$hasilim = mysqli_query($koneksi,$sqlim);
			while ($rec = mysqli_fetch_array($hasilim)) {
				$img = $rec["imageData1"];
				break;
			}
			
		?>
			<?php echo "<div class='button-".$i."'>";?>
				<?php echo "<button class='content-button' id='btn".$i."'>";?>
					<div class="detle">
						<img src='<?php echo "data:image/jpeg;base64,".base64_encode ($img);?>' class="content-image">
						<b ><?php echo $nama[$i];?> <br></b>
						<strong><?php echo $lokasi[$i];?><br></strong>
						<i><?php echo $street[$i];?></i>
					</div>
					<div class="pricing">
						<p><b>Save <?php echo $disc[$i];?>%</b> <s>Rp <?php echo $price[$i];?></s></p>
						<p><strong>Rp <?php echo $total1;?></strong>/Night</p>
					</div>
				</button>
				<?php
				echo '<script type="text/javascript">
						    		var btn = document.getElementById("btn'.$i.'");
									btn.addEventListener("click", function() {
				
									  document.location.href = "product_page_button_'.$i.'.php";
									});
						    	</script>';
				?>
			</div>
			<?php 
                if(!isset($nama[$k])){
                break;
            }
            $disc2 = $disc[$k]/100;
			$total2 = $price[$k] - ($price[$k] * $disc2);
			$_SESSION["nama$k"] = $nama[$k];

			$sqlim2 = "SELECT * FROM hotel_photo WHERE ID_Hotel = '".$id[$k]."'";
			$hasilim2 = mysqli_query($koneksi,$sqlim2);
			while ($res = mysqli_fetch_array($hasilim2)) {
				$img2 = $res["imageData1"];
				break;
			}
            ?>
			<?php echo "<div class='button-".$k."'>";?>
				<?php echo "<button class='content-button' id='btn".$k."'>";?>
					<div class="detle">
						<img src='<?php echo "data:image/jpeg;base64,".base64_encode ($img2);?>' class="content-image">
						<b ><?php echo $nama[$k];?> <br></b>
						<strong><?php echo $lokasi[$k];?><br></strong>
						<i><?php echo $street[$k];?></i>
					</div>
					<div class="pricing">
						<p><b>Save <?php echo $disc[$k];?>%</b> <s>Rp <?php echo $price[$k];?></s></p>
						<p><strong>Rp <?php echo $total2;?></strong>/Night</p>
					</div>
				</button>
				<?php
				echo '<script type="text/javascript">
						    		var btn = document.getElementById("btn'.$k.'");
									btn.addEventListener("click", function() {
				
									  document.location.href = "product_page_button_'.$k.'.php";
									});
						</script>';
				?>
			</div>
			<?php
			$i = $k+1;
			} ?>
	</div>
</div>
</div>
<div class="foot">
</div>
</body>
</html>
