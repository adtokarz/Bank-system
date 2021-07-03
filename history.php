<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Historia przelewów</title>
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
  
    <div class="clearfix"></div>
    <div class="content">
    
      <div class="page-title">
        <h3>Historia przelewów</h3>
      </div>
      <div class="clearfix"></div>
      <br>
     <?php $rt=mysqli_query($con,"select * from ticket where email_id='".$_SESSION['login']."'");
     $num=mysqli_num_rows($rt);
if($num>0){

													while($row=mysqli_fetch_array($rt))
													{
													?> 
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple no-border">
            <div class="grid-title no-border descriptive clickable">
              <h4 class="semi-bold"><?php echo $row['subject'];?></h4>
              <p ><span class="text-success bold">Przelew nr.<?php echo $row['ticket_id'];?></span> - Zrealizowany <?php echo $row['posting_date'];?>
             
              <div class="actions"> <a class="view" href="javascript:;"></a>  </div>
            </div>
            <div class="grid-body  no-border" style="display:none">
              <div class="post">
               
                <div class="info-wrapper">
                  <div class="info"><?php echo $row['ticket'];?> </div>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
              <br>
              <div class="form-actions">
                <div class="post col-md-12">
                  
                  <div class="info-wrapper">
 
                      <br>
                      <?php echo $row['admin_remark'];?>
                      <hr>
                 
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
               <?php } } else {?>
<h3 align="center" style="color:red;">Nie znaleziono przelewów</h3>
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