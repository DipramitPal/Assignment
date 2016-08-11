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
if(!isset($_SESSION['admin']))
header("Location: ../home.php");
include("../config.php");
$test = mysqli_query($db,"SELECT * FROM users");


?>


<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="../css/main.css">
	<title></title>
</head>
<body>
<div id="headpanel"></div>
<div id="tablehead">
<span style="position:absolute; top:3vmax; left:11vmax;">.: Professors :. </span>
</div>
<div id="tablebody">
<?php 
while($temp = mysqli_fetch_array($test))
{
	?>

	<div id="contact<?php echo $temp['id']; ?>" class="contactblock">
<?php 	
	echo "Name:";
	echo "&nbsp;";
	echo "&nbsp;";
	echo $temp['firstname'];
	echo "&nbsp;";
	echo "&nbsp;";

	echo $temp['lastname'];
	echo "<br>";
	echo "Age:";
	echo "&nbsp;";
	echo $temp['age'];
	echo "&nbsp;";
	echo "&nbsp;";
	echo "&nbsp;";
	echo "&nbsp;";
	echo "Gender:";
	echo "&nbsp;";
	echo $temp['gender'];

?>

<a href="viewprofile.php?id=<?php echo $temp['id'] ?>"> <img src="../images/ico/view.png"  class="editprofile"></a><a href="../delete.php?type=p&id=<?php echo $temp['id'] ?>" >	<img src="../images/ico/cancel.png" class="deleteprofile"></a>

</div>
<?php
}
?>
</div>
<div id="logout"><a href="../logout.php">[Logout]</a></div>
</body>
</html>