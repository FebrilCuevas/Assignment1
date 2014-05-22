<?php include '../function.php'; ?>
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

<body>
	<?php include '../title_bar.php'; ?>
<div id="body">
<div id="container">
<div id="header">
<h1>Your Profile</h1>
</div>

<div id="content">

<?php
	include("../connect.php");
	$parent = dirname($_SERVER['REQUEST_URI']);
	ini_set('display_errors', '1');

	$udata = "user";
	$SQLstring = "SELECT * FROM $udata WHERE username ='".$_SESSION['username']."'";
	$QueryResult = @mysql_query($SQLstring, $DBConnect);
	$Row = mysql_fetch_assoc($QueryResult);
	$fname = $Row['firstname'];
	$uname = $Row['username'];
	$uid = $Row['id'];
?>

<p>Hello, <b><?php echo $fname ?></b>
<a id="logout" href="../user_login/reg_logout.php">log out</a></p>

<?php
echo "<br/><a class='delete' id='terminate_acc' href='http://febrilcuevas.com/seagull/user_edit/reg_delete.php?id=$uid'>Delete Account</a>";
echo "<p><a class='updateinfo' id='edit_info_but' href='http://febrilcuevas.com/seagull/user_edit/reg_edit.php?id=$uid'>Update Info</a></p>";


?>
<div class='clear'></div>

<!--VIEW USER'S PORTFOLIOS-->
<h1>Your Stories</h1>
		<?php
			$user_id = $_GET['id'];
			$query = mysql_query("SELECT id, title FROM portfolio WHERE user_id='$user_id'");
			while($run = mysql_fetch_array($query)){
				$portfolio_id = $run['id'];
				$portfolio_title = $run['title'];
			$query1 = mysql_query ("SELECT url FROM portfolio_image WHERE portfolio_id=$portfolio_id");
				$run1 = mysql_fetch_array($query1);
				$pic = $run1['url'];
			$query2 = mysql_query ("SELECT username FROM user WHERE id=$user_id");
				$run2 = mysql_fetch_array($query2);
				$username = $run2['username'];
		?>
    <a href='http://febrilcuevas.com/seagull/view.php?id=<?php echo $portfolio_id; ?>'>
    <div id='view_box'>
    	<img src='../uploads/<?php echo $pic ?>' />
        <br/>
        <h3><?php echo $portfolio_title ?></h3>
        <?php echo "<p style='margin:5px;'>by: <b>"; echo $username ?></b></p>
        <a href="http://febrilcuevas.com/seagull/del_portfolio.php?id=<?php echo $portfolio_id; ?>">delete portfolio</a>
    </div>
    </a>
        <?php
			}
        ?>
    <div class='clear'></div>
<!--END USER'S PORTFOLIOS-->
	</div>
</div>
</div>
</body>
</html>
<? ob_flush(); ?>