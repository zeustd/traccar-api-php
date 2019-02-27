<?php
header('Content-Type: application/json');

include('traccarApi.php');

$a = gps::server();
echo $response = $a->response;
echo $responseCode = $a->responseCode;
?>
