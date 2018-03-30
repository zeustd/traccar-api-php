<?php

$cookie = $_GET['cookie'];

$t=traccar::checkLogin($cookie);

if($t->responseCode=='200') {
	
	$sessionResponse = 'ok';
	$sessionResponseCode = $t->responseCode;
}else{
	
	$sessionResponse = 'error';
	$sessionResponseCode = $t->responseCode;
}


?>