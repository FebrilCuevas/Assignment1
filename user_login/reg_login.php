<?php
ob_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="../style.css" rel="stylesheet" type="text/css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<title>Seagull</title>
</head>
<script>
</script>
	<?php include '../function.php'; ?>
<body>
	<?php include '../title_bar.php'; ?>
<div id="body">
<div id="container">

<div id="content">
<?php
$loginerror = "";

if (isset($_POST['loginform']) && $_POST['loginform'] == 'login') {
    $uname = $_POST["username"];
    $pw = $_POST["password"];
    if ($uname == '' || $pw == '') {
        $loginerror = "<div class='alert-box warning'><span>Oops! </span>you must fill in all fields</div>";
    } else {
    	include("../connect.php");
        $sql = "SELECT * FROM user WHERE username = '$uname' AND password ='$pw'";
        $query = mysql_query($sql);

        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit();
        }

        if (mysql_num_rows($query) > 0) {
            $_SESSION['username'] = $uname;
							$parent = dirname($_SERVER['REQUEST_URI']);
				ini_set('display_errors', '1');
				$udata = "user";
					$SQLstring = "SELECT * FROM $udata WHERE username ='".$_SESSION['username']."'";
						$QueryResult = @mysql_query($SQLstring, $DBConnect);
						$Row = mysql_fetch_assoc($QueryResult);
						$user_id = $Row['id'];
            header("Location: ../user_edit/reg_userdata.php?id=$user_id");
            exit();
        }

        $loginerror = "<div class='alert-box error'><span>error: </span>username and password do not match.</div>";
    }
}
?>

<div id="user_login">

<span style='width: auto'><?php echo $loginerror;?></span>
<form id='user_login_form' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>username </label>
<input type="text" name="username" />
<label>password </label>
<input type="password" name="password" />
<span class="spacing"><input type="submit" name="login" value="log in" />
<input type="hidden" name="loginform" value="login">
<p>OR</p>
<a id="signup" href="http://febrilcuevas.com/seagull/user_edit/register.php" title="sign up now">sign up</a>

</form>
</div>

</div>
</div>
</div>
</body>
</html>
<? ob_flush(); ?>