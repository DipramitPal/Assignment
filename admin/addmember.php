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

$prof_id = $_GET['id'];
$temp=mysqli_query($db,"SELECT * FROM users WHERE id='$prof_id'");

	if(mysqli_num_rows($temp)==0)
	header("Location: ../error.php");

if(isset($_POST['btn-signup']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$marks = $_POST['marks'];

if(mysqli_query($db,"INSERT INTO studs(prof_id,firstname,lastname,marks) VALUES('$prof_id','$fname','$lname','$marks')"))
{
	?>
        <script>alert('Successfully Created.. ');</script>
        <?php
        
        header("Location: viewprofile.php?id=$prof_id");
 }
 else
 {

  ?>
        <script>alert('error while Creating...');</script>
        <?php
 }

}

?>
<script type="text/javascript">
	function backform() {

		var id = "<?php echo $prof_id ?>";
		
		window.location.replace("viewprofile.php?id="+id);
	}

</script>
<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="../css/main.css">
	<title></title>
</head>
<body>
<div id="regpanel">
</div>
<div class="regpanel_head">
.: Create a New Profile :.	
</div>
<div id="regform">
	<form method="post">
	<table>
	<tr></tr><tr></tr>
	<tr>
		
		<td>
			FIRST NAME:
		</td>
	<td><input type="text" name="fname" placeholder="First Name" required /></td>
		<td></td>
		</tr>
		<tr>
		<td>
			LAST NAME:
		</td>
	<td><input type="text" name="lname" placeholder="Last Name" required /></td>

	</tr>
	<tr>
<td>MARKS:</td><td><input type="text" name="marks" placeholder="Marks" required /></td>
</tr>
<tr>
<td></td>	
	<td>
		<button type="submit" name="btn-signup" id="signup">Create</button>
	</td><td></td>
	<td>
		<button name="btn-cancel" id="cancel" onclick="backform()">Cancel</button>
	</td>
</tr>

</div>
</table>
</form>
</div>
<div id="logout"><a href="../logout.php">[Logout]</a></div>
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
