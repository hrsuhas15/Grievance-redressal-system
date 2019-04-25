<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  // echo "s";
  include_once '../../config/database.php';
  // echo "se";
  include_once '../../models/category.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog cat object
  $cat = new Category($db);
  //Get raw posted data
  //$data = json_decode(file_get_contents("php://input"));
  //$data = json_decode($_POST['data'],true);
   if(isset($_POST['create']))
   {
    $cat->name=$_POST['name'];
    $cat->details=$_POST['details'];
   }
  //$cat->categoryId = $data->categoryId;
  //echo $data;
  //$cat->name = $data['name'];
  //$cat->details = $data['details'];
  //$post->category_id = $data->category_id;
  // Create post
  if($cat->create())
  {
    echo json_encode(array('message' => 'Category Created'));
  }
  else
  {
    echo json_encode(array('message' => 'Category Not Created'));
  }
