<?php
include ('includePostLogin.php');

$server = traccar::server();

$rows = array();

if ($server->responseCode == '200') {
	$response = $server->response;
	$serverArray = json_decode($response, true);
	$out['apiResponseCode'] = $server->responseCode;
	$out['response'] = $serverArray;
	$rows[] = $out;
} else {
	$out['apiresponseCode'] = $server->responseCode;
	$out['response'] = $server->response;
	$rows[] = $out;
}

$results = array('data' => $rows);
echo json_encode($results);

?>
