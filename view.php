<?php include 'function.php'; ?>
<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Seagull</title>
<link rel='stylesheet' href='style.css'/>
</head>
	<?php include 'connect.php'; ?>
<body>
	<?php include 'title_bar.php'; ?>

<div id='body'>


    <div id='container'>
		<?php

			$portfolio_id = $_GET['id'];

			$query = mysql_query("SELECT id, title, url FROM portfolio_image WHERE portfolio_id='$portfolio_id'");
			while($run = mysql_fetch_array($query)){
				$title = $run['title'];
				$url = $run ['url'];
			$query1 = mysql_query ("SELECT username FROM user WHERE id=$portfolio_id");
				$run1 = mysql_fetch_array($query1);
				$username = $run1['username'];
		?>
		<div id='view_box'>
        	<a href='uploads/<?php echo $url ?>'><img src='uploads/<?php echo $url ?>'/></a>
            <br/>
            <b><?php echo $title; ?></b>
        </div>
        <?php
			}
        ?>
        <div class='clear'></div>

    </div>
</div>

</body>
</html>