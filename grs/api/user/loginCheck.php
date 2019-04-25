<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  include_once '../../config/database.php';
  include_once '../../models/user.php';
//include_once '../../models/userLog.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog cat object
  $usr = new User($db);
  //Get raw posted data
   if(isset(login))
   {
     $usr->usn=$_POST['usn'];
     $usr->password=md5($_POST['password']);
   }
   if($usr->login())
  {
    session_start();
     $_SESSION['usn']=$usr->usn;
     // $log=new Userlog($db);
     // //$log->userIP=$_SERVER['REMOTE_ADDR'];
     // $log->usn=$usr->usn;
     // ///$log->insert();
     header("location:../../user/index.php");
  }
  else
  {
     alert("Incorrect details")
  }
