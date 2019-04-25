<?php
include_once 'config/database.php';
include_once 'models/admin.php';
// Instantiate DB & connect
//echo json_encode(array('msg' => 1));
$database = new Database();
$db = $database->connect();
// Instantiate blog cat object
 $adm = new Admin($db);
// //Get raw posted data
if(isset($_POST['login']))
{
 $adm->mobile=$_POST['mobile'];
 $adm->password=md5($_POST['password']);
// echo json_encode(array('msg' => 1));
 if($adm->login())
 {
	session_start();
	$_SESSION['adminId']=$adm->adminId;
	$_SESSION['categoryId']=$adm->categoryId;
  if($adm->categoryId==0)
	{
	 header("location:mainAdmin/index.php");
  }
	else
	{
		header("location:categoryAdmin/index.php");
   	// code...
	}
	//echo json_encode(array('msg' => $adm->categoryId));
 }
 else
 {
   $errormsg="Incorrect Details";
	 //echo json_encode(array('msg' => -1));
 }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin login</title>

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
				<strong class="navbar-brand"> ADMIN | Grievance Redressal System </strong>
				</div>
		 <ul class="nav navbar-nav navbar-right">
			  <li><a href="index.html">Back to MainPage</a></li>
    </ul>
	</div>
	</nav>
	<hr><br><br>
<div class="login-form">
    <form id="my_form" method="post">
        <h2 class="text-center">Log in</h2>
				<p style="padding-left:4%; padding-top:2%;  color:red">
					<?php if($errormsg){
			 echo htmlentities($errormsg);
						}?></p>
        <div class="form-group">
            <input type="number" id="mobile"  name="mobile" class="form-control" placeholder="mobile" required="required">
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="login" class="btn btn-primary btn-block">Log in</button>
        </div>
    </form>
</div>
<!-- <script type="text/javascript">
$("#my_form").submit(function(event)
{
   //alert("suhas");
   var form_data=
   {
    mobile: $("#mobile").val(),
    password: $("#password").val()
   };
  //alert(JSON.stringify(form_data));
         $.ajax({
         url: "api/loginCheck.php",
         type: "POST",
         data: form_data,
         dataType: "JSON",
         success: function (jsonStr)
         {
					// alert(JSON.stringify(jsonStr));
					 if(jsonStr.msg==-1)
					 {
						 alert("Incorrect details");
					 }
					 else
					 {
						 if(jsonStr.msg==0)
						 {
						 alert("Login Successful,Main ADMIN");
						 window.location.href = 'mainAdmin/index.php';
						 }
						 else
						 {
							 alert("Login Successful,Category ADMIN");
  						 window.location.href = 'categoryAdmin/index.php';
						 }
				    }
          },
         error: function (jsonStr)
         {  // alert(JSON.stringify(jsonStr));
            alert("error: Sorry");
         }
         });
});
</script> -->
</body>
</html>
