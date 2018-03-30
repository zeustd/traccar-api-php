<?php

include('includePreLogin.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$login=traccar::login($username,$password);

$rows = array();

if($login->responseCode=='200') {
	$traccarCookie = traccar::$cookie;
	$response = $login->response;
	$userArray = json_decode($response,true);
	$out['apiResponse'] = 'ok';
	$out['apiResponseCode'] = $login->responseCode;
	$out['response'] = $userArray;
	$out['response']['cookie'] = $traccarCookie;
	$rows[] = $out;

}else{
	$out['apiResponse'] = 'error';
	$out['apiresponseCode'] = $login->responseCode;
	$out['response'] = $login->response;
	$out['response']['cookie'] = $traccarCookie;
	$rows[] = $out;
	

}

	$results = array('data' => $rows);
	echo json_encode($results);

?>