<?php
session_start();
//echo $_SESSION['id'];
//$_SESSION['msg'];
include("dbconnection.php");
include("checklogin.php");
check_login();
if (isset($_POST['send'])) {
    $email = $_SESSION['login'];
    $subject = $_POST['subject'];
    $tt = $_POST['tasktype'];
    $priority = $_POST['priority'];
    $ticket = $_POST['description'];
    $st = "Open";
    $pdate = date('Y-m-d');
    $a = mysqli_query($con, "insert into ticket(ticket_id,email_id,subject,task_type,prioprity,ticket,status,posting_date)  values('$tid','$email','$subject','$tt','$priority','$ticket','$st','$pdate')");
    if ($a) {
        echo "<script>alert('Przelew wysłany');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Nowy przelew</title>
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
                <h3>Nowy przelew</h3>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" name="form1" method="post" action="" onSubmit="return valid();">
                            <div class="panel panel-default">

                                <div class="panel-body">
                                    <p text-align="center" style="color:#FF0000"><?= $_SESSION['msg1']; ?><?= $_SESSION['msg1'] = ""; ?></p>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Odbiorca</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="subject" id="subject" value="" required class="form-control" />
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Typ przelewu</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select name="tasktype" class="form-control select" required>
                                                <option>Wybierz typ przelewu</option>
                                                <option value="ot1">Jednorazowy</option>
                                                <option value="ot2">Cykliczny</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Priorytet</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select name="priority" class="form-control select">
                                                <option value="">Wybierz priorytet</option>
                                                <option value="single">Przelew jednorazowy</option>
                                                <option value="express">Przelew ekspresowy</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Cena (zł)</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">

                                                <input type="text" name="price" id="price" value="" required class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tytuł przelewu</label>
                                        <div class="col-md-6 col-xs-12">
                                            <textarea name="description" required class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer">
                                <button class="btn btn-default">Wyczyść</button>
                                <input type="submit" value="Wyślij" name="send" class="btn btn-primary pull-right">
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