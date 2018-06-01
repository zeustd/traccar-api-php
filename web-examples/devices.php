<?php
include ('incPostLogin.php');

$id = $_REQUEST['id'];
$action = $_REQUEST['action'];
$name = $_REQUEST['name'];
$uniqueId = $_REQUEST['uniqueId'];
$phone = $_REQUEST['phone'];
$category = $_REQUEST['category'];
$model = $_REQUEST['model'];
$contact = $_REQUEST['contact'];
$lastUpdate = $_REQUEST['lastUpdate'];
$geofenceIds = $_REQUEST['geofenceIds'];
$groupId = $_REQUEST['groupId'];
$disabled = $_REQUEST['disabled'];
$attributes = '{}';
$positionId = $_REQUEST['positionId'];
$status = $_REQUEST['status'];

if ($action == 'get') {
	$positions = traccar::devices($cookie);
	$rows = array();
	if ($positions->responseCode == '200') {
		$response = $positions->response;
		$positionsArray = json_decode($response, true);
		$out['apiResponse'] = 'ok';
		$out['apiResponseCode'] = $positions->responseCode;
		$out['sessionResponse'] = $sessionResponse;
		$out['sessionResponseCode'] = $sessionResponseCode;
		$out['response'] = $positionsArray;
		$rows[] = $out;
	} else {
		$out['apiResponse'] = 'error';
		$out['apiresponseCode'] = $positions->responseCode;
		$out['sessionResponse'] = $sessionResponse;
		$out['sessionResponseCode'] = $sessionResponseCode;
		$out['response'] = $positions->response;
		$rows[] = $out;
	}
	$results = array('data' => $rows);
	echo json_encode($results);
}

if ($action == 'edit') {
	$positions = traccar::updateDevice($cookie, $id, $name, $uniqueId, $phone, $category, $model, $contact, $lastUpdate, $geofenceIds, $groupId, $disabled, $attributes);
	$rows = array();
	if ($positions->responseCode == '200') {
		$response = $positions->response;
		$positionsArray = json_decode($response, true);
		$out['apiResponse'] = 'ok';
		$out['apiResponseCode'] = $positions->responseCode;
		$out['sessionResponse'] = $sessionResponse;
		$out['sessionResponseCode'] = $sessionResponseCode;
		$out['response'] = $positionsArray;
		$rows[] = $out;
	} else {
		$out['apiResponse'] = 'error';
		$out['apiresponseCode'] = $positions->responseCode;
		$out['sessionResponse'] = $sessionResponse;
		$out['sessionResponseCode'] = $sessionResponseCode;
		$out['response'] = $positions->response;
		$rows[] = $out;
	}
	$results = array('data' => $rows);
	echo json_encode($results);
}

?>
