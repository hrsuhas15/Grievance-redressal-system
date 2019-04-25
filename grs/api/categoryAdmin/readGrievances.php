<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
   //echo "s";
  include_once '../../config/database.php';
  // echo "se";
  include_once '../../models/category.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog post object
  $gre = new Grievance($db);
  if(isset($_POST['read']))
  {
   $gre->status="open";
   $gre->adminId=1;
  }
  // Blog post query
  if($posts_arr = $gre->read())
  {
    echo json_encode($posts_arr);
  }
  else
  {
    echo json_encode(array('message' => 'No Category Found'));
  }
?>
