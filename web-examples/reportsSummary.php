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
	$out['apiResponseCode'] = $reportSummary->responseCode;
	$out['response'] = $reportSummaryArray;
	$rows[] = $out;
} else {
	$out['apiresponseCode'] = $reportSummary->responseCode;
	$out['response'] = $reportSummary->response;
	$rows[] = $out;
}

$results = array('data' => $rows);
echo json_encode($results);

?>
