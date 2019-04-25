<?php
//echo "suhas";
session_start();
 if(!isset($_SESSION['adminId']))
 {
   header("location: ../adminlogin.php");
 }
include_once '../config/database.php';
include_once '../models/staff.php';
$database = new Database();
$db = $database->connect();
$stf = new Staff($db);
$stf->adminId=$_SESSION['adminId'];
//count array
//$gre->ststus="open";
$result=$stf->readCategoryStaffs();
$num = $result->rowCount();
//echo $stf->adminId;
//echo $_SESSION['categoryId'];
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
              <h2> Staff List</h2>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6"><a href="newStaff.php">
                <button type="button" class="btn btn-primary">Add new Staff</button>
                 </a></div>
                <div class="col-md-6"> <input class="form-control" id="myInput" type="text" placeholder="Search.."></div>
              </div>
               <br>
               <table  class="table table-bordered">
                   <thead>
                     <tr>
                     <th>Staff Id</th>
                     <th>Name</th>
                     <th>Work</th>
                     <th>Mobile</th>
                     <th>Email</th>
                     <th>Manage</th>
                     </tr>
                   </thead>
                     <tbody id="table">
                       <?php $num = $result->rowCount();

                       if($num > 0)
                       {
                         while($row = $result->fetch(PDO::FETCH_ASSOC))
                         {
                         ?>
                         <tr>
                           <td><?php echo $row[staffId]; ?></td>
                           <td><?php echo $row[name]; ?></td>
                           <td><?php echo $row[work]; ?></td>
                           <td><?php echo $row[mobile]; ?></td>
                           <td><?php echo $row[email]; ?></td>
                           <td align="center">
                             <a href="modifyStaff.php?id=<?php echo $row[staffId]; ?>">
                                <img src="include/settings.svg" alt="s">
                              </a>
                              <a href="../api/categoryAdmin/deleteStaff.php?id=<?php echo $row[staffId]; ?>" onclick="confirm('delete?')">
                                  <img src="include/delete.svg" alt="d">
                               </a>
                           </td>
                         </tr>
                       <?php }} ?>
                     </tbody>
                 </table>
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
    <script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>
  </body>
</html>
