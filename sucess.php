<?php
  include_once "config.php";
  session_start();
  $sql = "INSERT INTO transaction VALUES ('".$_SESSION["trid"]."', '".$_SESSION["username"]."', '".$_POST["ktp"]."', '".$_SESSION["hotelid"]."', '".$_SESSION["orddate"]."', '".$_SESSION["checkin"]."', '".$_SESSION["checkout"]."', '".$_SESSION["roompick"]."', '".$_SESSION["totalp"]."', 'Verifying')";

  $exe = mysqli_query($koneksi, $sql);

  $sqlu = "SELECT * FROM hotel_detail WHERE ID_Hotel = '".$_SESSION["hotelid"]."'";
  $exe2 = mysqli_query($koneksi,$sqlu);
  while ($record = mysqli_fetch_array($exe2)) {
    $used = $record["Used_Room"];
    $avail = $record["Available_Room"];
  }

  $newused = $used + $_SESSION["usedroom"];
  $newavail = $avail - $_SESSION["usedroom"];

  $sqlu2 = "UPDATE hotel_detail SET Used_Room = '".$newused."', Available_Room = '".$newavail."' WHERE ID_Hotel = '".$_SESSION["hotelid"]."'";
  $exe3 = mysqli_query($koneksi,$sqlu2);


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
  .wrap button{
    color: white;
    border: 0px;
    padding: 5px;
    border-radius: 10px;
    width: 200px;
    margin-left: 105px;
    margin-top: 10px;
    background-color: red;
    float: right;
  }
  .wrap label{
    margin-top: 15px;
  }
  .wrap button:active, .wrap button:focus,
  .wrap input:active, .wrap input:focus{
    -moz-outline-style: none;
  	outline:none;
  	outline: 0;
  }
  </style>
  <body>
    <div class="wrap">
      <div class="container">
        <label for=""> <b>Checkout Success!</b> </label>
        <button onclick="location.href='landing.php'" type="button" name="button"> Back to home</button>
      </div>
    </div>
    <div style="border-style: dashed;
    margin-top: 20px;"class="container">
      <b>Order Receipt</b><br>
      -Transaction ID : <?php echo $_SESSION["trid"];?><br>
      -Order Date : <?php echo $_SESSION["orddate"];?><br>
      -Check-in Date : <?php echo $_SESSION["checkin"];?><br>
      -Check-out Date : <?php echo $_SESSION["checkout"];?><br>
      -Email : <?php echo $_SESSION["email"];?><br>
      -No. KTP : <?php echo $_POST["ktp"];?><br>
      -Room : <?php echo $_SESSION["roompick"];?> Room(s)<br>
      -Total Payment : Rp. <?php echo $_SESSION["totalp"];?><br>
      <br>
      <br>
      
      <b>Please Save This Receipt For Check-in In The Hotel.<b>
    </div>
  </body>
</html>
