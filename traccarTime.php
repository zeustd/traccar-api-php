<?php

class traccarTime {

    public static function toIso($time, $timeZone) {
        
    $time = strtotime($time);
        
    $dateInLocal = date("Y-m-d H:i:s", $time);
        
    $dt = new DateTime($dateInLocal, new DateTimeZone($timeZone));
        
    $dt->setTimezone(new DateTimeZone('UTC'));
        
    $utcTime = $dt->format('Y-m-d H:i:s');

    $returnObject = new DateTime($utcTime);
    
    $returnIso = substr($returnObject->format(DateTime::ATOM),0,-6).'.000Z';
      
    return $returnIso;
    }


    

}


//Format to submit time in toIso function :  2017-07-25 00:00:10
//format of time zone :  Asia/Kolkata
//This function takes the user input time and timezone and converts it into UTC time and returns a response ISO Time format.
?>