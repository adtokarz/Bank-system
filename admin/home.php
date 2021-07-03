

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
      <title>CRM</title>
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
      <div class="content sm-gutter">
         <div class="page-title">
         </div>
         <div class="row">
            <div class="col-md-3 col-vlg-3 col-sm-6">
               <div class="tiles green m-b-10">
                  <div class="tiles-body">
                  </div>
               </div>
            </div>
         </div >
      </div>
   </body>
</html>

