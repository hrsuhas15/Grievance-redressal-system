<?php
//echo "suhas";
session_start();
if(!isset($_SESSION['usn']))
{
  header("location: ../userlogin.php");
}
include_once '../config/database.php';
include_once '../models/grievance.php';
$database = new Database();
$db = $database->connect();
$gre = new Grievance($db);
$gre->usn=$_SESSION['usn'];
//count array
//$gre->ststus="open";
$num=$gre->grievanceCount();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="include/headside.js"></script>
    <link rel="stylesheet" href="include/side.css">
  <title>User</title>
</head>
<body>
      <div class=""><nav class="navbar navbar-expand-sm bg-dark navbar-dark " style="margin:10px;" inc="include/header.html"></nav></div>
      <div class="row">
          <div class="col-sm-3">
              <div class="container-fluid" inc="include/sidebar.html"></div>
          </div>
          <div class="col-sm-9">
               <div class="container">
                 <div class="alert alert-dark" role="alert">
                 Hello <?php echo $_SESSION['usn'] ?>,
                </div>
                <div class="row">
                             <div class="col-sm-1"></div>
                           <a href="registeredGrievances.php"><div class="col-sm-3">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title"><img src="img/i1.png" width="180" height="180" alt="..." class="rounded-circle"></h5>
                                <p class="card-text"></p>
                                <a href="registeredGrievances.php" class="btn">Registered Grievances -<span class="badge badge-primary"><?php echo $num[0] ?></span></a>
                              </div>
                            </div>
                          </div></a>
                          <a href="checkedGrievances.php">
                          <div class="col-sm-3">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title"><img src="img/i2.png" alt="..." width="180" height="180" class="rounded-circle"></h5>
                                <a href="checkedGrievances.php" class="btn">Checked Grievances -<span class="badge badge-primary"><?php echo $num[1] ?></span></a>
                              </div>
                            </div>
                          </div></a>
                          <a href="remarkedGrievances.php">
                          <div class="col-sm-3">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title"><img src="img/i3.png" width="180" height="180" alt="..." class="rounded-circle"></h5>
                                <a  href="remarkedGrievances.php" class="btn">Remarked Grievances -<span class="badge badge-primary"><?php echo $num[2] ?></span></a>
                              </div>
                            </div>
                          </div>
                          </a>
                          <div class="col-sm-2"></div>
                        </div>


              </div>
          </div>
      </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>includeHTML();</script>
  </body>
</html>
