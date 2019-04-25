<?php
//echo "suhas";
session_start();
//echo $_SESSION['adminId'];
 if(!isset($_SESSION['adminId']))
 {
   header("location: ../adminlogin.php");
 }
 include_once '../config/database.php';
// include_once '../models/grievance.php';
 $database = new Database();
 $db = $database->connect();
// $gre = new Grievance($db);
// $gre->usn=$_SESSION['usn'];
// //count array
// //$gre->ststus="open";
// $num=$gre->grievanceCount();
$query = "SELECT * FROM CATEGORY WHERE categoryId = ?";
// Prepare statement
$stmt = $db->prepare($query);
// Bind ID
$stmt->bindParam(1, $_SESSION['categoryId']);
// Execute query
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
// Set properties
//'categoryId' => $row['categoryId'],
$name = $row['name'];
$details = $row['details'];
$creationDate = $row['creationDate'];
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
    <title>Category Admin</title>
  </head>
  <body>
    <div>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark " style="margin:10px;" inc="include/header.html"></nav>
    </div>
    <div class="row">
       <div class="col-sm-3">
          <div class="container-fluid" inc="include/sidebar.html"></div>
       </div>
    <div class="col-sm-9">
      <div class="container">
        <div class="alert alert-dark" role="alert">
       <h2><?php  echo $name; ?></h2><hr>
       <div class="container">
         <div class="row mt">
                     <label class="col-sm-2 col-sm-2 control-label"><b>Details :</b></label>
                       <div class="col-sm-8">
                       <p><?php echo $details;?></p>
                       </div>
                       <label class="col-sm-2 col-sm-2 control-label"></label>
         </div>
       </div>
       <div class="container">
         <div class="row mt">
                     <label class="col-sm-2 col-sm-2 control-label"><b>Creation Date :</b></label>
                       <div class="col-sm-8">
                       <p><?php echo $creationDate;?></p>
                       </div>
                       <label class="col-sm-2 col-sm-2 control-label"></label>
         </div>
       </div>
     </div></div>
    </div>
  </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>includeHTML();</script>
  </body>
</html>
