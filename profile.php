<?php
  include_once "config.php";
  session_start();

  $sql = "SELECT * FROM user WHERE Username = '".$_SESSION["username"]."'";
  $res = mysqli_query($koneksi, $sql);
  while($rec = mysqli_fetch_array($res)){
    $img = $rec["Photo_Profile"];
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css\style-index.css">
    <link rel="stylesheet" href="css\style-profile.css">
    <link rel="icon" href="css/Group 36.png">
    <title> My Account </title>
  </head>
  <body>
    <div class="container-fluid padding">
      <a href="landing.php" alt=""><img src="assets\logo-black.svg" alt=""></a>
      <div class="dropdown profile">
        <button class="dropbtn" onclick="myFunction()" name="button">
          <img src='<?php echo "data:image/jpeg;base64,".base64_encode ($img);?>' class="profile-img resize" alt="">
        </button>
        <div id="myDropdown" class="dropdown-content profile-txt">
          <a class="logx1" href="Transaction.php">My transaction</a>
          <a href="#">Help</a>
          <a class="helpx1" href="logout-process.php">Log out</a>
        </div>
      </div>
    </div>

    <div class="container">
      <button class="tablink" onclick="openPage('Home', this,'red')" id="defaultOpen" >My Account</button>
      <button class="tablink" onclick="openPage('News', this,'red')" >Account settings</button>
<!--===============HANYA UNTUK DISPLAY=====================-->
      <div id="Home" class="tabcontent">
        <div class="wrap">
          <div class="profobox">
            <img class="profoimg" src='<?php echo "data:image/jpeg;base64,".base64_encode ($img);?>' alt="">
            <h1><?php echo $_SESSION['fname']." ".$_SESSION['lname'];?></h1>
          </div>
          <div class="acctbox">
            <h5>Email Adress:</h5>
            <p><?php echo $_SESSION['email'];?></p>
            <h5>Username:</h5>
            <p><?php echo $_SESSION['username'];?></p>
            <form action="logout-process.php">
              <button type="sumbit" name="logout">Log Out</button>
            </form>
          </div>
        </div>

      </div>
<!--vvvvvvvvvvvvvvvvvvvvvv UNTUK CRUD vvvvvvvvvvvvvvvvvvvvvvv-->
      <div id="News" class="tabcontent">
        <div class="wrap">
            <div class="profobox">
              <div class="">
                <h4>Change profile picture</h4>
                <!--===============untuk show foto profil=====================-->
                <img class="profoimg" src='<?php echo "data:image/jpeg;base64,".base64_encode ($img);}?>' alt="">
                <!--===============untuk upload fotoprofile=====================-->
                <form action="update-photo.php" method="post" enctype="multipart/form-data">
                  Select image to upload:
                  <input type="file" name="userImage" id="fileToUpload">
                  <input type="submit" value="Upload Image" name="submit">
              </form>
              </div>
            </div>
            <div class="acctbox">
              <!--===============FORM UNTUNK UPDATE IFORMASI=====================-->
              <form class="" action="updateprofile-process.php" method="post">
                <div class="element">
                  <label for="username">Username:</label>
                  <input type="text" name="username" placeholder="<?php echo $_SESSION['username'];?>" disabled="">
                </div>
                <div class="element">
                  <label for="password">New Password:</label>
                  <input class="Password" type="password" name="password" placeholder="Password">
                </div>
                <div class="element">
                  <label for="email">New Email adress:</label>
                  <input type="text" name="email" placeholder="Email">
                </div>
                <div class="element">
                  <label for="password">New First Name:</label>
                  <input type="text" name="fname" placeholder="First Name">
                </div>
                <div class="element">
                  <label for="password">New Last Name:</label>
                  <input type="text" name="lname" placeholder="Last Name">
                </div>
                <button type="submit" name="button">Apply</button>
              </form>
            </div>
          </div>
      </div>
  </div>
  
  <script src="js\script.js"></script>
  <script type="text/javascript">
    document.getElementById("defaultOpen").click();
  </script>
  </body>
</html>
