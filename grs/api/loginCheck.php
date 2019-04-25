<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  include_once '../config/database.php';
  include_once '../models/admin.php';
  // Instantiate DB & connect
  //echo json_encode(array('msg' => 1));
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog cat object
   $adm = new Admin($db);
  // //Get raw posted data
   $adm->mobile=$_POST['mobile'];
   $adm->password=md5($_POST['password']);
  // echo json_encode(array('msg' => 1));
   if($adm->login())
   {
    session_start();
    $_SESSION['adminId']=$adm->adminId;
    $_SESSION['categoryId']=$adm->categoryId;
    echo json_encode(array('msg' => $adm->categoryId));
   }
   else
   {
     echo json_encode(array('msg' => -1));
   }
?>
