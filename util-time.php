<?php

function toUTC($dateTime, $timeZone){
	$dateInLocal = date("Y-m-d H:i:s", $dateTime);
	$dt = new DateTime($dateInLocal, new DateTimeZone($timeZone));
	$dt->setTimezone(new DateTimeZone('UTC'));
	$utcTime = $dt->format('Y-m-d H:i:s');
	$returnObject = new DateTime($utcTime);
	$returnIso = substr($returnObject->format(DateTime::ATOM), 0, -6) . '.000Z';
	return $returnIso;
}

/*
 * ReadMe / Instructions & Notes
 *
 * $dateTime value = epoch time format
 * Format of time zone :  Asia/Kolkata
 * This function takes the users input time and timezone and converts it into UTC time and returns a response ISO Time format as required by traccar.
*/
?>
