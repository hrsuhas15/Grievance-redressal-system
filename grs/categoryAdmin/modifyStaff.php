<?php
//echo "suhas";
session_start();
 if(!isset($_SESSION['adminId']))
 {
   header("location: ../adminlogin.php");
 }
include_once '../config/database.php';
include_once '../models/staff.php';
//include_once '../models/admin.php';
$database = new Database();
$db = $database->connect();
$stf = new Staff($db);
//$adm =new Admin($db);
$stf->adminId=$_SESSION['adminId'];
$stf->categoryId=$_SESSION['categoryId'];;
$stf->staffId=$_GET['id'];
echo $stf->staffId;
if(isset($_POST['update']))
{
   //$usr->usn=$_POST['usn'];
   //echo "suhas";
   $stf->name=$_POST['name'];
   $stf->work=$_POST['work'];
   $stf->email=$_POST['email'];
   $stf->mobile=$_POST['mobile'];
   $query=$stf->update();
   if($query)
   {
   $successmsg="Profile Updated Successfully !!";
   }
   else
   {
   $errormsg="Profile not updated !!";
   }

  }
  $result=$stf->readStaffToUpdate();
  $row=$result->fetch(PDO::FETCH_ASSOC);
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
      <div class=""><nav class="navbar navbar-expand-sm bg-dark navbar-dark " style="margin:10px;" inc="include/header.html"></nav></div>
      <div class="row">
          <div class="col-sm-3">
              <div class="container-fluid" inc="include/sidebar.html"></div>
          </div>
          <div class="col-sm-9">
            <section>
            <div class="container">
              <div class="card">
                 <div class="card-header">
                   Staff Details
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

              <form method="post">
                <div class="form-group">
                  <label for="FormInput">Name</label>
                  <input class="form-control" type="text" name="name" value="<?php echo $row[name] ?>" placeholder="Name">
                </div>
                  <div class="form-group">
                    <label for="FormInput">Work</label>
                    <input type="text" class="form-control" name="work" rows="3" value="<?php echo $row[work] ?>" id="FormInput" required>
                  </div>
                  <div class="form-group">
                    <label for="InputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row[email] ?>" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                    <label for="FormInput">Mobile number</label>
                    <input type="number" name="mobile" class="form-control" id="FormInput" value="<?php echo $row[mobile] ?>" required>
                  </div>
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
              </form>
            </div>
            </div>
          </div>
          </section>
          </div>
      </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>includeHTML();</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </body>
  </html>
