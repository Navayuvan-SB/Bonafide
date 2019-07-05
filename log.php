<?php
class Db_connect{

	private $con;
	
	function __construct(){

	}
	function connect(){
		include_once dirname(__FILE__).'/var.php';
		$this->con = new mysqli(DB_Host,DB_User,DB_Password,DB_Name);

		if (mysqli_connect_errno()) {
			echo "Failed to connect with database".mysqli_connect_errno();
		}
		echo "Connected successfully";
		return$this->con;
	}
}