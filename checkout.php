<?php  
    include_once "config.php";
    session_start();
    
    do{
        $trid = mt_rand(10000000,99999999);
        $id = "SELECT * FROM transaction WHERE ID_Transaction = '".$trid."'";
        $result = mysqli_query($koneksi, $id);
    }while (mysqli_num_rows($result) > 0);

    $_SESSION["trid"] = $trid;
    $_SESSION["orddate"] = date("Y-m-d");


    $datetime1 = new DateTime($_SESSION['checkin']);
    $datetime2 = new DateTime($_SESSION['checkout']);
    $res1 = $datetime1->format('d-M-Y');
    $res2 = $datetime2->format('d-M-Y');


    $interval = $datetime1->diff($datetime2);


    $total = $_SESSION['harga'] - ($_SESSION['harga'] * ($_SESSION['disco']/100));

?>


<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- library validate -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
    <!-- style css -->
    <link rel="stylesheet" href="css/Style-check.css">
</head>
<body>

<h2>Checkout</h2>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form id="validate" action="sucess.php" method="post">
                <div class="row">
                    <div class="col-50">
                        <h3>Transaction ID : &nbsp <?php echo $trid;?></h3>
                        <i>Order Date : &nbsp<?php echo(date("d-M-Y"));?></i> <br>
                        <br>
                        <b><?php echo $_SESSION['namahotel'];?></b> <br>
                        <b>check-in : &nbsp</b><i><?php echo $res1;?></i> &nbsp&nbsp - &nbsp
                        <b>check-out : &nbsp</b><i><?php echo $res2;?></i><br>
                        <br>
                        <label for="uname"><i class="fa fa-user"></i> Username</label>
                        <input type="text" id="fname" name="fullname" placeholder="<?php echo $_SESSION["username"];?>" value="<?php echo $_SESSION["username"];?>" required disabled>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="<?php echo $_SESSION["email"];?>" value="<?php echo $_SESSION["email"];?>" required disabled>
                        <label for="email"><i class="fa fa-id-card-o"></i> IDentity card (KTP/Passport/SIM)</label>
                        <input type="text" id="email" name="ktp" placeholder="18515230000000" required>
                        <div class="contain">
                          <b>Billing Details:</b> <br>
                          <i>Rp <?php echo $_SESSION['harga'];?></i> <small class="">x<?php echo $interval->format('%a');?> Night(s)</small>
                               <small class="lefty">x<?php echo $_SESSION["roompick"];?> Room(s)</small><br>
                          <b class="lefty">- Discount (<?php echo $_SESSION['disco'];?>%)</b><br>
                          <br>
                          <hr>
                          <b>total :</b>
                          <small class="lefty">(Tax incl.)</small><b class="lefty"> Rp <?php echo $total*$_SESSION["roompick"]*$interval->d;?></b><br>
                        </div>
                        <?php  
                        $_SESSION["totalp"] = $total*$_SESSION["roompick"]*$interval->d;
                        $_SESSION["usedroom"] = $interval->d;
                        ?>
                    </div>
                    </div>
                    </div>

                    <div class="col-50">
                        <h3>Payment</h3>  
                            <p><input type='radio' name='radAnswer' value='' />Bank Transfer</p>
                            <p><input type='radio' name='radAnswer' value='' />Mini Market</p>
                        </div>
                        </div>
                    </div>
                </div>
                <label>
                </label>
                <input type="submit" value="Checkout" class="btn sm">
            </form>
        </div>
    </div>
    </div>
</div>
</body>
</html>
