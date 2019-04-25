<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
   //echo "s";
  include_once '../../config/Database.php';
  // echo "se";
  include_once '../../models/Category.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog post object
  $cat = new Category($db);
  // Blog post query
  if($posts_arr = $cat->read())
  {
    echo json_encode($posts_arr);
  }
  else
  {
    echo json_encode(array('message' => 'No Category Found'));
  }
?>
