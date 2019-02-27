<?php
header('Content-Type: application/json');

include('traccarApi.php');

$a = gps::serverGps();
echo $response = $a->response;
echo $responseCode = $a->responseCode;
?>
