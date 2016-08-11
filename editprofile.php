<script src="js/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
	function back() {
		window.location='home.php';
		return false;
	}

</script>

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
$id = $_GET['id'];
$test=mysqli_query($db,"SELECT * FROM studs WHERE stud_id= '$id'");
$temp=mysqli_fetch_array($test);
if(!isset($_SESSION['admin']) || ($_SESSION['admin'])=="")
{
if($temp['prof_id'] != $_SESSION['id'])
	header("Location: error.php");
}
if($id=="")
	header("Location: error.php");
$prof_id = $_SESSION['id'];
$prof_name = $_SESSION['name'];

if(isset($_POST['btn-signup']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$marks = $_POST['marks'];

if(mysqli_query($db,"UPDATE studs SET firstname='$fname',lastname='$lname',marks='$marks' WHERE stud_id='$id'"))
{
	?>
        <script>alert('Successfully Edited.. ');</script>
        <?php
        
        header("Location: home.php");
 }
 else
 {
  ?>
        <script>alert('error while Editing...');</script>
        <?php
 }

}

?>




<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/main.css">
	<title></title>
</head>
<body>
<div id="regpanel">
</div>
<div class="regpanel_head">
.: Edit Profile :. 	
</div>

<div id="regform">
	<form method="post">
	<table>
	<tr></tr><tr></tr>
	<tr>
		
		<td>
			FIRST NAME:
		</td>
	<td><input type="text" name="fname" placeholder="First Name" value="<?php echo $temp['firstname'] ?>" required /></td>
		<td></td>
		</tr>
		<tr>
		<td>
			LAST NAME:
		</td>
	<td><input type="text" name="lname" placeholder="Last Name" value="<?php echo $temp['lastname'] ?>" required /></td>

	</tr>
	<tr>
<td>MARKS:</td><td><input type="text" name="marks" placeholder="Marks" value="<?php echo $temp['marks'] ?>"  required /></td>
</tr>
<tr>
<td></td>	
	<td>
		<button type="submit" name="btn-signup" id="signup">Save</button>
	</td><td></td>
	<td>
		<button name="btn-cancel" id="cancel" onclick="return back()">Cancel</button>
	</td>
</tr>

</div>
</table>
</form>
</div>
<div id="edit_profile">.: Editing Profile of: <?php echo $temp['firstname']; ?> &nbsp; Under Professor: <?php echo $prof_name; ?> :.</div>
<div id="logout"><a href="logout.php">[Logout]</a></div>
</body>
</html>
<script>
$(document).ready(function(){

$("#signup").mouseenter(function(){
	$(this).animate({width:"8vmax"});
	$(this).css({"border-color":"yellow"});
})
$("#signup").mouseleave(function(){
	$(this).animate({width:"5vmax"})
	$(this).css({"border-color":"white"});
})


})
</script>