<script src="../js/jquery-2.2.4.min.js"></script>
<?php
   include("../config.php");
   session_start();
   
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-login_x']))
{
 $uname = $_POST['uname'];
 $upass = $_POST['pass'];

if(strcmp($uname, "admin")==0 && strcmp($upass, "password")==0)
 {
  $_SESSION['user'] = "admin";
  $_SESSION['admin']='Y';

  header("Location: home.php");
 }
 else
 {
   ?>

<script>$(document).ready(function(){ document.getElementById("loge").innerHTML="Invalid Access!" }); </script>
<?php 
session_destroy();
}
} ?>


<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="../css/main.css">
	<title></title>
</head>
<body>
<div id="loginpanel">
</div>
<form method="POST">
<div id="loginform">

<input type="text" name="uname" placeholder="Your Username" class=login_user required /> 
<input type="password" name="pass" placeholder="Your Password"  class=login_pass required />

<input type="image" name="btn-login" src="../images/ico/ga.png" border=0 id="sgn-in"  />

</div>
</form>
<span id="loge" style="position:absolute; top:10vmax; left:25vmax; color:white; font-size:3vmax;"></span>
</body>
</html>