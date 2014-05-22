<?php include '../function.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="http://febrilcuevas.com/seagull/style.css" rel="stylesheet" type="text/css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<title>Seagull</title>
</head>
<script>
</script>
<body>
<?php include 'http://febrilcuevas.com/seagull/title_bar.php'; ?>

<div id="body">
<div id="container">

<div id="header">
<a href="http://febrilcuevas.com/seagull/index.php"><h1>sign up for your Seagull account</h1></a>
</div>

<div id="content">
<?php
include("../connect.php");

$uname_add = $_POST['username'];
$fname_add = $_POST['firstname'];
$lname_add = $_POST['lastname'];
$email_add = $_POST['email'];
$password_add = $_POST['password'];
$con_code=md5(uniqid(rand()));

if(empty($uname_add) || empty($fname_add) || empty($lname_add) ||empty($email_add) ||empty($password_add) ){
	echo '<div style="max-width:310px;" class="alert-box warning"><span>Oops! </span>please fill out all fields.</div>';

	echo "<form id='reg_form' name='newReg' action='addUser.php' method='POST'>
    <input type='hidden' name='add' value='addNew' />
    <label style='display: inline-block; '>username </label><br />
    <input class='formboxes' type='text' name='username' /><br />
    <label style='display: inline-block; '>first name </label><br />
    <input class='formboxes' type='text' name='firstname' /><br />
    <label style='display: inline-block; '>last name </label><br />
    <input class='formboxes' type='text' name='lastname' /><br />
    <label style='display: inline-block; '>email</label><br />
    <input class='formboxes' type='text' name='email' /><br />
    <label style='display: inline-block; width: 120px'>password</label><br/>
    <input class='formboxes' type='password' name='password' /><br />

    <input name='submit' type='submit' value='Sign Up'/>
</form>";

}
else{
	$dup = mysql_query("SELECT username FROM user WHERE username='".$uname_add."'");
	if(mysql_num_rows($dup) >0){
		echo '<div style="max-width:240px" class="alert-box error"><span>error: </span>username is taken.</div><br />';
		echo "<a href='http://febrilcuevas.com/seagull/user_edit/register.php'>Start over</a>";

	}
	else{
		$query = "INSERT INTO user VALUES (DEFAULT, '$uname_add', '$fname_add', '$lname_add', '$email_add', '$password_add', NULL)";
		mysql_query($query);
		if($query){
			echo '<div class="alert-box success"><span>Awesome! </span>Your registration has been completed.</div><br />';
			echo "<div class='centersurround'><a class='standardbuttons' href='http://febrilcuevas.com/seagull/user_login/reg_login.php'>Log in</a></div>";
		}
		else{
			echo '<div class="alert-box error"><span>Oops! </span>Registration Error.</div>';
		}
	}
}

?>
	</div>
</div>
</div>

</body>
</html>