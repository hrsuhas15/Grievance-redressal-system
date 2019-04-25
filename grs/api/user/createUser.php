<?php
  // Headers
//  echo"suhaas";
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
//  echo "s";
  include_once '../../config/database.php';
//  echo "se";
  include_once '../../models/user.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
//  echo "yap";
  // Instantiate blog cat object
  $usr = new User($db);
  //Get raw posted data
//  echo " hellO";
  //$data = json_decode(file_get_contents("php://input"));
  //if(isset($_POST['create']))
  //{
   $usr->usn=$_POST['usn'];
   $usr->name=$_POST['name'];
   $usr->email=$_POST['email'];
   $usr->mobile=$_POST['mobile'];
   $usr->password=md5($_POST['password']);
  //}
  //echo "su";
  //$cat->categoryId = $data->categoryId;
  //$cat->name = $data->name;
  //$cat->details = $data->details;
  //$post->category_id = $data->category_id;
  // Create post
  if($usr->create())
  { //echo "sus";
    echo json_encode(array('msg' => 1));
  }
  else
  { //echo "suss";
    echo json_encode(array('msg' => 0));
  }
