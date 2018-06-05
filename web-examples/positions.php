<?php
include ('incPostLogin.php');

$deviceId = $_REQUEST['deviceId'];
$from = $_REQUEST['from'];
$to = $_REQUEST['to'];
$id = $_REQUEST['id'];

$positions = traccar::positions($deviceId, $from, $to, $id, $cookie);

$rows = array();

if ($positions->responseCode == '200') {
	$response = $positions->response;
	$positionsArray = json_decode($response, true);
	$out['apiResponseCode'] = $positions->responseCode;
	$out['response'] = $positionsArray;
	$rows[] = $out;
} else {
	$out['apiresponseCode'] = $positions->responseCode;
	$out['response'] = $positions->response;
	$rows[] = $out;
}

$results = array('data' => $rows);
echo json_encode($results);

?>
