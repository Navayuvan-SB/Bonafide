<?php
	
	class DbOperations{

		public $con;

		function __construct(){

			require_once dirname(__FILE__).'/DbConnect.php';

			$db = new DbConnect();

			$this->con = $db->connect();
		}

		public function loginUser($username, $password){

			$pass = md5($password);

			$stmt = $this->con->prepare("SELECT id FROM `auth` WHERE username = ? and password = ?");

			$stmt->bind_param("ss", $username, $pass);

			$stmt->execute();

			$stmt->store_result();

			return $stmt->num_rows > 0;

		}

		public function getUserByName($username){

			$stmt = $this->con->prepare("SELECT id FROM `auth` WHERE username = ?");

			$stmt->bind_param("s", $username);

			$stmt->execute();

			$stmt->store_result();

			return $stmt->num_rows > 0;

		}


		public function createUser($username,$password){

			$pass = md5($password);

			if ($this->getUserByName($username)){

				 return 1;

			}else{
				$stmt = $this->con->prepare("INSERT INTO `auth`(`username`, `password`) VALUES (?, ?)");

				$stmt->bind_param("ss", $username, $pass);

				if ($stmt->execute()){

					return 0;

				}else{

					return 2;
				}
			}
		}

		public function sendRequest($studentName, $fatherName, $regNo, $yearOfStudy, $Reason, $dept, $gender){

			$stmt = $this->con->prepare("INSERT INTO `requests` (`studentName`, `fatherName`, `regNo`, `yearOfStudy`, `Reason`, `dept`, `gender`, `status`, `reqDate`) VALUES (?, ?, ?, ?, ?, ?, ?, 0, ?)");

			$stmt->bind_param("ssssssss", $studentName, $fatherName, $regNo, $yearOfStudy, $Reason, $dept, $gender,  date("d-m-Y"));

			if ($stmt->execute()){

				return true;

			}else{

				return false;

			}


			
		}
	}

