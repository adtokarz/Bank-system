<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$mobile=$_POST['phone'];
	$gender=$_POST['gender'];
	$query=mysqli_query($con,"select email from user where email='$email'");
	$num=mysqli_fetch_array($query);
	if($num>1)
	{
	$_SESSION['msg']="Email-id already register with us";	
	}
	else
	{
 mysqli_query($con,"insert into user(name,email,password,mobile,gender) values('$name','$email','$password','$mobile','$gender')");
	$_SESSION['msg']="Successfully register with us";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Rejestracja w banku</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/log-reg.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	  <script type="text/javascript">
   
function emailcheck1(str) 
    {
	    var at="@"
	    var dot="."
	    var lat=str.indexOf(at)
	    var lstr=str.length
	    var ldot=str.indexOf(dot)
	    if (str.indexOf(at)==-1)
	    {	   
	       return false;
	    }

	    if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr)
	    {	   
	       return false;
	    }

	    if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr)
	    {	    
	        return false;
	    }

        if (str.indexOf(at,(lat+1))!=-1)
        {	    
            return false;
        }

	    if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot)
	    {	    
	        return false;
	    }

	    if (str.indexOf(dot,(lat+2))==-1)
	    {	    
	        return false;
	    }
    	
	    if (str.indexOf(" ")!=-1)
	    {	    
	        return false;
	    }
	     return true;					
    }


	function numbersonly(e)
    {
     var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8){

    if(unicode<48||unicode>57)
    return false
    }
    }
	
</script>

</head>
<body class="error-body no-top">
<div class="container">
  <div class="row login-container column-seperation">  
        <div class="col-md-5 col-md-offset-1">
          <h2>Rejestracja w banku</h2>
          <br>
        </div>
        <div class="col-md-5 "> <br>
        <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
		 <form id="validate"  class="login-form" action="" method="post">
		 <div class="row">
		 <div class="form-group col-md-10">
            <label class="form-label">Nazwa</label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="text" name="name" id="name" class="form-control">                                 
				</div>
                <span class="help-block"><div style="color:#F00;" id="errname"></div></span>
            </div>
          </div>
          </div>
           <div class="row">
		 <div class="form-group col-md-10">
            <label class="form-label">Email</label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="text" name="email" id="email" class="form-control">                                 
				</div>
                <span class="help-block"><div style="color:#F00;" id="vldt"></div></span>
            </div>
          </div>
          </div>
           <div class="row">
		 <div class="form-group col-md-10">
            <label class="form-label">Hasło dostępu</label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="password" name="password" id="password" class="form-control">                                 
				</div>
                <span class="help-block">     <div style="color:#F00;" id="pwd"></div>  	</span>
            </div>
          </div>
          </div>
		  <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Powtórz hasło</label>
            <span class="help"></span>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="password" name="cpassword" id="cpassword" class="form-control">                                 
				</div>
                <span class="help-block">  <div style="color:#F00;" id="cpwd"></div>
         <div style="color:#F00;" id="mpwd"></div></span>
            </div>
          </div>
          </div>
          <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Nr. tel</label>
            <span class="help"></span>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="text" name="phone" id="txtpassword" class="form-control">                                 
				</div>
                
                                            <span class="help-block"> <div style="color:#F00;" id="mb"></div></span>
            </div>
          </div>
          </div>
          <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Płeć</label>
            <span class="help"></span>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="radio" value="m" name="gender" checked > Mężczyzna
                                              <input type="radio" value="f" name="gender" > Kobieta
                                
				</div>
            </div>
          </div>
          </div>
         <div class="row">
            <div class="col-md-10">
              <input onClick="return validation12();"  class="btn btn-primary btn-cons pull-right" name="submit" value="Zarejestruj" type="submit" />
            </div>
          </div>
		  </form>
        </div>
     
    
  </div>
</div>
</body>
</html>