<?php
session_start();
if(!isset($_SESSION['usn']))
{
  header("location: ../userlogin.php");
}
include_once '../config/database.php';
include_once '../models/category.php';
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
// Instantiate blog post object
//echo "suh";
$cat = new Category($db);
// Blog post query
$result = $cat->readname();

include_once '../models/grievance.php';
// Instantiate DB & connect
include_once '../models/admin.php';
//echo json_encode(array('message' => 'Grievance Registered'));
// Instantiate blog cat object
$gre = new Grievance($db);
$adm = new Admin($db);
//grievance
if(isset($_POST['create']))
{
$gre->usn=$_SESSION['usn'];
$gre->subject=$_POST['subject'];
$gre->details=$_POST['details'];
$adm->categoryId=$_POST['cat'];
//echo $adm->categoryId;
// //  //echo "Suhas";
$gre->adminId=$adm->getAdminId();
$gre->status="open";
//  }
//  echo json_encode(array('message' => 0));
$query="insert into GRIEVANCE(usn,adminId,subject,details,status) values('$gre->usn','$gre->adminId','$gre->subject','$gre->details','$gre->status')";
$stmt=$gre->conn->prepare($query);
if($stmt->execute())
{
$succesmsg="Grievance Registered!";
}
else
{
$errormsg="Grievance Registration unsuccessful!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="include/headside.js"></script>
    <link rel="stylesheet" href="include/side.css">
<title>User</title>
</head>
<body>
  <div class=""><nav class="navbar navbar-expand-sm bg-dark navbar-dark " style="margin:10px;" inc="include/header.html"></nav></div>
  <div class="row">
      <div class="col-sm-3">
          <div class="container-fluid" inc="include/sidebar.html"></div>
      </div>
      <div class="col-sm-9">
           <div class="container">
             <div class="alert alert-dark" role="alert">
             Hello 1RV16IS055,
            </div>
              <div class="container">
               <div class="card">
                  <div class="card-header">
                    New Grievance
                 </div>
                 <div class="card-body">
                   <div class="container">
                   <form method="post" id="my_form">
                     <div class="form-group">
                       <label for="exampleInputTextarea1">subject</label>
                       <input type="text" class="form-control" name="subject" id="subject" aria-describedby="textHelp" placeholder="subject" required>
                       <small id="textHelp" class="form-text text-muted">Keep it short.</small>
                     </div>
                     <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" name="cat" id="cat">
                        <?php
                          while($row = $result->fetch(PDO::FETCH_ASSOC))
                          {
                            ?>

                            <option value="<?php echo $row[categoryId]; ?>"> <?php echo $row[name]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                     <div class="form-group">
                         <label for="exampleFormControlTextarea1">Details</label>
                         <textarea class="form-control" name="details" id="details" placeholder="your text here...(100 words)" rows="3" required></textarea>
                     </div>
                     <button type="submit" name="create" id="create" class="btn btn-primary">Register</button>
                   </form>
                  <!-- // <p id="result"> For server results </p> -->
                 <!-- <form method="post" action="../api/user/categoryNames.php">
                   <button type="submit" name="create" id="create" class="btn btn-primary">Check</button>
                 </form> -->
                 <p style="padding-left:4%; padding-top:2%;  color:red">
                  <?php if($errormsg){
               echo htmlentities($errormsg);
                    }?></p>
                    <p style="padding-left:4%; padding-top:2%;  color:green">
                      <?php if($succesmsg){
                   echo htmlentities($succesmsg);
                        }?></p>
                   </body>
                   </div>
                 </div>
                </div>
               </div>
             </div>
         </div>
     </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>includeHTML();</script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- <script>
    $.ajax({
      url: '../api/user/categoryNames.php',
      dataType: 'json',
      success: getInfo1
    });
    function getInfo1(json)
    {
      var r = '<select class="form-control" name="cat" id="cat">';
      var l = json.length;
      for (i = 0; i < l; i++) {
          r += '<option value="' + json[i].categoryId + '">' + json[i].name + '</option>';
          }
        r+='</select>';
          document.getElementById('someDiv').innerHTML = r;
      }
    </script>

     <script type="text/javascript">
     $("#my_form").submit(function(event)
     {

        var form_data=
        {
         cat: $("#cat").val(),
         subject: $("#subject").val(),
         details: $("#details").val()
        };

              $.ajax({
              url: "../api/user/newGrievance.php",
              type: "POST",
              data: form_data,
              dataType: "JSON",
              success: function (jsonStr)
              {

                  if(jsonStr.msg==0)
                  {
                    alert("Some technical problem");
                  }
                  else
                  {
                    alert("Registration Successful");
                    window.location.href = 'index.php';
                  }
               },
              error: function (jsonStr)
              {
                 alert("error: Sorry");
              }
              });
    });
    </script> -->
    <script>includeHTML();</script>
  </body>
</html>
