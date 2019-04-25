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
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog cat object
  $gre = new Grievance($db);
  //Get raw posted data
  //$data = json_decode(file_get_contents("php://input"));
  //if(isset($_POST['readsingle']))
  //echo " object";
  //{
   $gre->usn="1RV16IS055";
  //}
   //echo " object1";
  // Get post
  if($post_arr = $gre->read_usn())
  {
   echo json_encode($post_arr);
  }
  else
  {
   echo json_encode(array('message' => 'No Grievance Found'));
  }
  ?>
