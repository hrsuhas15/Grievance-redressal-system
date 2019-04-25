<?php
//echo "suhas";
session_start();
 if(!isset($_SESSION['adminId']))
 {
   header("location: ../adminlogin.php");
 }
// include_once '../config/database.php';
// include_once '../models/staff.php';
// $database = new Database();
// $db = $database->connect();
// $stf = new Staff($db);
// $stf->adminId=$_SESSION['adminId'];
// //count array
// //$gre->ststus="open";
// $result=$stf->readCategoryStaffs();
// $num = $result->rowCount();
// echo $num;
// // Check if any posts
// if($num > 0)
// {
//
//   while($row = $result->fetch(PDO::FETCH_ASSOC))
//   {
//     extract($row);
//     //echo"hello";
//     $post_item = array('staffId' => $staffId,'name' => $name,'work' =>$work,'mobile' =>$mobile,'email' =>$email);
//     // Push to "data"
//     array_push($posts_arr, $post_item);
//     // array_push($posts_arr['data'], $post_item);
//   }
//  }
//  return $posts_arr;

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
 <div class="card">
    <div class="card-header">
      New Staff
   </div>
   <div class="card-body">
     <div class="container">
     <form method="post" action="../api/categoryAdmin/newStaff.php">
       <div class="form-group">
         <label for="exampleInputEmail1">Name *</label>
         <input type="text" class="form-control" name="name" id="text" aria-describedby="text" placeholder="Name.." Required>
         <small id="text" class="form-text text-muted"></small>
       </div>
       <div class="form-group">
           <label for="exampleFormControlTextarea1">Work Details *</label>
           <textarea class="form-control" name="work" id="exampleFormControlTextarea1" placeholder="details" rows="3"></textarea>
       </div>
       <div class="form-row">
       <div class="form-group col-md-4">
         <label for="mobbile">Mobile number *</label>
         <input type="number" class="form-control" name="mobile" placeholder="Mobile number" id="mobile" Required>
       </div>
       <div class="form-group col-md-8">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
      </div>
       <button type="submit" name="create" class="btn btn-primary">Register</button>
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
