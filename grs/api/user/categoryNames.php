<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  // echo "s";
  include_once '../../config/database.php';
  // echo "se";
  include_once '../../models/category.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog post object
  //echo "suh";
  $cat = new Category($db);
  // Blog post query
  //echo "suhas";
  if($posts_arr = $cat->readname())
  {
    echo json_encode($posts_arr);
  }
  else
  {
    echo json_encode(array('name' => 'No Category Found'));
  }
?>
