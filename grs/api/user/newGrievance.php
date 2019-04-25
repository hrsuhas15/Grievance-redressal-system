<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
   //echo "s";
  include_once '../../config/database.php';
   //echo "se";
  include_once '../../models/grievance.php';
  // Instantiate DB & connect
  include_once '../../models/admin.php';
  //echo json_encode(array('message' => 'Grievance Registered'));

  $database = new Database();
  $db = $database->connect();
  // Instantiate blog cat object
  $gre = new Grievance($db);
  $adm = new Admin($db);
     session_start();
     $gre->usn=$_SESSION['usn'];
     $gre->subject=$_POST['subject'];
     $gre->details=$_POST['details'];
     $adm->categoryId=$_POST['cat'];
     //echo $adm->categoryId;
  // //  //echo "Suhas";
     $gre->adminId=$adm->getAdminId();
     $gre->status="open";
  //  }
  //  echo json_encode(array('message' => 0));
  $query="insert into GRIEVANCE(usn,adminId,subject,details,status) values('$gre->usn','$gre->adminId','$gre->subject','$gre->details','$gre->status')";
  $stmt=$gre->conn->prepare($query);
  if($stmt->execute())
  {
  echo json_encode(array('msg' => 1));
  }
  else
  {
    // code...
    echo json_encode(array('msg' => 0));
  }
