<script src="js/jquery-2.2.4.min.js"></script>
<script>
var error_remain = false;
function passvalidate() {

	var pass1= $("#pass1").val();
	var pass2 = $("#pass2").val();
	if(pass1 != pass2)
		$(document).ready(function(){ document.getElementById("passworderror").innerHTML="*!*Passwords Not Matching"; error_remain = true;  })
		
	else
	 $(document).ready(function(){ document.getElementById("passworderror").innerHTML=""; error_remain = false; })
}
	
function formsubmit() {
		if(error_remain)
			event.preventDefault();

	}

</script>
<?php
session_start();
   include("config.php");
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-signup']))
{
   $uname = $_POST['uname'];
   $email = $_POST['email'];
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $pass = md5($_POST['pass']);
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $error=0;
  	$temp = mysqli_query($db,"SELECT * FROM users WHERE username='$uname'");
	$test =mysqli_fetch_array($temp);
   if($test['username']!= NULL) {
   	$error++;
    ?>
  	<script>$(document).ready(function(){ document.getElementById("usernameerror").innerHTML="*!*Username Taken Already"; })</script>
  <?php
}
  $temp = mysqli_query($db,"SELECT * FROM users WHERE email='$email'");
  $test = mysqli_fetch_array($temp);
  if ($test['username'] != NULL) 
  	{
  		$error++;
  	 ?>
  	<script>$(document).ready(function(){ document.getElementById("emailerror").innerHTML="*!*Email Already Registered"; })</script>
  <?php
}
  if($error == 0) {
if(mysqli_query($db,"INSERT INTO users(username,email,password,firstname,lastname,age,gender) VALUES('$uname','$email','$pass','$fname','$lname','$age','$gender')"))
 {
  ?>
        <script>alert('successfully registered.. Redirecting You To Login Page ');</script>
        <?php
        sleep(5);
        header("Location: index.php");
 }
 else
 {
  ?>
        <script>alert('error while registering you...');</script>
        <?php
 }
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
.: Create a New Account :.	
</div>
<div id="regform">
	<form method="post" onsubmit="formsubmit()">
	<table>
	<tr></tr><tr></tr>
	<tr>
		
		<td>
			FIRST NAME:
		</td>
	<td><input type="text" name="fname" placeholder="First Name" required /></td>
		<td></td>
		<td>
			LAST NAME:
		</td>
	<td><input type="text" name="lname" placeholder="Last Name" required /></td>

	</tr>
	<tr>
<td>USERNAME:</td><td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td>EMAIL:</td>
<td><input type="email" name="email"  placeholder="Your Email" required /> </td>
</tr>
<tr>
<td>PASSWORD:</td>
<td><input type="password" name="pass" id="pass1"  placeholder="Your Password"  required /></td>
</tr>

<tr>
<td>RE-TYPE PASSWORD:</td>
<td><input type="password"  id="pass2" placeholder="Your Password" onblur="passvalidate()" required /></td>
</tr>
<tr>
<td>
GENDER:
</td>	
<td><input type="radio" name="gender" value="M" checked>Male &nbsp; <input type="radio" name="gender" value="F">Female &nbsp; <br><input type="radio" name="gender" value="O">Other</td></tr>
<tr>
<td>AGE:</td><td><input type="integer" name="age" placeholder="Your Age"  required /></td>
</tr>
<tr>
<td></td><td></td>
	<td>
		<button type="submit" name="btn-signup" id="signup">Create</button>
	</td>
</tr>

</div>
<span id="passworderror" style="color:blue; font-weight:bold; position:absolute; top:17.5vmax; left:21vmax; font-size:1vmax;"></span>
<span id="usernameerror" style="color:blue; font-weight:bold; position:absolute; top:5.5vmax; left:21vmax; font-size:1vmax;"></span>
<span id="emailerror" style="color:blue; font-weight:bold; position:absolute; top:9.5vmax; left:21vmax; font-size:1vmax;"></span>
</body>
</html>
<script>
$(document).ready(function(){

$("#signup").mouseenter(function(){

$(this).css('border-color','yellow');
})
$("#signup").mouseleave(function(){

$(this).css('border-color','white');
})

})
</script>