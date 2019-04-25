<?php
include_once 'config/database.php';
//  echo "se";
include_once 'models/user.php';
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
//  echo "yap";
// Instantiate blog cat object
$usr = new User($db);
//Get raw posted data
//  echo " hellO";
//$data = json_decode(file_get_contents("php://input"));
if(isset($_POST['create']))
{
 $usr->usn=$_POST['usn'];
 $usr->name=$_POST['name'];
 $usr->email=$_POST['email'];
 $usr->mobile=$_POST['mobile'];
 $usr->password=md5($_POST['password']);
//echo "su";
//$cat->categoryId = $data->categoryId;
//$cat->name = $data->name;
//$cat->details = $data->details;
//$post->category_id = $data->category_id;
// Create post
if($usr->create())
{ //echo "sus";
 $msg="User Registered! Login now";
//echo json_encode(array('msg' => 1));
}
else
{ //echo "suss";
  $errormsg="User Not Registered";
	//echo json_encode(array('msg' => 0));
}
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Registration</title>
<!--CSS for login form-->
<link href="css/login.css" rel="stylesheet">

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-inverse">
		 <div class="container-fluid">
				<div class="navbar-header">
				<strong class="navbar-brand">USER | Grievance Redressal System </strong>
				</div>
		 <ul class="nav navbar-nav navbar-right">
			  <li>          <a href="userlogin.php">Login Page</a></li>
<li>
          <a href="index.html">Back to MainPage</a></li>
    </ul>
	</div>
	</nav>
	<hr>
<div class="login-form">
    <form id="my_form"  method="post">
        <h2 class="text-center">Register</h2>
				<p style="padding-left:4%; padding-top:2%;  color:red">
					<?php if($errormsg){
			 echo htmlentities($errormsg);
						}?></p>
						<p style="padding-left:4%; padding-top:2%;  color:green">
							<?php if($msg){
					 echo htmlentities($msg);
								}?></p>
        <div class="form-group">
            <input type="text" name="usn" id="usn" class="form-control" placeholder="USN" required="required">
        </div>
        <div class="form-group">
            <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="required">
        </div>
        <div class="form-group">
            <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Mobile Number" required="required">
        </div>
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="create" class="btn btn-primary btn-block">Register</button>
        </div>
    </form>
</div>
<!-- <script type="text/javascript">
$("#my_form").submit(function(event)
{
	 alert("suhas");
	 var form_data=
	 {
		usn: $("#usn").val(),
		name: $("#name").val(),
		mobile: $("#mobile").val(),
		email: $("#email").val(),
		password: $("#password").val()
	 };
  alert(JSON.stringify(form_data));
				 $.ajax({
				 url: "api/user/createUser.php",
				 type: "POST",
				 data: form_data,
				 dataType: "JSON",
				 success: function (jsonStr)
				 {
					  alert(JSON.stringify(jsonStr));
						 if(jsonStr.msg==0)
						 {
							 alert("Registration Successful! login now");
							 window.location.href = 'userlogin.html';
						 }
						 else
						 {
							 alert("Registration Unsuccessful! Enter Again!");
							 window.location.href = 'userRegister.html';
						 }
					},
				 error: function (jsonStr)
				 {
            alert(JSON.stringify(jsonStr));
						alert("error: Sorry");
				 }
				 });
});
</script> -->
</body>
</html>
