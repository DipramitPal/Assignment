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
include("config.php");
$type=$_GET['type'];
$id=$_GET['id'];
if($type == 'p')
	{ if(isset($_SESSION['admin'])=="")
		{
 header("Location: error.php");
}
if(!isset($_SESSION['admin']))
{
 header("Location: error.php");
}
else {
$temp=mysqli_query($db,"DELETE FROM users WHERE id='$id'");
$temp=mysqli_query($db,"DELETE FROM studs WHERE prof_id='$id'");
header("Location: admin/home.php");
}
}
else if($type == 's')
{
	$test=mysqli_query($db,"SELECT * FROM studs WHERE stud_id='$id'");
	$temp=mysqli_fetch_array($test);
	if(mysqli_num_rows($test)==0)
		header("Location: error.php");
if(!isset($_SESSION['admin']) || ($_SESSION['admin'])=="")
{
if($temp['prof_id'] != $_SESSION['id'])
	header("Location: error.php");
}
$test=mysqli_query($db,"DELETE FROM studs WHERE stud_id='$id'");
header("Location: home.php");

}
else {
	header("Location: error.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Test
</body>
</html>