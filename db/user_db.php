<?php
error_reporting(-1);
include ("connect.php");
$query = "SELECT * FROM user";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)){
	var_dump($row);
	echo "test";	
}
class User_db {
	private $user;
	
	function set_user($name){
		
	}
	
	function get_user(){
		return "Henry";
	}
	
	function get_all_users(){
		global $con;
		
		$query = "SELECT * FROM user";
		$result = mysqli_query($con, $query);
		$username = array();
		while ($row = mysqli_fetch_array($result)){
			$username[$row['id']] = $row['username'];
		}
		
		return $username;
	}
}
?>