<?php 

session_start();
include("config.php");
if(isset($_SESSION['user'])=="")
{
 header("Location: index.php");
}
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
else {
	unset($_SESSION['id']);
	unset($_SESSION['name']);
	unset($_SESSION['user']);
	if(isset($_SESSION['admin']))
		unset($_SESSION['admin']);
	session_destroy();

}
?>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/main.css">
<title>
Logout</title>
</head>
<body>
You Are Successfully Logged Out!
<br> <a href="index.php"> Click Here</a> To Get Back to Login Page!
</body>
</html>
