<?php
  // Headers
//  echo"suhaas";
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 //echo "s";
  include_once '../../config/database.php';
//  echo "se";
  include_once '../../models/grievance.php';
  // Instantiate DB & connect
  //include_once '../../models/remarks.php';
  $database = new Database();
  $db = $database->connect();
  echo "yap";
  // Instantiate blog cat object

  $gre = new Grievance($db);
  //$rem = new Remarks($db);

  if(isset($_POST['submit']))
  {
  // $gre->text=$_POST['remarks'];
   $gre->grievanceId =$_POST['grievanceId'];
  }
  session_start();
  //$gre->adminId=$_SESSION['adminId'];
  //echo $gre->grievanceId;
  //$gre->status="open";
  if($gre->updateOpenToRemark())
  { //echo "sus";
    header("location:../../categoryAdmin/openGrievance.php");
  }
  else
  {
    echo "suss";
  }
