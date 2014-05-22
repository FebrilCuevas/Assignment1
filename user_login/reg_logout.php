<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: reg_login.php");
exit();
?>