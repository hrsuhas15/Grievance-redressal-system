<?php
session_start();
//echo $_SESSION['adminId'];
session_destroy();
//echo $_SESSION['adminId'];
header("Location: ../index.html");
?>
