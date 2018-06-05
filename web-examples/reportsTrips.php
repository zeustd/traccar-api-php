<?php
include ('incPostLogin.php');

$deviceId = $_REQUEST['deviceId'];
$fromTime = $_REQUEST['from'];
$toTime = $_REQUEST['to'];
$timeZone = $_REQUEST['timeZone'];
$from = traccarTime::toIso($fromTime, $timeZone);
$to = traccarTime::toIso($toTime, $timeZone);

$reportTrips = traccar::reportTrips($deviceId, $from, $to, $cookie);

$rows = array();

if ($reportTrips->responseCode == '200') {
	$response = $reportTrips->response;
	$reportTripsArray = json_decode($response, true);
	$out['apiResponseCode'] = $reportTrips->responseCode;
	$out['response'] = $reportTripsArray;
	$rows[] = $out;
} else {
	$out['apiresponseCode'] = $reportTrips->responseCode;
	$out['response'] = $reportTrips->response;
	$rows[] = $out;
}

$results = array('data' => $rows);
echo json_encode($results);

?>
