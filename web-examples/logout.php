<?php
include ('incPostLogin.php');

$login = traccar::logout($cookie);

$rows = array();

if ($login->responseCode == '204') {
	$response = $login->response;
	$userArray = json_decode($response, true);
	$out['apiResponseCode'] = $login->responseCode;
	$out['response'] = $userArray;
	$rows[] = $out;
} else {
	$out['apiresponseCode'] = $login->responseCode;
	$out['response'] = $login->response;
	$rows[] = $out;
}

$results = array('data' => $rows);
echo json_encode($results);

?>
