<?php include 'function.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Seagull</title>
<link rel="stylesheet" href="style.css"/>
</head>
	<?php include 'connect.php'; ?>
<body>
<?php include 'title_bar.php'; ?>

<div id="body">
    <div id="container">

    	<h3 id="create_head">COMPOSE STORY</h3>

        <form id='create_form' method='post'>
        <?php

			if(isset($_POST['title'])){

				$parent = dirname($_SERVER['REQUEST_URI']);
				ini_set('display_errors', '1');
				$udata = "user";
					$SQLstring = "SELECT * FROM $udata WHERE username ='".$_SESSION['username']."'";
						$QueryResult = @mysql_query($SQLstring, $DBConnect);
						$Row = mysql_fetch_assoc($QueryResult);
						$user_id = $Row['id'];

				$title = $_POST['title'];

				if (empty($title)){
					echo "<div class='alert-box error'><span>Oops! </span>please enter a portfolio title.</div><br/><br/>";
				} else {
					mysql_query("INSERT INTO portfolio VALUES ('', '$title', '$user_id')");

					echo "<div class='alert-box success'><span>success: </span>porfolio created successfully!</div><br/><br/>";
					echo "<a id='edit_info' href='upload.php?id=$user_id'>Go to Upload Photos page</a><br/><br/>";
				}
			}
		?>
        <label>portfolio title : <label><input type='text' name='title'/><br>
        	<input class='standardbuttons' type='submit' value='Compose'/>
        </form>
    </div>
</div>

</body>
</html>