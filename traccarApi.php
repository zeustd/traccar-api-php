<?php

class traccar {
public static $host='http://127.0.0.1:8067';
private static $adminEmail='admin';
private static $adminPassword='admin';
public static $cookie;
private static $jsona='Accept: application/json';
private static $json='Content-Type: application/json';
private static $urlencoded='Content-Type: application/x-www-form-urlencoded';

/*Server*/
public static function server() {

	return self::curl('/api/server?'.$data,'GET',$cookie ,'',array());
}
/*End Server*/


/*Session*/

public static function loginAdmin() {
	
	return self::login(self::$adminEmail,self::$adminPassword);
}

public static function login($email,$password) {

	$data='email='.$email.'&password='.$password;

	return self::curl('/api/session','POST','',$data,array(self::$urlencoded));
}

public static function checkLogin($cookie) {
	
	return self::curl('/api/session?'.$data,'GET',$cookie ,'',array());
}

public static function session($cookie) {
	
	return self::curl('/api/session?'.$data,'GET',$cookie ,'',array());
}

/*End Sessions*/


/*Devices*/

public static function devices($cookie) {

	return self::curl('/api/devices?'.$data,'GET',$cookie ,'',array());
}

/*End Devices*/

/*Positions*/
public static function positions($deviceId,$from,$to,$id,$cookie) {

	$data='deviceId='.$deviceId.'&from='.$from.'&to='.$to;

	return self::curl('/api/positions?'.$data,'GET',$cookie ,'',array());
}
/*End Positions*/

/*Reports*/
public static function reportSummary($deviceId,$from,$to,$cookie) {

	$data='deviceId='.$deviceId.'&from='.$from.'&to='.$to;

	return self::curl('/api/reports/summary?'.$data,'GET',$cookie ,'',array());
}

public static function reportTrips($deviceId,$from,$to,$cookie) {

	$data='deviceId='.$deviceId.'&from='.$from.'&to='.$to;

	return self::curl('/api/reports/trips?'.$data,'GET',$cookie ,'',array());
}

public static function reportStops($deviceId,$from,$to,$cookie) {

	$data='deviceId='.$deviceId.'&from='.$from.'&to='.$to;

	return self::curl('/api/reports/stops?'.$data,'GET',$cookie ,'',array());
}
/*End Reports*/

public static function curl($task,$method,$cookie,$data,$header) {
	
	$res=new stdClass();
	$res->responseCode='';
	$res->error='';
	$header[]="Cookie: ".$cookie;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, self::$host.$task);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
	
	if($method=='POST' || $method=='PUT' || $method=='DELETE') {
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	}
	
	curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
	$data=curl_exec($ch);
	$size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
	
	if (preg_match('/^Set-Cookie:\s*([^;]*)/mi', substr($data, 0, $size), $c) == 1) self::$cookie = $c[1];
		$res->response = substr($data, $size);
	
	if(!curl_errno($ch)) {
		$res->responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	}
	else {
		$res->responseCode=400;
		$res->error= curl_error($ch);
	}
	
	curl_close($ch);
	return $res;
	}
}


//DistanceUnits
$km=0.001;
$mi=0.000621371;
$nmi=0.000539957;

//SpeedUnits
$kn=1;
$kmh=1.852;
$mph=1.15078;

//Timeunits
$second=60;
$minute=1;
$hour=3600;
?>