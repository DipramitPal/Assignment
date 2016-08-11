<?php
session_start();
if(isset($_SESSION['user'])=="")
{
 header("Location: index.php");
}
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}

?>


<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/main.css">
	<title></title>
</head>
<body><center>
<img src="images/ico/oops.png"></center>
<div id="oops">

<br>
Invalid User ID/ Access Denied to Perform The Action!
<br>
<center><a href="home.php">Click Here</a> To Go To HomePage</center>

</div>
</body>
</html>