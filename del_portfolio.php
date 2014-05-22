<?php include 'function.php'; ?>
<? ob_start(); ?>
<?php
ini_set('display_errors', '1');
			include"connect.php";
			$portfolio_id = $_GET['id'];

			$query = mysql_query("DELETE FROM portfolio_image WHERE portfolio_id='$portfolio_id'");
			while($run = mysql_fetch_array($query));
				$title = $run['title'];
				$url = $run ['url'];

			$query1 = mysql_query ("DELETE FROM portfolio WHERE id='$portfolio_id'");
				$run1 = mysql_fetch_array($query1);
				$username = $run1['username'];

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
	header("Location: http://febrilcuevas.com/seagull/user_edit/reg_userdata.php?id=$uid");
	exit();
	}
?>