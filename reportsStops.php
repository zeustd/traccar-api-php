<?php
include('incPostLogin.php');

$deviceId = $_REQUEST['deviceId'];
$fromTime = $_REQUEST['from'];
$toTime = $_REQUEST['to'];
$timeZone = $_REQUEST['timeZone'];

$from = traccarTime::toIso($fromTime, $timeZone);
$to = traccarTime::toIso($toTime, $timeZone);


$reportStops=traccar::reportStops($deviceId,$from,$to,$cookie);

$rows = array();

if($reportStops->responseCode=='200') {
	$response = $reportStops->response;
	$reportStopsArray = json_decode($response,true);
	$out['apiResponse'] = 'ok';
	$out['apiResponseCode'] = $reportStops->responseCode;
	$out['sessionResponse'] = $sessionResponse;
	$out['sessionResponseCode'] = $sessionResponseCode;
	$out['response'] = $reportStopsArray;
	
	
	//$out['response']['computedSpeed'] = $positionsArray[1]['protocol'];
	
	$rows[] = $out;
	

}else{
	$out['apiResponse'] = 'error';
	$out['apiresponseCode'] = $reportStops->responseCode;
	$out['sessionResponse'] = $sessionResponse;
	$out['sessionResponseCode'] = $sessionResponseCode;
	$out['response'] = $reportStops->response;
	$rows[] = $out;
	

}

	$results = array('data' => $rows);
	echo json_encode($results);

?>