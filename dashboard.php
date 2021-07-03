<?php
session_start();
include("checklogin.php");
check_login();
include("dbconnection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <title>Panel klienta </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta content="" name="description" />
  <meta content="" name="author" />

  <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

</head>

<body class="">
  <?php include("header.php"); ?>
  <div class="page-container row-fluid">
    <?php include("leftbar.php"); ?>
    <div class="clearfix"></div>
  </div>
  </div>
  <div class="footer-widget">
    <div class="progress transparent progress-small no-radius no-margin">
      <div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar"></div>
    </div>
    <div class="pull-right">
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
      <div class="page-title">
        <div class="row 2col">
          <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
            <div class="tiles blue added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <?php $ret = mysqli_query($con, "select * from ticket where email_id='" . $_SESSION['login'] . "'");
                $num = mysqli_num_rows($ret);
                ?>
                <div class="heading"> <span class="animate-number" data-value="<?php echo $num; ?>" data-animation-duration="1200">0</span>| <a href="history.php" style="color:#FFF">Historia przelewów</a></div>

                <div class="progress transparent progress-small no-radius">
                  <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="26.8%"></div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">

          </div>
          <div class="col-md-3 col-sm-6 spacing-bottom">
            <div class="tiles red added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>

                <div class="heading"> <span class="fa fa-user"></span>
                  <a href="profile.php" style="color:#FFF">Mój profil</a>
                </div>
                <div class="progress transparent progress-white progress-small no-radius">
                  <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="45%"></div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="tiles purple added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>

                <div class="row-fluid">
                  <div class="heading"> <span class="fa fa-ticket"></span>
                    <a href="nowy-przelew.php" style="color:#FFF">Nowy przelew </a>
                  </div>
                  <div class="progress transparent progress-white progress-small no-radius">
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="12%"></div>
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