<?php
//echo "suhas";
session_start();
 // if(!isset($_SESSION['mobile']))
 // {
 //  header("location: ../adminlogin.html");
 // }
include_once '../config/database.php';
include_once '../models/grievance.php';
$database = new Database();
$db = $database->connect();
$gre = new Grievance($db);
$gre->grievanceId=$_GET['id'];
$gre->adminId=$_SESSION['adminId'];
$gre->status="check";
$stmt=$gre->grievanceForAdmin();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo $stmt->rowCount();
//echo $gre->grievanceId;//=$_GET['id'];
echo $gre->adminId;//=$_SESSION['usn'];
//echo //"remark";

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
      <div class=""><nav class="navbar navbar-expand-sm bg-dark navbar-dark " style="margin:10px;" inc="include/header.html"></nav></div>
      <div class="row">
          <div class="col-sm-3">
              <div class="container-fluid" inc="include/sidebar.html"></div>
          </div>
          <div class="col-sm-9">
               <div class="container">
                <div class="row">
                  <div class="container">
                      <section class="wrapper site-min-height">
                        <h3><i class="fa fa-angle-right"></i> Grievance Details</h3>
                        <hr />
                        <div class="container">
                        <div class="row mt">
                        <label class="col-sm-2 col-sm-2 control-label"><b>Grievance Number : </b></label>
                      		<div class="col-sm-4">
                      		<p><?php echo $row[grievanceId];?></p>
                      		</div>
                       <label class="col-sm-2 col-sm-2 control-label"><b>Reg. Date :</b></label>
                          <div class="col-sm-4">
                          <p><?php echo $row[regDate];?></p>
                          </div>
                      	</div>
                        </div>
                        <br>
                          <div class="container">
                        <div class="row mt">
                                    <label class="col-sm-2 col-sm-2 control-label"><b>Category :</b></label>
                                      <div class="col-sm-2">
                                      <p><?php echo $row[adminId];?></p>
                                      </div>
                                     <label class="col-sm-8 col-sm-8 control-label"></label>
                        </div>
                      </div>
                      <br>
                      <div class="container">
                        <div class="row mt">
                                    <label class="col-sm-2 col-sm-2 control-label"><b>Subject :</b></label>
                                      <div class="col-sm-8">
                                      <p><?php echo $row[subject];?></p>
                                      </div>
                                      <label class="col-sm-2 col-sm-2 control-label"></label>
                        </div>
                      </div>
                      <br>
                      <div class="container">
                        <div class="row mt">
                                    <label class="col-sm-2 col-sm-2 control-label"><b>Details :</b></label>
                                      <div class="col-sm-10">
                                      <p><?php echo $row[details];?></p>
                                      </div>

                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="card">
                         <div class="card-header">
                          <h5> Give Remarks: </h5>
                         </div>
                         <div class="card-body">
                           <form method="post" action="../api/mainAdmin/giveRemarks.php">
                             <input id="prodId" name="grievanceId" type="hidden" value="<?php echo $row[grievanceId] ?>">
                             <div class="form-group">
                               <textarea class="form-control" name="remarks" id="remarks" placeholder="your text here...(100 words)" rows="3" required></textarea>
                             </div>
                             <button type="submit" name="submit" id="submit" onclick="return confirm('Are you sure?...It cannot be updated Once you give remarks.')"class="btn btn-primary">Submit</button>
                           </form>
                         </div>
                        </div>
                      </div>
                    </div>
                    </section>
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
