<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="css\cp.css">
    <title>Admin's login</title>
  </head>
  <body>
    <div class="wrap">
      <div class="containing">
        <form class="" action="adminloginprocess.php" method="post">
          <label for="">Administrator Login Form</label>
          <label for=""><b>Username:</b></label>
          <input type="text" name="adminid" value="" placeholder="Username">
          <label for="password"><b>Password:</b></label>
          <input class="password"type="password" name="password" value="" placeholder="********">
          <button type="submit" name="button">Login</button>
        </form>
      </div>
    </div>
  </body>
</html>
