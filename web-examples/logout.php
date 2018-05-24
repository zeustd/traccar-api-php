<?php

include('incPostLogin.php');

$login=traccar::logout($cookie);

$rows = array();

if($login->responseCode=='204') {
	$response = $login->response;
	$userArray = json_decode($response,true);
	$out['apiResponse'] = 'ok';
	$out['apiResponseCode'] = $login->responseCode;
	$out['response'] = $userArray;
	$rows[] = $out;
}else{
	$out['apiResponse'] = 'error';
	$out['apiresponseCode'] = $login->responseCode;
	$out['response'] = $login->response;
	$rows[] = $out;
}

$results = array('data' => $rows);
echo json_encode($results);

?>
