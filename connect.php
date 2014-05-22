<?php
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
?>