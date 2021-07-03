

<?php
   session_start();
   error_reporting(0);
   include("dbconnection.php");
   if(isset($_POST['login']))
   {
   $ret=mysqli_query($con,"SELECT * FROM admin WHERE name='".$_POST['email']."' and password='".$_POST['password']."'");
   $num=mysqli_fetch_array($ret);
   if($num>0)
   {
   $extra="home.php";
   $_SESSION['alogin']=$_POST['email'];
   $_SESSION['id']=$num['id'];
   echo "<script>window.location.href='".$extra."'</script>";
   exit();
   }
   else
   {
   $_SESSION['action1']="*Invalid username or password";
   $extra="index.php";
   
   echo "<script>window.location.href='".$extra."'</script>";
   exit();
   }
   }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <meta charset="utf-8" />
      <title>CRM</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta content="" name="description" />
      <meta content="" name="author" />
      <link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>
      <link href="../assets/css/log-reg.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   </head>
   <body class="error-body no-top">
      <div class="container">
         <div class="row login-container column-seperation">
            <div class="col-md-5 col-md-offset-1">
               <h2>Zaloguj do panelu admina</h2>
               <br>
            </div>
            <div class="col-md-5 ">
               <br>
               <form id="login-form" class="login-form" action="" method="post">
                  <p style="color: #F00"><?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
                  <div class="row">
                     <div class="form-group col-md-10">
                        <label class="form-label">Login</label>
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

