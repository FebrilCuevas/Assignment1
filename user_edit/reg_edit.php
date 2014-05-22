<? ob_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="../style.css" rel="stylesheet" type="text/css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<title>portafoglio</title>
</head>
<script>
</script>
	<?php include '../function.php'; ?>
<body>
	<?php include '../title_bar.php'; ?>
<div id="body">
<div id="container">





<div style="text-align:center;" id="content">
<h1>update your information</h1>
<br/>
<?php
include("../connect.php");

$uid = $_REQUEST['id'];
$SQLstring = "SELECT * FROM user WHERE id ='$uid'";
$QueryResult = @mysql_query($SQLstring, $DBConnect);
$Row = mysql_fetch_assoc($QueryResult);
if (!$SQLstring){
	die("Error: Data not found..");
}
$uid_edit = $Row['id'];
$uname_edit = $Row['username'];
$firstname_edit = $Row['firstname'];
$lastname_edit = $Row['lastname'];
$email_edit = $Row['email'];
$password_edit = $Row['password'];

if(isset($_POST['save']))
{	
	$firstname_save = $_POST['firstname'];
	$lastname_save = $_POST['lastname'];
	$email_save = $_POST['email'];
	$password_save = $_POST['password'];
	
	mysql_query("UPDATE user SET firstname ='$firstname_save',
		 lastname ='$lastname_save', email='$email_save', password='$password_save 'WHERE id = '$uid'") or die(mysql_error()); 
	echo "Saved!";

header("Location: reg_userdata.php?id=$uid");
		
}
?>

<form id="reg_form" method="post">
<label style="display: inline-block; width: 80px">username: </label>
<b style="display: inline-block; width: 50px; margin-bottom:20px;"><?php echo $uname_edit; ?></b><br />
<label style="display: inline-block; width: 120px">first name </label>
<input style="margin-bottom: 20px;" type="text" name="firstname" value="<?php echo $firstname_edit; ?>" /><br />
<label style="display: inline-block; width: 120px">last name </label>
<input style="margin-bottom: 20px;" type="text" name="lastname" value="<?php echo $lastname_edit; ?>" /><br />
<label style="display: inline-block; width: 120px">email</label>
<input style="margin-bottom: 20px;" type="text" name="email"  value="<?php echo $email_edit; ?>" /><br />
<label style="display: inline-block; width: 120px">password</label>
<input type="password" name="password"  value="<?php echo $password_edit; ?>" /><br />

<input type="submit" name='save' value='save' />
</form>

	</div>
</div>
</div>
</body>
</html>
<? ob_flush(); ?>