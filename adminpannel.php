<?php  
  include_once "config.php";
  session_start();
  if ($_SESSION['user_session'] == null) {
    header('Location: adminlanding.php');
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css\cp.css">
    <title>Admin's Panel</title>
  </head>
  <body>
    <h1 style="float: left;">Administrator Panel <img src="assets\pannel.png" width="40px"alt=""> </h1>
    <button onclick="location.href='adminlogoutprocess.php'" type="submit" name="button" style="padding:5px; float: right; margin-top: 40px; margin-right: 10px;" class="cancl"><h5>Log out</h5></button>
    <div class="container-fluid">
      <button class="accordion">Hotels' data panel</button>
        <div class="panel">
          <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'viewh')" id="defaultOpen">View Data</button>
            <button class="tablinks" onclick="openCity(event, 'inputh')">Input</button>
            <button class="tablinks" onclick="openCity(event, 'updateh')">Update</button>
            <button class="tablinks" onclick="openCity(event, 'deleteh')">Delete</button>
            </div>
            <div id="viewh" class="tabcontent">
              <h3>View Data</h3>
              <table>
                <tr>
                  <th>ID Hotel</th>
                  <th>Nama Hotel</th>
                  <th>Location</th>
                  <th>Street</th>
                  <th>Room Price</th>
                  <th>Discount</th>
                  <th>Available Room</th>
                  <th>Used Room</th>
                  <th>Total Room</th>
                  <th>AC</th>
                  <th>Wifi</th>
                  <th>Parking</th>
                  <th>Smoking</th>
                </tr>
                <!-- LOOPING HERE -->
                <?php  
                    $sql = "SELECT * FROM hotel_detail";
                    $hasil = mysqli_query($koneksi , $sql);
                  while($record = mysqli_fetch_array($hasil))
                  {

                ?>
                <tr>
                  <td><?php echo $record["ID_Hotel"];?></td>
                  <td><?php echo $record["Nama_Hotel"];?></td>
                  <td><?php echo $record["Location"];?></td>
                  <td><?php echo $record["Street"];?></td>
                  <td><?php echo $record["Room_Price"];?></td>
                  <td><?php echo $record["Discount"];?></td>
                  <td><?php echo $record["Available_Room"];?></td>
                  <td><?php echo $record["Used_Room"];?></td>
                  <td><?php echo $record["Total_Room"];?></td>
                  <td><?php echo $record["AC"];?></td>
                  <td><?php echo $record["Wifi"];?></td>
                  <td><?php echo $record["Parking"];?></td>
                  <td><?php echo $record["Smoking"];?></td>
                </tr>
                <?php  }?>
                <!-- ============== -->
            </table>
            </div>
            <div id="inputh" class="tabcontent">
              <h3>Input</h3>
              <form class="" action="inputhotel.php" method="post">
                <label for=""><input type="text" name="id" value=""> ID Hotel</label><br>
                <label for=""><input type="text" name="nama" value=""> Nama Hotel</label><br>
                <label for=""><input type="text" name="loc" value=""> Location</label><br>
                <label for=""><input type="text" name="st" value=""> Street</label><br>
                <label for=""><input type="text" name="price" value=""> Room Price</label><br>
                <label for=""><input type="text" name="disc" value=""> Discount</label><br>
                <label for=""><input type="text" name="avail" value=""> Available Room</label><br>
                <label for=""><input type="text" name="total" value=""> Total Room</label><br>
                <input type="hidden" name="ac" value="no">
                <label for=""><input type="checkbox" name="ac" value="yes"> AC</label><br>
                <input type="hidden" name="wifi" value="no">
                <label for=""><input type="checkbox" name="wifi" value="yes"> Wifi</label><br>
                <input type="hidden" name="parking" value="no">
                <label for=""><input type="checkbox" name="parking" value="yes"> Parking</label><br>
                <input type="hidden" name="smoking" value="no">
                <label for=""><input type="checkbox" name="smoking" value="yes"> Smoking</label><br>
                <label> Description :</label><br>
                <label for=""><textarea type="text" name="desc" value="" rows="5"cols="100"></textarea> </label><br>
                <button type="submit" name="sub" class="cancl"> Input</button>
              </form>
            </div>
            <div id="updateh" class="tabcontent">
               <h3>Update</h3>
              <form class="" action="updatehotelprocess.php" method="post">
                <label for="">
                  <select class="" name="selectid">
                  <!-- Looping disini -->
                  <option value="" disabled selected>select Hotel's ID</option>
                  <?php 
                    $sql = "SELECT * FROM hotel_detail";
                    $result = mysqli_query($koneksi, $sql);
                    while ($recordid = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php  echo $recordid["ID_Hotel"];?>"> <?php  echo $recordid["ID_Hotel"];?></option>
                  <?php  }?>
                </select> ID Hotel</label><br>
                <label for=""><input type="text" name="nama" value=""> Nama Hotel</label><br>
                <label for=""><input type="text" name="loc" value=""> Location</label><br>
                <label for=""><input type="text" name="st" value=""> Street</label><br>
                <label for=""><input type="text" name="price" value=""> Room Price</label><br>
                <label for=""><input type="text" name="disc" value=""> Discount</label><br>
                <label for=""><input type="text" name="avail" value=""> Available Room</label><br>
                <label for=""><input type="text" name="total" value=""> Total Room</label><br>
                <input type="hidden" name="ac" value="no">
                <label for=""><input type="checkbox" name="ac" value="yes"> AC</label><br>
                <input type="hidden" name="wifi" value="no">
                <label for=""><input type="checkbox" name="wifi" value="yes"> Wifi</label><br>
                <input type="hidden" name="parking" value="no">
                <label for=""><input type="checkbox" name="parking" value="yes"> Parking</label><br>
                <input type="hidden" name="smoking" value="no">
                <label for=""><input type="checkbox" name="smoking" value="yes"> Smoking</label><br>
                <label> Description :</label><br>
                <label for=""><textarea type="text" name="desc" value="" rows="5"cols="100"></textarea> </label><br>
                <button type="submit" name="sub" class="cancl"> Update</button>
              </form>
            </div>
            <div id="deleteh" class="tabcontent">
               <h3>Delete</h3>
              <form class="" action="deletehotelprocess.php" method="post">
                <select class="" name="id">
                  <option value="" disabled selected> Select Hotel's ID</option>
                   <?php 
                    $sql = "SELECT * FROM hotel_detail";
                    $result = mysqli_query($koneksi, $sql);
                    while ($recordid = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php  echo $recordid["ID_Hotel"];?>"> <?php  echo $recordid["ID_Hotel"];?></option>
                  <?php  }?>
                </select>
                <button class="cancl" type="submit" name="button"> DELETE USER</button>
              </form>
            </div>
        </div>
      <button class="accordion">Transactions</button>
        <div class="panel">
          <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'viewt')" >All transactions</button>
            <button class="tablinks" onclick="openCity(event, 'veryfi')">Need Veification</button>
            <button class="tablinks" onclick="openCity(event, 'verfed')">Verified Transaction</button>
            </div>
            <div id="viewt" class="tabcontent">
              <h3>All transactions</h3>
              <table>
                <tr>
                  <th>ID Transaction</th>
                  <th>Username</th>
                  <th>ID Hotel</th>
                  <th>Order Date</th>
                  <th>Check-in Date</th>
                  <th>Check-Out Date</th>
                  <th>Total Payment</th>
                  <th>Status Payment</th>
                </tr>
                <!-- LOOPING HERE -->
                <?php
                  $sql = "SELECT * FROM transaction";
                  $query = mysqli_query($koneksi, $sql);
                  while ($recordtr = mysqli_fetch_array($query)) {
                ?>
                <tr>
                  <td><?php echo $recordtr["ID_Transaction"];?></td>
                  <td><?php echo $recordtr["Username"];?></td>
                  <td><?php echo $recordtr["ID_Hotel"];?></td>
                  <td><?php echo $recordtr["Order_Date"];?></td>
                  <td><?php echo $recordtr["Check-in_Date"];?></td>
                  <td><?php echo $recordtr["Check-Out_Date"];?></td>
                  <td><?php echo $recordtr["Total_Payment"];?></td>
                  <!-- EDITABLE STATSUS-->
                  <!-- please use CLASSS = verfing / verfed / completed / canceled -->
                  <?php
                    switch ($recordtr["Status_Payment"]) {
                      case 'Verifying':
                        $class = "verfing";
                        break;
                      case 'Verified':
                        $class = "verfed";
                        break;
                       case 'Completed':
                        $class = "completed";
                        break;
                    }
                  ?>
                  <td class="<?php echo $class;?>"><?php echo $recordtr["Status_Payment"];?></td>
                </tr>
                <?php  }?>
                <!-- ======== -->
              </table>
            </div>
  <!-- table NEED VERIFICATION-->
            <div id="veryfi" class="tabcontent">
              <h3>Need Verification</h3>
              <table>
                <tr>
                  <th>ID Transaction</th>
                  <th>Username</th>
                  <th>ID Hotel</th>
                  <th>Order Date</th>
                  <th>Check-in Date</th>
                  <th>Check-Out Date</th>
                  <th>Total Payment</th>
                  <th>Status Payment</th>
                  <th></th>
                </tr>
                <!-- LOOPING HERE -->
                <?php
                  $sql = "SELECT * FROM transaction WHERE Status_Payment = 'Verifying'";
                  $query = mysqli_query($koneksi, $sql);
                  while ($recordtr = mysqli_fetch_array($query)) {
                ?>
                <tr>
                  <td><?php echo $recordtr["ID_Transaction"];?></td>
                  <td><?php echo $recordtr["Username"];?></td>
                  <td><?php echo $recordtr["ID_Hotel"];?></td>
                  <td><?php echo $recordtr["Order_Date"];?></td>
                  <td><?php echo $recordtr["Check-in_Date"];?></td>
                  <td><?php echo $recordtr["Check-Out_Date"];?></td>
                  <td><?php echo $recordtr["Total_Payment"];?></td>
                  <!-- EDITABLE STATSUS-->
                  <!-- please use CLASSS = verfing / verfed / completed / scanceled -->
                  <td class="verfing"><?php echo $recordtr["Status_Payment"];?></td>
                  <?php $trans = $recordtr["ID_Transaction"]?>
                  <td>
                    <form class="" action="" method="post">
                      <input class="verfi" type="submit" name="<?php echo "buttonu".$trans;?>" value="Verify Transaction"></input>
                    </form>
                    <?php
                      if (isset($_POST["buttonu$trans"])) {
                        ${"sqlu$trans"} = "UPDATE transaction SET Status_Payment = 'Verified' WHERE ID_Transaction = '".$trans."'";
                        $exe = mysqli_query($koneksi, ${"sqlu$trans"});
                      }
                    ?>
                  </td>
                  <td>
                    <form class="" action="" method="post">
                      <input class="cancl" type="submit" name="<?php echo "buttond".$trans;?>" value="Cancel Transaction"></input>
                    </form>
                     <?php
                      if (isset($_POST["buttond$trans"])) {
                        ${"sqld$trans"} = "DELETE FROM transaction WHERE ID_Transaction = '".$trans."'";
                        $exe = mysqli_query($koneksi, ${"sqld$trans"});

                        $sqlu = "SELECT * FROM hotel_detail WHERE ID_Hotel = '".$recordtr["ID_Hotel"]."'";
                        $exe2 = mysqli_query($koneksi,$sqlu);
                        while ($record = mysqli_fetch_array($exe2)) {
                          $used = $record["Used_Room"];
                          $avail = $record["Available_Room"];
                        }

                        $newused = $used - $recordtr["Rooms"];
                        $newavail = $avail + $recordtr["Rooms"];

                        $sqlu2 = "UPDATE hotel_detail SET Used_Room = '".$newused."', Available_Room = '".$newavail."' WHERE ID_Hotel = '".$recordtr["ID_Hotel"]."'";
                        $exe3 = mysqli_query($koneksi,$sqlu2);

                      }
                    ?>
                  </td>
                </tr>
                <?php  }?>
                <!-- ======== -->
              </table>
            </div>
  <!-- table VERIFIED-->
            <div id="verfed" class="tabcontent">
              <h3>Verified transactions</h3>
              <table>
                <tr>
                  <th>ID Transaction</th>
                  <th>Username</th>
                  <th>ID Hotel</th>
                  <th>Order Date</th>
                  <th>Check-in Date</th>
                  <th>Check-Out Date</th>
                  <th>Total Payment</th>
                  <th>Status Payment</th>
                  <th></th>
                </tr>
                <!-- LOOPING HERE -->
                <?php
                  $sql = "SELECT * FROM transaction WHERE Status_Payment = 'Verified'";
                  $query = mysqli_query($koneksi, $sql);
                  while ($recordtr = mysqli_fetch_array($query)) {
                ?>
                <tr>
                  <td><?php echo $recordtr["ID_Transaction"];?></td>
                  <td><?php echo $recordtr["Username"];?></td>
                  <td><?php echo $recordtr["ID_Hotel"];?></td>
                  <td><?php echo $recordtr["Order_Date"];?></td>
                  <td><?php echo $recordtr["Check-in_Date"];?></td>
                  <td><?php echo $recordtr["Check-Out_Date"];?></td>
                  <td><?php echo $recordtr["Total_Payment"];?></td>
                  <!-- EDITABLE STATSUS-->
                  <!-- please use CLASSS = verfing / verfed / completed / scanceled -->
                  <td class="verfed"><?php echo $recordtr["Status_Payment"];?></td>
                  <?php $trans = $recordtr["ID_Transaction"]?>
                  <td>
                    <form class="" action="" method="post">
                      <input class="verfi" type="submit" name="<?php echo "buttonc".$trans;?>" value="Complete Transaction"></input>
                    </form>
                    <?php
                      if (isset($_POST["buttonc$trans"])) {
                        ${"sqlc$trans"} = "UPDATE transaction SET Status_Payment = 'Completed' WHERE ID_Transaction = '".$trans."'";
                        $exe = mysqli_query($koneksi, ${"sqlc$trans"});

                        $sqlu = "SELECT * FROM hotel_detail WHERE ID_Hotel = '".$recordtr["ID_Hotel"]."'";
                        $exe2 = mysqli_query($koneksi,$sqlu);
                        while ($record = mysqli_fetch_array($exe2)) {
                          $used = $record["Used_Room"];
                          $avail = $record["Available_Room"];
                        }

                        $newused = $used - $recordtr["Rooms"];
                        $newavail = $avail + $recordtr["Rooms"];

                        $sqlu2 = "UPDATE hotel_detail SET Used_Room = '".$newused."', Available_Room = '".$newavail."' WHERE ID_Hotel = '".$recordtr["ID_Hotel"]."'";
                        $exe3 = mysqli_query($koneksi,$sqlu2);


                      }
                    ?>
                  </td>
                </tr>
              <?php  }?>
                <!-- ======== -->
              </table>
            </div>
        </div>
        <!-- TABLE USER -->
        <button class="accordion">Users' Data</button>
          <div class="panel">
              <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'viewu')" >View Data</button>
                <button class="tablinks" onclick="openCity(event, 'deleu')">Delete User</button>
              </div>
              <div id="viewu" class="tabcontent">
                 <h3>View Data</h3>
                <table>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Username</th>
                    <th>Password</th>
                  </tr>
                  <?php
                  $sql = "SELECT * FROM user";
                  $query = mysqli_query($koneksi, $sql);
                  while ($recordus = mysqli_fetch_array($query)) {
                  ?>
                  <tr>
                    <td><?php echo $recordus["First_Name"];?></td>
                    <td><?php echo $recordus["Last_Name"];?></td>
                    <td><?php echo $recordus["Email_User"];?></td>
                    <td><?php echo $recordus["Username"];?></td>
                    <td><?php echo $recordus["Password"];?></td>
                  </tr>
                <?php  }?>
                </table>
              </div>
              <div id="deleu" class="tabcontent">
                 <h3>Delete User</h3>
                <form class="" action="" method="post">
                  <select class="" name="Username">
                    <option value="" disabled selected> Select Username</option>
                    <?php  
                    $sql = "SELECT * FROM user";
                    $query = mysqli_query($koneksi, $sql);
                    while ($recordus = mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?php echo $recordus["Username"];?>"><?php echo $recordus["Username"];?></option>
                    <?php  }?>
                  </select>
                  <input class="cancl" type="submit" name="delete"></input>
                </form>
                <?php
                      if (isset($_POST["delete"])) {
                        $sqldel = "DELETE FROM user WHERE Username = '".$_POST["Username"]."'";
                        $exe = mysqli_query($koneksi, $sqldel);
                      }
                    ?>
              </div>
          </div>
        <!-- TABLE ADMIN -->
        <button class="accordion">Admins' Data</button>
          <div class="panel">
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'viewa')" id="defaultOpen">View Data</button>
              <button class="tablinks" onclick="openCity(event, 'inputa')">Input</button>
              <button class="tablinks" onclick="openCity(event, 'updatea')">Update</button>
              <button class="tablinks" onclick="openCity(event, 'deletea')">Delete</button>
              </div>
              <div id="viewa" class="tabcontent">
                <h3>View Data</h3>
                <table>
                  <tr>
                    <th>Nama Admin</th>
                    <th>Username Admin</th>
                    <th>Password Admin</th>
                  </tr>
                  <?php
                  $sql = "SELECT * FROM admin";
                  $query = mysqli_query($koneksi, $sql);
                  while ($recordam = mysqli_fetch_array($query)) {
                  ?>
                  <tr>
                    <td><?php echo $recordam["Nama_Admin"];?></td>
                    <td><?php echo $recordam["Username_Admin"];?></td>
                    <td><?php echo $recordam["Password_Admin"];?></td>
                  </tr>
                  <?php  }?>
                  <!-- ============== -->
              </table>
              </div>
              <div id="inputa" class="tabcontent">
                <h3>Input New Admin</h3>
                <form class="" action="inputadmin.php" method="post">
                  <label for=""><input type="text" name="aname" value=""> Admin's Name</label><br>
                  <label for=""><input type="text" name="auname" value=""> Admin Username </label><br>
                  <label for=""><input type="text" name="apass" value=""> Admin Password</label><br>
                  <input type="submit" name="input" class="cancl" value="Input"></input>
                </form>
              </div>
              <div id="updatea" class="tabcontent">
                <h3>Update Admin Data</h3>
                <form class="" action="updateadmin.php" method="post">
                  <select class="" name="selectidam">
                  <option value="" disabled selected>select Admin Username</option>
                  <?php  
                    $sql = "SELECT * FROM admin";
                    $query = mysqli_query($koneksi, $sql);
                    while ($recordam = mysqli_fetch_array($query)) {
                    ?>
                  <option value="<?php echo $recordam["Username_Admin"];?>"><?php echo $recordam["Username_Admin"];?></option>
                <?php  }?>
                  </select> Admin Username</label><br>
                  <label for=""><input type="text" name="aname" value=""> Admin's Name</label><br>
                  <label for=""><input type="text" name="apass" value=""> Admin Password</label><br>
                  <input type="submit" name="update" class="cancl" value="Update"></input>
                </form>
              </div>
              <div id="deletea" class="tabcontent">
                 <h3>Delete Admin</h3>
                <form class="" action="deleteadmin.php" method="post">
                  <select class="" name="selectidam">
                  <option value="" disabled selected>select Admin Username</option>
                  <?php  
                    $sql = "SELECT * FROM admin";
                    $query = mysqli_query($koneksi, $sql);
                    while ($recordam = mysqli_fetch_array($query)) {
                    ?>
                  <option value="<?php echo $recordam["Username_Admin"];?>"><?php echo $recordam["Username_Admin"];?></option>
                  <?php  }?>
                  </select> Admin Username</label>
                  <input type="submit" name="delete" class="cancl" value="Delete"></input>
                </form>
              </div>
          </div>

    </div>

<script>
    document.getElementById("defaultOpen").click();
    document.getElementById("defaultOpen").click();
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    var acc = document.getElementsByClassName("accordion");
    var panel = document.getElementsByClassName('panel');

    for (var i = 0; i < acc.length; i++) {
        acc[i].onclick = function() {
            var setClasses = !this.classList.contains('active');
            setClass(acc, 'active', 'remove');
            setClass(panel, 'show', 'remove');

            if (setClasses) {
                this.classList.toggle("active");
                this.nextElementSibling.classList.toggle("show");
            }
        }
    }

    function setClass(els, className, fnName) {
        for (var i = 0; i < els.length; i++) {
            els[i].classList[fnName](className);
        }
    }
</script>
  </body>
</html>
