<?php
//echo "suhas";
session_start();
//echo $_SESSION['adminId'];
 if(!isset($_SESSION['adminId']))
 {
   header("location: ../adminlogin.php");
 }
 include_once '../config/database.php';
 //include_once '../models/category.php';
 $database = new Database();
 $db = $database->connect();
 //$cat = new Category($db);
 //$cat->usn=$_SESSION['usn'];

  if(isset($_GET['id']))
  { //echo s;

     // Execute query
     $query1 = "SELECT * FROM GRIEVANCE WHERE usn = '$_GET[id]'";
    // Prepare statement
     $stmt1 = $db->prepare($query1);
    // Execute query
     $stmt1->execute();
 if(($num=$stmt1->rowCount())>0)
 {
  $errormsg="User Not Deleted! Some Grievances are pending";
 }
 else
 {
   $query = "DELETE FROM USER WHERE usn = '$_GET[id]'";
// Prepare statement
   $stmt = $db->prepare($query);
   if($stmt->execute())
   {
     $successmsg="User Deleted";
   }
  else
  {
    // code...
    $errormsg="User Not Deleted! Some Grievances are pending";
  }
 }
}
  $query = "SELECT * FROM USER";
  // Prepare statement
  $stmt = $db->prepare($query);
  // Execute query
  $stmt->execute();
  $result=$stmt;
  $num = $result->rowCount();
  //
// //count array
// //$gre->ststus="open";
// $num=$gre->grievanceCount();
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
    <title>Home Page</title>
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
           <h2>User List </h2>
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
           <div class="row">
             <div class="col-md-6"></div>
             <div class="col-md-6"> <input class="form-control" id="myInput" type="text" placeholder="Search.."></div>
           </div>
            <br>
           <table  class="table table-bordered">
               <thead>
                 <tr>
                 <th>USN</th>
                 <th>Name</th>
                 <th>MObile</th>
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
                       <td><?php echo $row[usn]; ?></td>
                       <td><?php echo $row[name]; ?></td>
                       <td><?php echo $row[mobile]; ?></td>
                       <td><?php echo $row[email]; ?></td>
                        <td align="center">
                          <a  onclick="return confirm('delete User?')" href="userList.php?id=<?php echo $row[usn]; ?>">
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
