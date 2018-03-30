<?php
include('includePostLogin.php');

$deviceId = $_REQUEST['deviceId'];
$fromTime = $_REQUEST['from'];
$toTime = $_REQUEST['to'];
$timeZone = $_REQUEST['timeZone'];

$from = traccarTime::toIso($fromTime, $timeZone);
$to = traccarTime::toIso($toTime, $timeZone);


$reportTrips=traccar::reportTrips($deviceId,$from,$to,$cookie);

$rows = array();

if($reportTrips->responseCode=='200') {
	$response = $reportTrips->response;
	$reportTripsArray = json_decode($response,true);
	$out['apiResponse'] = 'ok';
	$out['apiResponseCode'] = $reportTrips->responseCode;
	$out['sessionResponse'] = $sessionResponse;
	$out['sessionResponseCode'] = $sessionResponseCode;
	$out['response'] = $reportTripsArray;
	
	
	//$out['response']['computedSpeed'] = $positionsArray[1]['protocol'];
	
	$rows[] = $out;
	

}else{
	$out['apiResponse'] = 'error';
	$out['apiresponseCode'] = $reportTrips->responseCode;
	$out['sessionResponse'] = $sessionResponse;
	$out['sessionResponseCode'] = $sessionResponseCode;
	$out['response'] = $reportTrips->response;
	$rows[] = $out;
	

}

	$results = array('data' => $rows);
	echo json_encode($results);

?>