<?php
	
	require_once dirname(__FILE__).'/DbOperations.php';

	$response = array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		if (isset($_POST['username']) and isset($_POST['password'])){

			$db = new DbOperations();

			$result = $db->createUser($_POST['username'], $_POST['password']);

			if ($result == 0){

				$response['error'] = false;
				$response['message'] = "User account created Successfully";

			}else if ($result == 1){

				$response['error'] = true;
				$response['message'] = "User already exists...!!";

			}else{

				$response['error'] = true;
				$response['message'] = "Something has gone wrong..Please try again...!!";

			}

		}else{
			$response['error'] = true;
			$response['message'] = "Required fields are missing";			
		}


	}else{

		$response['error'] = true;
		$response['message'] = "Invalid Request Method";
	}


	echo json_encode($response);