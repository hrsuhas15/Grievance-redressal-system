<?php
session_start();
if(!isset($_SESSION['usn']))
{
  header("location: ../userlogin.php");
}
include_once '../config/database.php';
//include_once '../models/category.php';
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//feedback
if(isset($_POST['create']))
{
$usn=$_SESSION['usn'];
//gre->subject=$_POST['subject'];
$details=$_POST['details'];
//$adm->categoryId=$_POST['cat'];
//echo $adm->categoryId;
// //  //echo "Suhas";
//$gre->adminId=$adm->getAdminId();
//$gre->status="open";
//  }
//  echo json_encode(array('message' => 0));
$query="INSERT INTO FEEDBACK(usn,details) VALUES('$usn','$details')";
$stmt=$db->prepare($query);
if($stmt->execute())
{
$msg="Feedback Registered!";
}
}
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
Hello <?php echo $_SESSION['usn']; ?>,
            </div>
              <div class="container">
               <div class="card">
                  <div class="card-header">
                    Feedback
                 </div>
                 <div class="card-body">
                   <div class="container">
                   <form method="post" id="my_form">
                    </div>
                     <div class="form-group">
                         <label for="exampleFormControlTextarea1">This will help us to improve our website</label>
                         <textarea class="form-control" name="details" id="details" placeholder="your text here...(100 words)" rows="3" required></textarea>
                     </div>
                     <button type="submit" name="create" id="create" class="btn btn-primary">Enter</button>
                   </form>
                 <p style="padding-left:4%; padding-top:2%;  color:green">
                  <?php if($msg){
               echo htmlentities($msg);
                    }?></p>
                   </div>
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
