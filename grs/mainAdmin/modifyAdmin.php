<?php
//echo "suhas";
session_start();
if(!isset($_SESSION['adminId']))
{
  header("location: ../adminlogin.php");
}
include_once '../config/database.php';
//include_once '../models/category.php';
$database = new Database();
$db = $database->connect();
//$cat = new Category($db);
$admId=$_GET['id'];
//$cat->usn=$_SESSION['usn'];
// //count array
// //$gre->ststus="open";

//echo "suhas";
if (isset($_POST['create']))
{
 // code...
 $adminName=$_POST['adminName'];
 $mobile=$_POST['mobile'];
 //$mobile=md5($_POST['password']);
 $query = "UPDATE ADMIN
           SET adminName = '$adminName', mobile = '$mobile'
           WHERE adminId = '$admId'";
 // Prepare statement
 $stmt = $db->prepare($query);
 // Execute query
 if($stmt->execute())
 {
   $successmsg="Admin Updated!";
 }
 else
 {
   $errormsg="Admin Not Updated";
   // code...
 }
}
$query = "SELECT * FROM ADMIN WHERE adminId = ?";
// Prepare statement
$stmt = $db->prepare($query);
// Bind ID

$stmt->bindParam(1, $admId);
// Execute query
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//echo "suhas";
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
    <title>Main Admin</title>
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
        <div class="card">
          <div class="card-header">
           <h2> </h2>
         </div>
         <div class="card-body">
           <?php if($successmsg)
           {?>
           <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
           <?php }?>

           <?php if($errormsg)
           {?>
           <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
           <?php }?>
           <div class="container">
           <form method="post">
             <div class="form-group">
               <label for="exampleInputEmail1">Admin Name *</label>
               <input type="text" class="form-control" name="adminName" id="text" aria-describedby="text" value="<?php echo $row[adminName]; ?>" placeholder="name"  Required>
               <small id="text" class="form-text text-muted"></small>
             </div>
             <div class="form-group">
                 <label for="exampleFormControlTextarea1">Mobile *</label>
                 <input type="number" class="form-control" name="mobile" value="<?php echo $row[mobile]; ?>" id="exampleFormControlTextarea1" placeholder="mobile" rows="3">
             </div>

             <button type="submit" name="create" class="btn btn-primary">Modify</button>
           </form>
           </body>
           </div>
         </div>
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
