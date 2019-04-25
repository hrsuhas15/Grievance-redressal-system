<?php
session_start();
//echo $_SESSION['adminId'];
 if(!isset($_SESSION['adminId']))
 {
   header("location: ../adminlogin.php");
 }
 include_once '../config/database.php';
 //include_once '../models/Admin.php';
 $database = new Database();
 $db = $database->connect();

 //$cat->usn=$_SESSION['usn'];
// //count array
// //$gre->ststus="open";

//echo "suhas";
if(isset($_POST['create']))
{
  // code...
  $adminName=$_POST['adminName'];
  $categoryId=$_POST['categoryId'];
  $mobile=$_POST['mobile'];
  $password=md5($_POST['password']);
  $query="insert into ADMIN(adminName,categoryId,mobile,password) values('$adminName','$categoryId','$mobile','$password')";
  $stmt=$db->prepare($query);
  if($stmt->execute())
  {
    $successmsg="Admin added! Category Assigned";
  }
  else
  {
    $errormsg="Admin Not Created";
  }
}
$query="SELECT * FROM CATEGORY WHERE categoryId not in (SELECT categoryId FROM ADMIN)";
$stmt1=$db->prepare($query);
$stmt1->execute()
//echo "suhas";
?>
<!DOCTYPE html>
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
           <h2> New Admin</h2>
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
               <label for="exampleInputEmail1">Name *</label>
               <input type="text" class="form-control" name="adminName" id="text" aria-describedby="text" placeholder="Name.." Required>
               <small id="text" class="form-text text-muted"></small>
             </div>
             <div class="form-group">
                 <label for="exampleFormControlTextarea1">Mobile *</label>
                 <input type="number" class="form-control" name="mobile" id="exampleFormControlTextarea1" placeholder="details" required>
             </div>
             <div class="form-group">
                <label for="exampleFormControlSelect1">Category</label>
                <select class="form-control" name="categoryId" id="cat">
                <?php
                  while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
                  {
                    ?>
                    <option value="<?php echo $row[categoryId]; ?>"> <?php echo $row[name]; ?></option>
                <?php } ?>
              </select>
            </div>
             <div class="form-group">
                 <label for="exampleFormControlTextarea1">Password *</label>
                 <input type="text" class="form-control" name="password" id="exampleFormControlTextarea1" placeholder="details" required>
             </div>
             <button type="submit" name="create" class="btn btn-primary">Add</button>
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
