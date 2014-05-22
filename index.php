<?php

ob_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="style.css" rel="stylesheet" type="text/css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<title>Seagull</title>
</head>
<?php include 'connect.php'; ?>
<?php include 'function.php'; ?>

<body>
	<?php include 'title_bar.php'; ?>
<div id="body">
<div id="container">

<div id="content">

<?php
$loginerror = "";

if (isset($_POST['loginform']) && $_POST['loginform'] == 'login') {
    $uname = $_POST["username"];
    $pw = $_POST["password"];
    if ($uname == '' || $pw == '') {
        $loginerror = "<div class='alert-box warning'><span>Oops! </span>you must complete all fields.</div>";
    } else {
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
            header("Location: user_edit/reg_userdata.php?id=$user_id");
            exit();
        }

        $loginerror = "<div class='alert-box error'><span>error: </span>username and password do not match.</div>";
    }
}
?>

<?php
	if(loggedin()) {

	$parent = dirname($_SERVER['REQUEST_URI']);
	ini_set('display_errors', '1');

	$udata = "user";
	$SQLstring = "SELECT * FROM $udata WHERE username ='".$_SESSION['username']."'";
	$QueryResult = @mysql_query($SQLstring, $DBConnect);
	$Row = mysql_fetch_assoc($QueryResult);
	$fname = $Row['firstname'];
	$uname = $Row['username'];
	$uid = $Row['id'];

		echo "<h2 class='namehead'><b>";
		echo $uname;
		echo "</b>'s Space</h2><div class='accountbutgroup'><p class='accountbut'><a id='edit_info' href='user_edit/reg_userdata.php?id=$uid'>profile</a></p>";
		echo "<p class='accountbut'><a id='logout' href='user_login/reg_logout.php'>log out</a></p></div>";
	} else {
?>

<div id="user_login">
<span style='width: auto'><?php echo $loginerror;?></span>
<form align="right" id='user_login_form' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label style="margin-right:2px;">username </label>
<input align="right" type="text" name="username" />

<label>password </label>
<input type="password" name="password" />


<input class="spacing" type="submit" name="login" value="log in" />
<p>OR</p>
<a id="signup" class="spacing" href="user_edit/register.php" title="sign up now">sign up</a>
<input type="hidden" name="loginform" value="login">

</form>
</div>

<div class='clear'></div>

<?php
	}
?>


<!--END OF LOGIN FORM-->

<?php

		$query = mysql_query("SELECT id, title, user_id FROM portfolio");
		while($run = mysql_fetch_array($query)){
			$portfolio_id = $run['id'];
			$portfolio_title = $run['title'];
			$u_id = $run['user_id'];

			$query1 = mysql_query ("SELECT url FROM portfolio_image WHERE portfolio_id=$portfolio_id");
				$run1 = mysql_fetch_array($query1);
				$pic = $run1['url'];

			$query2 = mysql_query ("SELECT username FROM user WHERE id=$u_id");
				$run2 = mysql_fetch_array($query2);
				$username = $run2['username'];

	?>
    <div id="portfolios">
    <a href='view.php?id=<?php echo $portfolio_id; ?>'>
    <div id='view_box'>
    	<img src='uploads/<?php echo $pic ?>' />
        <br/>
        <h3><?php echo $portfolio_title ?></h3>
        <?php echo "<p style='margin:5px;'>by: <b>"; echo $username ?></b></p>
    </div>
    </a>
    </div>

    <?php
	}
	?>
    <div class='clear'></div>
</div>
</div>
</div>

</body>
</html>
<? ob_flush(); ?>