

<?php
   session_start();
   //echo $_SESSION['id'];
   //$_SESSION['msg'];
   include("dbconnection.php");
   include("checklogin.php");
   check_login();
   if(isset($_POST['update']))
   {
   $adminremark=$_POST['aremark'];
   $fid=$_POST['frm_id'] ;
   mysqli_query($con,"update ticket set admin_remark='$adminremark' where id='$fid'");
   echo '<script>alert("Ticket has been updated.")</script>';
   }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <meta charset="utf-8" />
      <title>Klienci</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta content="" name="description" />
      <meta content="" name="author" />
      <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
      
   </head>
   <body class="">
      <?php include("header.php");?>
      <div class="page-container row">
         <?php include("leftbar.php");?>
         <div class="clearfix"></div>
      </div>
      </div>
      <div class="page-content">
         <div id="portlet-config" class="modal hide">
            <div class="modal-header">
               <button data-dismiss="modal" class="close" type="button"></button>
            </div>
         </div>
         <div class="clearfix"></div>
         <div class="content">
            <div class="clearfix"></div>
            <br>
            <?php $rt=mysqli_query($con,"select * from ticket order by id desc");
               while($row=mysqli_fetch_array($rt))
               {
               ?> 
            <div class="row">
               <div class="col-md-12">
                  <div class="grid simple no-border">
                     <div class="grid-title no-border descriptive clickable">
                        <h4 class="semi-bold"><?php echo $row['subject'];?></h4>
                        <p ><span class="text-success bold">Przelew #<?php echo $_SESSION['sid']=$row['ticket_id'];?></span> - Wykonany <?php echo $row['posting_date'];?>
                           <span class="label label-important"><?php echo $row['status'];?></span>
                        </p>
                        <div class="actions"> <a class="view" href="javascript:;"><i class="fa fa-search"></i></a>  </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
   </body>
</html>

