<?php
$cookie = $_GET['cookie'];

$t = traccar::session($cookie);

if ($t->responseCode == '200') {
	$sessionResponse = 'ok';
	$sessionResponseCode = $t->responseCode;
} else {
	$sessionResponse = 'error';
	$sessionResponseCode = $t->responseCode;
}

?>
