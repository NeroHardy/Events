<?php 
	header('Content-Type:application/json');
	require('DAO/DaoLogin.php');

	$LoginDAO=new DaoLogin();
	
	/*if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        exit(0);
    }*/
    
 	header("Access-Control-Allow-Origin: *");
    $postdata = file_get_contents("php://input");
	if (isset($postdata)) {
		$request = json_decode($postdata);
		$user = $request->user;
		$password = $request->password;
		echo json_encode($LoginDAO->Login($user,$password));
	}

	/*switch ($_SERVER['REQUEST_METHOD']) {
		case 'GET':{
			json_encode($LoginDAO->Read());
			break;
		}

		case 'POST':{

			echo json_encode($LoginDAO->Login(
				$_POST['user'],
				$_POST['password']
				));
			break;

			if ($LoginDAO->Login(
				$_POST['user'],
				$_POST['password']
				)) {
				$ArrayResponse[]=array();
				echo json_encode($ArrayResponse);
			}
			else{
				$ArrayResponse[]=array();
				echo json_encode($ArrayResponse);
			}
			break;
		}
			
	}*/



?>