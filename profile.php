

<?php
   session_start();
   include("dbconnection.php");
   include("checklogin.php");
   check_login();
   if(isset($_POST['update']))
   {
   	$name=$_POST['name'];
   	$aemail=$_POST['alt_email'];
   	$mobile=$_POST['phone'];
   	$gender=$_POST['gender'];
   	$address=$_POST['address'];
   	$a=mysqli_query($con,"update user set name='$name',mobile='$mobile',gender='$gender',alt_email='$aemail',address='$address' where email='".$_SESSION['login']."'");
   if($a)
   {
   echo "<script>alert('Twój profil został zaaktualizowany');</script>";
   }
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <meta charset="utf-8" />
      <title>Moje konto</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta content="" name="description" />
      <meta content="" name="author" />
      <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
   </head>
   <body class="">
      <?php include("header.php");?>
      <div class="page-container row-fluid">
         <?php include("leftbar.php");?>
         <div class="clearfix"></div>
      </div>
      </div>
      <div class="footer-widget">
         <div class="progress transparent progress-small no-radius no-margin">
            <div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>
         </div>
         <div class="pull-right">
         </div>
      </div>
      <div class="page-content">
         <div id="portlet-config" class="modal hide">
         </div>
         <div class="clearfix"></div>
         <div class="content">
            <div class="page-title">
               <h3><?php echo $_SESSION['name'];?> Dane konta</h3>
               <?php
                  $query=mysqli_query($con,"select * from user where email='".$_SESSION['login']."'");
                  while($row=mysqli_fetch_array($query))
                  {
                  ?>
               <div class="row">
                  <div class="col-md-12">
                     <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="panel panel-default">
                           <div class="panel-body">
                              <div class="form-group">
                                 <label class="col-md-3 col-xs-12 control-label">Właściciel</label>
                                 <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                       <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                       <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control"/>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-md-3 col-xs-12 control-label">Adres e-mail </label>
                                 <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                       <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                       <input type="text" name="email" value="<?php echo $row['email'];?>" disabled="disabled" class="form-control"/>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-md-3 col-xs-12 control-label">Nr. telefonu</label>
                                 <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                       <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                       <input type="text"  name="phone" value="<?php echo $row['mobile'];?>"  maxlength="10" class="form-control"/>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-md-3 col-xs-12 control-label">Płeć</label>
                                 <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                       <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                       <select class="form-control select" name="gender">
                                          <option value="<?php echo $row['gender'];?>"><?php $a=$row['gender'];
                                             if($a=='m')
                                             {
                                             echo "Mężczyzna";
                                             }
                                               if($a=='f')
                                             {
                                             echo "Kobieta";
                                             }
                                             
                                             
                                             ?></option>
                                          <option value="m">Mężczyzna</option>
                                          <option value="f">Kobieta</option>
                                       </select>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-md-3 col-xs-12 control-label">Adres</label>
                                 <div class="col-md-6 col-xs-12">                                            
                                    <textarea class="form-control" name="address" rows="5"><?php echo $row['address'];?></textarea>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                           <div class="panel-footer">
                              <button class="btn btn-default">Wyczyść</button>                                    
                              <input type="submit" value="Zaktualizuj" name="update" class="btn btn-primary pull-right">
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
   </body>
</html>

