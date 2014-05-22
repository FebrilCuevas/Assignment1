<? ob_start(); ?>
<?php
ini_set('display_errors', '1');
include("http://febrilcuevas.com/seagull/db/addUser.php");
$uid = $_REQUEST['id'];
mysql_query("DELETE FROM user WHERE `id`=".$uid);
echo "Affected rows: " . mysqli_affected_rows($dbConnect);
session_destroy();
header("Location: http://febrilcuevas.com/seagull/user_login/reg_login.php");
exit();
?>
<? ob_flush(); ?>