<?php
 $db = mysqli_connect("localhost","root","suhashegde","grs");
 $sql = "SELECT * FROM USER";
$result = $db->query($sql);

?>
<?php while($row = $result->fetch_assoc()) { ?>
<h2> <?php  echo "usn: " . $row["usn"]. "name: " . $row["name"]. "<br>";?></h2>
<?php } ?>
