<?php
include('includePostLogin.php');


$devices=traccar::devices($cookie);

$rows = array();

if($devices->responseCode=='200') {
	
	$response = $devices->response;
	$devicesArray = json_decode($response,true);
	$out['apiResponse'] = 'ok';
	$out['apiResponseCode'] = $devices->responseCode;
	$out['sessionResponse'] = $sessionResponse;
	$out['sessionResponseCode'] = $sessionResponseCode;
	$out['response'] = $devicesArray;
$rows[] = $out;

}else{
	$out['apiResponse'] = 'error';
	$out['apiresponseCode'] = $devices->responseCode;
	$out['sessionResponse'] = $sessionResponse;
	$out['sessionResponseCode'] = $sessionResponseCode;
	$out['response'] = $devices->response;
	$rows[] = $out;
	

}

	$results = array('data' => $rows);
	echo json_encode($results);

?>