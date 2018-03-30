<?php
include('includePostLogin.php');

$deviceId = $_REQUEST['deviceId'];
$from = $_REQUEST['from'];
$to = $_REQUEST['to'];
$id = $_REQUEST['id'];

$positions=traccar::positions($deviceId,$from,$to,$id,$cookie);

$rows = array();

if($positions->responseCode=='200') {
	$response = $positions->response;
	$positionsArray = json_decode($response,true);
	$out['apiResponse'] = 'ok';
	$out['apiResponseCode'] = $positions->responseCode;
	$out['sessionResponse'] = $sessionResponse;
	$out['sessionResponseCode'] = $sessionResponseCode;
	$out['response'] = $positionsArray;
	
	
	//$out['response']['computedSpeed'] = $positionsArray[1]['protocol'];
	
	$rows[] = $out;
	

}else{
	$out['apiResponse'] = 'error';
	$out['apiresponseCode'] = $positions->responseCode;
	$out['sessionResponse'] = $sessionResponse;
	$out['sessionResponseCode'] = $sessionResponseCode;
	$out['response'] = $positions->response;
	$rows[] = $out;
	

}

	$results = array('data' => $rows);
	echo json_encode($results);

?>