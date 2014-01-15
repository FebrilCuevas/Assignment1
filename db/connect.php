<?php
$con=mysqli_connect("localhost", "root", "root", "project");

if(mysqli_connect_errno()){
	//failed to connect
	echo "failed to connect".mysqli_connect_error();	
}
?>