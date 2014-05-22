<?php include '../function.php'; ?>
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
<body>
	<?php include '../title_bar.php'; ?>
<div id="body">
<div id="container">

<div id="header">
<a href="http://febrilcuevas.com/seagull/index.php"><h1>Sign up for your Seagull account</h1></a>
</div>

<div id="content">

<form id='reg_form' name='newReg' action="http://febrilcuevas.com/seagull/db/addUser.php" method="post">
    <input type='hidden' name='add' value='addNew' />
    <label style="display: inline-block; ">username </label><br />
    <input class="formboxes" type="text" name="username" /><br />

    <label style="display: inline-block; ">First Name </label><br />
    <input class="formboxes" type="text" name="firstname" /><br />

    <label style="display: inline-block; ">Last Name </label><br />
    <input class="formboxes" type="text" name="lastname" /><br />

    <label style="display: inline-block; ">Email</label><br />
    <input class="formboxes" type="text" name="email" /><br />

    <label style="display: inline-block; width: 120px">Password</label><br />
    <input class="formboxes" type="password" name="password" /><br />

    <input name='submit' type="submit" value='Sign Up'/>
</form>

	</div>
</div>
</div>
</body>
</html>