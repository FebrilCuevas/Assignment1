<?php
include("connect.php");

class Portfolio_db{

	private $dbcon;
	private $portfolio_id;
	private $user_id;
	private $error;

	function __construct(){
		global $con;
		$this->dbcon = $con;
	}

	function get_all_portfolios(){
		$query = "SELECT * FROM portfolio";
		$result = mysqli_query($this->dbcon, $query);
		$array = array();
		while($row = mysqli_fetch_array($result)){
			$array[$row["id"]] = $row;
		}
		return $array;
	}

	function get_portfolio_by_id(){
		$query = "SELECT * FROM portfolio WHERE id = ".$this->portfolio_id;
		$result = mysqli_query($this->dbcon, $query);
		$array = array();
		while($row = mysqli_fetch_array($result)){
			$array[$row["id"]] = $row;
		}
		return $array;
	}

	function get_portfolios_by_user_id(){
		$query = "SELECT portfolio.id, portfolio.link, portfolio.title, portfolio.desc FROM portfolio
				 LEFT JOIN user_portfolio ON user_portfolio.portfolio_id = portfolio.id
				 LEFT JOIN user ON user.id = user_portfolio.user_id
				 WHERE user.id = ".$this->user_id;
		$result = mysqli_query($this->dbcon, $query);
		$array = array();
		while($row = mysqli_fetch_array($result)){
			$array[$row["id"]] = $row;
		}
		return $array;
	}

	function get_collaborators_by_portfolio_id(){
		$query = "SELECT user.id, user.username, user.first_name, user.last_name FROM user
				 LEFT JOIN portfolio_collaborator ON portfolio_collaborator.user_id = user.id
				 LEFT JOIN portfolio ON portfolio.id = portfolio_collaborator.portfolio_id
				 WHERE portfolio.id = ".$this->portfolio_id;
		$result = mysqli_query($this->dbcon, $query);
		$array = array();
		while($row = mysqli_fetch_array($result)){
			$array[$row["id"]] = $row;
		}
		return $array;
	}

	function set_portfolio_id($id){
		if(is_numeric($id)){
			$this->portfolio_id = $id;
		} else {
			$this->error = "Portfolio ID is not valid.";
		}
	}

	function set_user_id($id){
		if(is_numeric($id)){
			$this->user_id = $id;
		} else {
			$this->error = "User ID is not valid.";
		}
	}

	function show_error(){
		echo $this->error;
	}

}

$portfolios = new Portfolio_db();
$all_portfolios = $portfolios->get_all_portfolios();
echo "<pre>";
var_dump($all_portfolios);
echo "</pre>";
echo "<hr />";

$portfolios->set_portfolio_id(2);
$set_portfolio = $portfolios->get_portfolio_by_id();
$portfolios->show_error();

echo "<pre>";
var_dump($set_portfolio);
echo "</pre>";
echo "<hr />";

$portfolios->set_user_id(1);
$portfolio_by_user_id = $portfolios->get_portfolios_by_user_id();
$portfolios->show_error();

echo "<pre>";
var_dump($portfolio_by_user_id);
echo "</pre>";
echo "<hr />";

$portfolios->set_portfolio_id(1);
$get_collaborators = $portfolios->get_collaborators_by_portfolio_id();
$portfolios->show_error();

echo "<pre>";
var_dump($get_collaborators);
echo "</pre>";
echo "<hr />";

?>