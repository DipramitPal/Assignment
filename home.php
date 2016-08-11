<script src="js/jquery-2.2.4.min.js"></script>
<?php
session_start();
if(isset($_SESSION['admin'])!="")
header("Location: admin/home.php");

if(isset($_SESSION['user'])=="")
{
 header("Location: index.php");
}
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
include("config.php");
$uname = $_SESSION['user'];
$temp=mysqli_query($db,"SELECT * FROM users WHERE username='$uname'");
 $test=mysqli_fetch_array($temp);
$_SESSION['id']= $test['id'];
$_SESSION['name']=$test['firstname'];
$prof_id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/main.css">
	<title></title>
</head>
<body>
<div id="headpanel"></div>
<div id="tablehead">
<a href="addmember.php"><img src="images/ico/add.png" id="addmember"><span style="position:absolute; top:3vmax; left:11vmax;">Add A New Profile </span></a>
</div>
<div id="tablebody">
<?php 
$profile_test = mysqli_query($db,"SELECT * FROM studs WHERE prof_id= '$prof_id'");
while($profile = mysqli_fetch_array($profile_test))
{
	?>

	<div id="contact<?php echo $profile['stud_id']; ?>" class="contactblock">
<?php 	
	echo "Name:";
	echo "&nbsp;";
	echo "&nbsp;";
	echo $profile['firstname'];
	echo "&nbsp;";
	echo "&nbsp;";

	echo $profile['lastname'];
	echo "<br>";
	echo "Marks:";
	echo "&nbsp;";
	echo $profile['marks'];
?>

<a href="editprofile.php?id=<?php echo $profile['stud_id'] ?>"> <img src="images/ico/edit.png"  class="editprofile"></a><a href="delete.php?type=s&id=<?php echo $profile['stud_id'] ?>" >	<img src="images/ico/cancel.png" class="deleteprofile"></a>

</div>
<?php
}
?>
</div>
<div id="logout"><a href="logout.php">[Logout]</a></div>
</body>
</html>
