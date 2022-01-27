<?php
  include_once "config.php";
  session_start();
  $sqlimgprof = "SELECT * FROM user WHERE Username = '".$_SESSION["username"]."'";
    $resimg = mysqli_query($koneksi, $sqlimgprof);
    while($recprof = mysqli_fetch_array($resimg)){
    $imgprof = $recprof["Photo_Profile"];}

  $sqlcheck = "SELECT * FROM transaction";
  $query = mysqli_query($koneksi, $sqlcheck);
  while ($recordtr = mysqli_fetch_array($query)) {
    $tridd[] = $recordtr["ID_Transaction"];
  }
  $countt = $query->num_rows;
  if ($countt > 0) {
  $sql = "SELECT * FROM transaction WHERE Status_Payment in ('Verifying', 'Verified') AND Username = '".$_SESSION["username"]."'";
  $sql2 = "SELECT * FROM transaction WHERE Status_Payment = 'Completed' AND Username = '".$_SESSION["username"]."'";
  }



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css\style-index.css">
    <link rel="stylesheet" href="css\style-profile.css">
    <link rel="icon" href="css/Group 36.png">
    <title></title>
  </head>
  <body>
    <body>
      <div class="container-fluid padding">
        <a href="landing.php" alt=""><img src="assets\logo-black.svg" alt=""></a>
        <div class="dropdown profile">
          <button class="dropbtn" onclick="myFunction()" name="button">
            <img src='<?php echo "data:image/jpeg;base64,".base64_encode ($imgprof);?>' class="profile-img resize" alt="">
          </button>
          <div id="myDropdown" class="dropdown-content profile-txt">
            <a class="logx1" href="profile.php">My Account</a>
            <a href="#">Help</a>
            <a class="helpx1" href="logout-process.php">Log out</a>
          </div>
        </div>
      </div>

      <div class="container">
        <button class="tablink" onclick="openPage('Active', this,'red')" id="defaultOpen" >Active Purchases</button>
        <button class="tablink" onclick="openPage('History', this,'red')" >Transactions History</button>
<!--===============PEMBELIAN AKTIF=====================-->
        <div id="Active" class="tabcontent">
          <div class="wrap2">
            <!-- ISI DATA PEMBELIAN AKTIF-->
            <?php
             if (isset($sql)) {
              $result = mysqli_query($koneksi,$sql);
              while($record = mysqli_fetch_array($result)){
              $ordate[] = $record["Order_Date"];
              $trid[] = $record["ID_Transaction"];
              $spay[] = $record["Status_Payment"];
              $hid[] = $record["ID_Hotel"];
            }

            $i=0;
            $count = $result->num_rows;
            while ($count > $i){
              $sqlh = "SELECT * FROM hotel_detail WHERE ID_Hotel = '".$hid[$i]."'";
              $resh = mysqli_query($koneksi, $sqlh);
              while($rec = mysqli_fetch_array($resh)){
                $nama = $rec["Nama_Hotel"];
                $street = $rec["Street"];
                break;
              }
              $sqlim = "SELECT * FROM hotel_photo WHERE ID_Hotel = '".$hid[$i]."'";
              $hasilim = mysqli_query($koneksi,$sqlim);
              while ($rec = mysqli_fetch_array($hasilim)) {
                $img = $rec["imageData1"];
                break;
              }
            ?>
            <div class="spantrans">
              <div class="">
                <img class="transpic" src='<?php echo "data:image/jpeg;base64,".base64_encode ($img);?>' alt="">
              </div>
              <div style="display: flex;">
                <div class="transtext">
                  <h4><?php echo $nama;?></h4>
                  <p><?php echo $street;?></p>
                  <div class="stats">
                    <div class="">
                      <i>Booking Date:</i>
                      <div class="smoll">
                       <i><?php echo $ordate[$i];?></i>
                      </div>
                    </div>
                    <i>Status :</i>
                    <?php
                      if ($spay == 'Verifying') {
                        $statpay = "verfing";
                      }
                      if ($spay == 'Verified') {
                         $statpay = "verfed";
                       }

                    ?>
                    <i class="<?php echo $statpay;?>"><?php echo $spay[$i];?></i>
                  </div>
                </div>
              </div>
              <div class="transbutton">
                <div class="">
                  <i>Booking Code: </i>
                  <b><?php echo $trid[$i];?></b>
                </div>

              </div>
            </div>
            <?php
              $i += 1;
            }
            }
            ?>
            <!--=============================================== -->
        <!--=============================================== -->
        </div>
      </div>
      <!--===============RIWAYAT PEMBELIAN=====================-->
              <div id="History"class="tabcontent">

                <?php
                if (isset($sql2)) {
                  
                
                    $resultc = mysqli_query($koneksi,$sql2);
                    while($recordc = mysqli_fetch_array($resultc)){
                    $ordatec[] = $recordc["Order_Date"];
                    $tridc[] = $recordc["ID_Transaction"];
                    $spayc[] = $recordc["Status_Payment"];
                    $hidc[] = $recordc["ID_Hotel"];
                  }

                  $k=0;
                  $count2 = $resultc->num_rows;
                  while ($count2 > $k){
                    $sqlhc = "SELECT * FROM hotel_detail WHERE ID_Hotel = '".$hidc[$k]."'";
                    $reshc = mysqli_query($koneksi, $sqlhc);
                    while($recc = mysqli_fetch_array($reshc)){
                      $namac = $recc["Nama_Hotel"];
                      $streetc = $recc["Street"];
                      break;
                    }
                    $sqlimc = "SELECT * FROM hotel_photo WHERE ID_Hotel = '".$hidc[$k]."'";
                    $hasilimc = mysqli_query($koneksi,$sqlimc);
                    while ($recc = mysqli_fetch_array($hasilimc)) {
                      $imgc = $recc["imageData1"];
                      break;
                    }
                  ?>
                <div class="spantrans">
                  <div class="">
                    <img class="transpic" src='<?php echo "data:image/jpeg;base64,".base64_encode ($imgc);?>' alt="">
                  </div>
                  <div style="display: flex;">
                    <div class="transtext">
                      <h4><?php echo $namac;?></h4>
                      <p><?php echo $streetc;?></p>
                      <div class="stats">
                        <div class="">
                          <i>Booking Date:</i>
                          <div class="smoll">
                           <i><?php echo $ordatec[$k];?></i>
                          </div>
                        </div>
                        <i>Status :</i>
                        <i class="verfed"><?php echo $spayc[$k];?></i>
                      </div>
                    </div>
                  </div>
                  <div class="transbutton">
                    <div class="">
                      <i>Booking Code: </i>
                      <b><?php echo $tridc[$k];?></b>
                    </div>
                  </div>
                </div>
                <?php
                    $k += 1;
                  }
                  }
                  ?>
              </div>
            <!--=============================================== -->
    </div>

    <script src="js\script.js"></script>
    <script type="text/javascript">
      document.getElementById("defaultOpen").click();
    </script>
  </body>
</html>
