<script src="../js/jquery-2.2.4.min.js"></script>
<?php
session_start();
if(isset($_SESSION['admin'])=="")
header("Location: ../index.php");

if(!isset($_SESSION['admin']))
{
 header("Location: ../index.php");
}
include("../config.php");

$id = $_GET['id'];

	
$temp=mysqli_query($db,"SELECT * FROM studs WHERE prof_id='$id'");

	
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
<a href="addmember.php?id=<?php echo $id ?>"><img src="../images/ico/add.png" id="addmember"><span style="position:absolute; top:3vmax; left:11vmax;">Add A New Profile </span></a>
</div>
<div id="tablebody">
<?php 

while($profile = mysqli_fetch_array($temp))
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

<a href="editprofile.php?id=<?php echo $profile['stud_id'] ?>"> <img src="../images/ico/edit.png"  class="editprofile"></a><a href="../delete.php?type=s&id=<?php echo $profile['stud_id'] ?>" >	<img src="../images/ico/cancel.png" class="deleteprofile"></a>

</div>
<?php
}
?>
</div>
<div id="logout"><a href="../logout.php">[Logout]</a></div>
</body>
</html>