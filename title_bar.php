<?php
	if(loggedin()) {
		$errors = 0;
$DBName = "febrilcu_seagull";
$DBConnect = @mysql_connect("localhost:3306", "febrilcu_seagull", "localhost.");
if ($DBConnect === FALSE) {
     echo "<p>Connection error: "
               . mysql_error() . "</p>\n";
	     ++$errors;
} else {
     if (@mysql_select_db($DBName, $DBConnect) === FALSE) {
          echo "<p>Could not select the \"$DBName\" " .
               "database: " . mysql_error($DBConnect) . "</p>\n";
          mysql_close($DBConnect);
          $DBConnect = FALSE;
          ++$errors;
     }
}

	$parent = dirname($_SERVER['REQUEST_URI']);
	ini_set('display_errors', '1');

	$udata = "user";
	$SQLstring = "SELECT * FROM $udata WHERE username ='".$_SESSION['username']."'";
	$QueryResult = @mysql_query($SQLstring, $DBConnect);
	$Row = mysql_fetch_assoc($QueryResult);
	$fname = $Row['firstname'];
	$uname = $Row['username'];
	$uid = $Row['id'];

	echo "<div id='header-section'>";
	echo "<a id='header_logo' href='http://febrilcuevas.com/seagull/index.php'><img  alt='seagull_logo' src='http://febrilcuevas.com/seagull/assets/images/logo.png' width='290px'/></a>";
	echo "<table><tr><td align='center'><a href='http://febrilcuevas.com/seagull/index.php'>Home</a></td>";
	echo "<td align='center'><a href='http://febrilcuevas.com/seagull/create.php'>Compose New Story</a></td>";
	echo "<td align='center'><a href='http://febrilcuevas.com/seagull/upload.php?id=$uid'>Upload Photos</a></td>";
	echo "</tr></table></div>";

} else {
?>

    <div id="header-section">
    <a id="header_logo" href="http://febrilcuevas.com/seagull/index.php"><img  alt="seagull_logo" src="http://febrilcuevas.com/seagull/assets/images/logo.png" width="290px"/></a>
        <table>
        <tr>
                <td align="center"><a href="http://febrilcuevas.com/seagull/index.php">Home</a></td>
                <td style="padding-left:5px; padding-right:5px;" align="center"><a href="http://febrilcuevas.com/seagull/user_login/reg_login.php">Create Portfolio</a></td>
                <td align="center"><a href="http://febrilcuevas.com/seagull/user_login/reg_login.php">Upload Photos</a></td>
        </tr>
        </table>
    </div>

<?php
}
?>