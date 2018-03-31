<?php
include('includePostLogin.php');


$rows = array();

$s=traccar::checkLogin($cookie);

if($t->responseCode=='200') {
	
	$response = $t->response;
	$userArray = json_decode($response,true);
	$out['apiResponse'] = 'ok';
	$out['apiResponseCode'] = $session->responseCode;
	$out['response'] = $userArray;
	$rows[] = $out;
}else{
	
	$out['apiResponse'] = 'error';
	$out['apiresponseCode'] = $t->responseCode;
	$out['response'] = $t->response;
	//$out['response']['cookie'] = $traccarCookie;
	$rows[] = $out;
}



	$results = array('data' => $rows);
	echo json_encode($results);

?>