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
  include_once '../../models/staff.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  //echo "yap";
  // Instantiate blog cat object
  $stf = new Staff($db);
  //Get raw posted data
  //echo " hellO";
  //$data = json_decode(file_get_contents("php://input"));
  if(isset($_POST['update']))
  {
   $stf->staffId=$_POST['staffId'];
   $stf->name=$_POST['name'];
   $stf->work=$_POST['work'];
   $stf->email=$_POST['email'];
   $stf->mobile=$_POST['mobile'];
   //$usr->password=md5($_POST['password']);
  }
  //echo "su";
  $stf->categoryId = 1;
  //$cat->name = $data->name;
  //$cat->details = $data->details;
  //$post->category_id = $data->category_id;
  // Create post
  if($stf->update())
  { //echo "sus";
    echo json_encode(array('message' => 'Staff details updated'));
  }
  else
  { //echo "suss";
    echo json_encode(array('message' => 'Staff details not updated'));
  }
