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
            <div class="clearfix"></div>
            <div class="content">    
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="grid simple ">
                           <div class="grid-title no-border">
                              <h4>Klienci</h4>
                              <div class="tools">	<a href="javascript:;" class="collapse"></a>
                                 <a href="#grid-config" data-toggle="modal" class="config"></a>
                                 <a href="javascript:;" class="reload"></a>
                                 <a href="javascript:;" class="remove"></a>
                              </div>
                           </div>
                           <div class="grid-body no-border">
                              <table class="table table-hover no-more-tables">
                                 <thead>
                                    <tr>
                                       <th>Nr</th>
                                       <th>Klient</th>
                                       <th>E-mail</th>
                                       <th>Nr. tel</th>
                                       <th>Data rejestracji</th>
                                       <th>Dezaktywacja konta</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $ret=mysqli_query($con,"select * from user");
                                       $cnt=1;
                                       while($row=mysqli_fetch_array($ret))
                                       {
                                       	$_SESSION['ids']=$row['id'];
                                       ?>
                                    <tr>
                                       <td><?php echo $cnt;?></td>
                                       <td><?php echo $row['name'];?></td>
                                       <td><?php echo $row['email'];?></td>
                                       <td><?php echo $row['mobile'];?></td>
                                       <td><?php echo $row['posting_date'];?></td>
                                       <td>
                                          <form name="abc" action="" method="post">
                                             <button type="button" class="btn btn-danger btn-xs btn-mini">Dezaktywuj</button>
                                          </form>
                                       </td>
                                    </tr>
                                    <?php $cnt=$cnt+1; } ?>
                                 </tbody>
                              </table>
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