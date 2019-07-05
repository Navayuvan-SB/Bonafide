<?php
	
	require_once dirname(__FILE__).'/DbOperations.php';

	$response = array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		if (isset($_POST['username']) and isset($_POST['password'])){

			$db = new DbOperations();

			if ($db->loginUser($_POST['username'], $_POST['password'])){
				$response['error'] = false;
				$response['message'] = "Login Successfully";
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