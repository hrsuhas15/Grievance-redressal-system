<?php
//echo "suhas";
session_start();
if(!isset($_SESSION['usn']))
{
  header("location: ../userlogin.php");
}
 include_once '../config/database.php';
 include_once '../models/user.php';
 $database = new Database();
 $db = $database->connect();
 $usr = new User($db);
 $usr->usn=$_SESSION['usn'];
 // $result=$usr->toUpdateUser();
 // $row = $result->fetch(PDO::FETCH_ASSOC);
  //echo suhas;
  if(isset($_POST['change']))
  {
   //$usr->usn=$_POST['usn'];
   //echo "suhas";
   $p1=md5($_POST['password']);
   $p2=md5($_POST['newpassword']);
   //$p3->mobile=$_POST['confirmpassword'];
   $query = "SELECT * FROM USER WHERE password='$p1' and usn = '$usr->usn'";
   // Prepare statement
   $stmt = $db->prepare($query);
   $stmt->execute();
   $num=$stmt->rowCount();
   if($num>0)
   {
     $query1 = "UPDATE USER set password='$p2' WHERE password='$p1' and usn = '$usr->usn'";
     // Prepare statement
     $stmt1 = $db->prepare($query1);
     $stmt1->execute();
     $successmsg="Password Changed Successfully";
   }
   else
   {
     $errormsg="Old password Doesnot match";
   }
   //$row = $stmt->fetch(PDO::FETCH_ASSOC);
   //echo "suhas";
   // $query=$usr->update();
   // if($query)
   // {
   // $successmsg="Profile Updated Successfully !!";
   // }
   // else
   // {
   // $errormsg="Profile not updated !!";
   // }
   // $result=$usr->toUpdateUser();
   // $row = $result->fetch(PDO::FETCH_ASSOC);
  }

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
    <script type="text/javascript">
  function valid()
  {
  if(document.chngpwd.password.value=="")
  {
  alert("Current Password Filed is Empty !!");
  document.chngpwd.password.focus();
  return false;
  }
  else if(document.chngpwd.newpassword.value=="")
  {
  alert("New Password Filed is Empty !!");
  document.chngpwd.newpassword.focus();
  return false;
  }
  else if(document.chngpwd.confirmpassword.value=="")
  {
  alert("Confirm Password Filed is Empty !!");
  document.chngpwd.confirmpassword.focus();
  return false;
  }
  else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
  {
  alert("Password and Confirm Password Field do not match  !!");
  document.chngpwd.confirmpassword.focus();
  return false;
  }
  return true;
  }
  </script>
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
                   User details
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

              <form method="post" name="chngpwd" onSubmit="return valid();">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Old Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" name="newpassword" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                      </div>
                      <button type="submit" name="change" class="btn btn-primary">Update</button>
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
