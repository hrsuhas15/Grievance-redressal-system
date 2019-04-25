<?php
// echo "suhas";
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
 $gre->status="check";
 $result=$gre->readStatusWise();
//
// //     echo"hello";
//    $post_item = array('usn'=>$usn,'grievanceId' => $grievanceId,'subject' => $subject,'details' => $details,'regDate' =>$regDate);
//     Push to "data"
//    array_push($posts_arr, $post_item);
//     array_push($posts_arr['data'], $post_item);
// ?>
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
                 Hello <?php  echo $_SESSION['usn'] ?>,
                </div>
              </div>
              <div class="container">
                <div class="card">
                   <div class="card-header">
                     Checked Grievances (In process)
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6"></div>
                      <div class="col-md-6"> <input class="form-control" id="myInput" type="text" placeholder="Search.."></div>
                    </div>
                     <br>
                    <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Grievance Id</th>
                              <th>Date</th>
                              <th>Subject</th>
                              <th>Details</th>
                            </tr>
                          </thead>
                          <tbody id="table">
                            <?php $num = $result->rowCount();

                            if($num > 0)
                            {
                              // Post array
                              $posts_arr = array();
                              //$posts_arr['data'] = array();
                              while($row = $result->fetch(PDO::FETCH_ASSOC))
                              {
                                ?>
                              <tr>
                                <td><?php echo $row[grievanceId]; ?></td>
                                <td><?php echo $row[regDate]; ?></td>
                                <td><?php echo $row[subject]; ?></td>
                                <td><?php echo $row[details]; ?></td>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
