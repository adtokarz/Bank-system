<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if (isset($_POST['login'])) {
  $ret = mysqli_query($con, "SELECT * FROM user WHERE email='" . $_POST['email'] . "' and password='" . $_POST['password'] . "'");
  $num = mysqli_fetch_array($ret);
  if ($num > 0) {
    $_SESSION['login'] = $_POST['email'];
    $_SESSION['id'] = $num['id'];
    $_SESSION['name'] = $num['name'];


    ob_start();
    system('ipconfig /all');
    $mycom = ob_get_contents();
    ob_clean();
    $findme = "Physical";
    $pmac = strpos($mycom, $findme);
    $mac = substr($mycom, ($pmac + 36), 17);
    $ret = mysqli_query($con, "insert into usercheck(logindate,logintime,user_id,username,email,ip,mac,city,country)values('" . $val3 . "','" . $tim . "','" . $_SESSION['id'] . "','" . $_SESSION['name'] . "','" . $_SESSION['login'] . "','$ip_address','$mac','$city','$country')");

    $extra = "dashboard.php";
    echo "<script>window.location.href='" . $extra . "'</script>";
    exit();
  } else {
    $_SESSION['action1'] = "Invalid username or password";
    $extra = "index.php";

    echo "<script>window.location.href='" . $extra . "'</script>";
    exit();
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <title>CRM | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/log-reg.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body class="error-body no-top">
  <div class="container">
    <div class="row login-container column-seperation">
      <div class="col-md-5 col-md-offset-1">
        <h2>Zaloguj się do panelu klienta</h2>

      </div>
      <div class="col-md-5 "> <br>
        <p style="color:#F00"><?php echo $_SESSION['action1']; ?><?php echo $_SESSION['action1'] = ""; ?></p>
        <form id="login-form" class="login-form" action="" method="post">
          <div class="row">
            <div class="form-group col-md-10">
              <label class="form-label">E-mail</label>
              <div class="controls">
                <div class="input-with-icon  right">
                  <i class=""></i>
                  <input type="text" name="email" id="txtusername" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-10">
              <label class="form-label">Hasło</label>
              <span class="help"></span>
              <div class="controls">
                <div class="input-with-icon  right">
                  <i class=""></i>
                  <input type="password" name="password" id="txtpassword" class="form-control">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-10">
              <button class="btn btn-primary btn-cons pull-right" name="login" type="submit">Zaloguj</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</body>

</html>