<?php include 'function.php'; ?>
<?php
	ob_start(); 

?>
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
<div id='body'>
    
    <div id='container'>
    <h3 id="create_head">UPLOAD PHOTOS TO A PORTFOLIO</h3>
    <form id="create_form" enctype='multipart/form-data' method='post'>
    <?php
	 if(isset($_POST['upload'])){
		$title = $_POST['title'];
		$portfolio_id = $_POST['portfolio'];
		$file = $_FILES['file'] ['name'];
		$file_type = $_FILES['file'] ['type'];
		$file_size = $_FILES['file'] ['size'];
		$file_tmp = $_FILES ['file'] ['tmp_name'];
		$random_name = rand();
		
		if(empty($title) or empty($file)){
			echo "<div class='alert-box error'><span>error: </span>please fill all the fields!</div><br/>";
	 	} else {
			move_uploaded_file($file_tmp, 'uploads/'.$random_name.'.jpg');
			mysql_query("INSERT INTO portfolio_image VALUES('', '$title', '$portfolio_id', '$random_name.jpg')");
			
			echo "<div class='alert-box success'><span>success: </span>photo uploaded!</div><br/>";
	 	}
	 }
	?>
    
    	<p>photo name : 
        <input type='text' name='title' /></p>
        <br/>
        
        <p>select portfolio : 
        <select name='portfolio'>
        
        <?php
		
		$user_id = $_GET['id'];
			$query = mysql_query("SELECT id, title FROM portfolio WHERE user_id ='$user_id'");
			while($run = mysql_fetch_array($query)){
				$portfolio_id = $run['id'];
				$portfolio_title= $run['title'];
				echo "<option value='$portfolio_id'>$portfolio_title</option>";
			}
		?>
        </select>
        <p>select image: 
                <input style="width:180px;" type='file' name='file'/>
        </p>
        
        <br/>
        <input type='submit' name='upload' value='Upload'/>
    </form>
    </div>
</div>

</body>
</html>
