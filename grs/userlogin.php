<?php
//echo 3;
include_once 'config/database.php';
include_once 'models/user.php';
// //include_once '../../models/userLog.php';
// // Instantiate DB & connect
$database = new Database();
$db = $database->connect();
// // Instantiate blog cat object
$usr = new User($db);
//echo "suhas";
// //Get raw posted data
 if(isset($_POST['login']))
  {
	 $usr->usn=$_POST['usn'];
	 $usr->password=md5($_POST['password']);
   if($usr->login())
   {
	    session_start();
	    $_SESSION['usn']=$usr->usn;
	    // $log=new Userlog($db);
    	 // //$log->userIP=$_SERVER['REMOTE_ADDR'];
    	 // $log->usn=$usr->usn;
    	 // ///$log->insert();
    	 header("location:user/index.php");
    }
    else
    {
	   $errormsg = "Incorrect details";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User login</title>
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
				<strong class="navbar-brand"> USER | Grievance Redressal System </strong>
				</div>
		 <ul class="nav navbar-nav navbar-right">
			  <li><a href="index.html">Back to MainPage</a></li>
    </ul>
	</div>
	</nav>
	<hr><br><br>
<div class="login-form">
    <form  method="post" id="my_form" >
        <h2 class="text-center">Log in</h2>
        <p style="padding-left:4%; padding-top:2%;  color:red">
          <?php if($errormsg){
       echo htmlentities($errormsg);
            }?></p>
        <div class="form-group" action="api/user/loginCheck.php">
            <input type="text" name="usn" id="usn" pattern="1["RV""rv"][0-9][0-9][A-Za-z][A-Za-z][0-9][0-9][0-9]" class="form-control" placeholder="USN" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="login" id="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
				<div class="someDiv"></div>
        </form>
    <p class="text-center"><a href="userRegister.html">Create an Account</a></p>
</div>

     <!-- <script type="text/javascript">
     $("#my_form").submit(function(event)
     {
    //    alert("suhas");
        var form_data=
        {
         usn: $("#usn").val(),
         password: $("#password").val()
        };
        alert(JSON.stringify(form_data));
              $.ajax({
              url: "api/user/loginCheck.php",
              type: "POST",
              data: form_data,
              dataType: "JSON",
              success: function (jsonStr)
              {
                  alert(JSON.stringify(jsonStr));
                  if(jsonStr.msg==1)
                  {
										alert("Login Successful");
                    window.location.href = 'user/index.php';
                  }
                  else
                  {
                    alert("Incorrect details");
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
