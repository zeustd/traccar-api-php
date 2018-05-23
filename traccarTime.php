<?php
/*
 * Copyright 2018 James Joseph (james@yodiyil.com)
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

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

/*
 * ReadMe / Instructions & Notes
 *
 * Date time Format to submit time in toIso function :  2017-07-25 00:00:10
 * Format of time zone :  Asia/Kolkata
 * This function takes the user input time and timezone and converts it into UTC time and returns a response ISO Time format.
*/
?>
