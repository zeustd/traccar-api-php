<?php
include ('incPostLogin.php');

$deviceId = $_REQUEST['deviceId'];
$fromTime = $_REQUEST['from'];
$toTime = $_REQUEST['to'];
$timeZone = $_REQUEST['timeZone'];
$from = traccarTime::toIso($fromTime, $timeZone);
$to = traccarTime::toIso($toTime, $timeZone);

$reportSummary = traccar::reportSummary($deviceId, $from, $to, $cookie);

$rows = array();

if ($reportSummary->responseCode == '200') {
	$response = $reportSummary->response;
	$reportSummaryArray = json_decode($response, true);
	$out['apiResponse'] = 'ok';
	$out['apiResponseCode'] = $reportSummary->responseCode;
	$out['sessionResponse'] = $sessionResponse;
	$out['sessionResponseCode'] = $sessionResponseCode;
	$out['response'] = $reportSummaryArray;
	$rows[] = $out;
} else {
	$out['apiResponse'] = 'error';
	$out['apiresponseCode'] = $reportSummary->responseCode;
	$out['sessionResponse'] = $sessionResponse;
	$out['sessionResponseCode'] = $sessionResponseCode;
	$out['response'] = $reportSummary->response;
	$rows[] = $out;
}

$results = array('data' => $rows);
echo json_encode($results);

?>
