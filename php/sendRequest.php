<?php

   require_once dirname(__FILE__).'/DbOperations.php';

	$response = array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		if (isset($_POST['studentName']) and isset($_POST['fatherName']) and isset($_POST['regNo']) and isset($_POST['yearOfStudy']) and isset($_POST['Reason']) and isset($_POST['dept']) and isset($_POST['gender'])){

			$db = new DbOperations();

			if ($db->sendRequest($_POST['studentName'], $_POST['fatherName'], $_POST['regNo'], $_POST['yearOfStudy'], $_POST['Reason'], $_POST['dept'], $_POST['gender'])){
				$response['error'] = false;
				$response['message'] = "Saved Successfully";
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