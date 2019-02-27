<?php

class gps {

public static $host='http://127.0.0.1:8082';
private static $adminEmail='admin';
private static $adminPassword='admin';
public static $cookie;
private static $jsonA='Accept: application/json';
private static $jsonC='Content-Type: application/json';
private static $urlEncoded='Content-Type: application/x-www-form-urlencoded';

//Server
public static function serverGps(){
	
	return self::curl('/api/server?'.$data,'GET',$sessionId,'',array());
}

//Session
public static function loginAdmin(){
	
	return self::login(self::$adminEmail,self::$adminPassword);
}

public static function login($email,$password){
	
	$data='email='.$email.'&password='.$password;
	
	return self::curl('/api/session','POST','',$data,array(self::$urlEncoded));
}

public static function logout($sessionId){
	
	return self::curl('/api/session','DELETE',$sessionId,'',array(self::$urlEncoded));
}

public static function session($sessionId){
	
	return self::curl('/api/session?'.$data,'GET',$sessionId,'',array());
}


//users
public static function userAdd($sessionId,$name,$email,$password,$attributes){
	
	$id = '-1';
	$name = $name;
	$email = $email;
	$password = $password;
	$readOnly = 'false';
	$administrator = 'false';
	$map = '';
	$latitude = '0';
	$longitude = '0';
	$zoom = '0';
	$twelveHourFormat = 'false';
	$coordinateFormat = '0';
	$disabled = 'false';
	$expirationTime = '';
	$deviceLimit = '-1';
	$userLimit = '-1';
	$deviceReadonly = 'false';
	$limitCommands = 'false';
	$token = '';
	$attributes = $attributes;

	$data='{"id":"'.$id.'","name":"'.$name.'","email":"'.$email.'","readonly":"'.$readOnly.'","administrator":"'.$administrator.'","map":"'.$map.'","latitude":"'.$latitude.'","longitude":"'.$longitude.'","zoom":"'.$zoom.'","password":"'.$password.'","twelveHourFormat":"'.$twelveHourFormat.'","coordinateFormat":"'.$coordinateFormat.'","disabled":"'.$disabled.'","expirationTime":"'.$expirationTime.'","deviceLimit":"'.$deviceLimit.'","userLimit":"'.$userLimit.'","deviceReadonly":"'.$deviceReadonly.'","limitCommands":"'.$limitCommands.'","token":"'.$token.'","attributes":'.$attributes.'}';

	return self::curl('/api/users','POST',$sessionId,$data,array(self::$jsonC));
}

public static function userUpdate($sessionId,$id,$name,$email,$password,$attributes){

	$id = $id;
	$name = $name;
	$email = $email;
	$password = $password;
	$readOnly = 'false';
	$administrator = 'false';
	$map = '';
	$latitude = '0';
	$longitude = '0';
	$zoom = '0';
	$twelveHourFormat = 'false';
	$coordinateFormat = '0';
	$disabled = 'false';
	$expirationTime = '';
	$deviceLimit = '-1';
	$userLimit = '-1';
	$deviceReadonly = 'false';
	$limitCommands = 'false';
	$token = '';
	$login = "";
	$phone = "";
	$poiLayer = "";
	$attributes = $attributes;

	$data='{"id":"'.$id.'","name":"'.$name.'","email":"'.$email.'","administrator":"'.$administrator.'","coordinateFormat":"'.$coordinateFormat.'","deviceLimit":"'.$deviceLimit.'","deviceReadonly":"'.$deviceReadonly.'","disabled":"'.$disabled.'","expirationTime":"'.$expirationTime.'","latitude":"'.$latitude.'","limitCommands":"'.$limitCommands.'","login":"'.$login.'","longitude":"'.$longitude.'","map":"'.$map.'","phone":"'.$phone.'","poiLayer":"'.$poiLayer.'","readonly":"'.$readOnly.'","token":"'.$token.'","twelveHourFormat":"'.$twelveHourFormat.'","userLimit":"'.$userLimit.'","zoom":"'.$zoom.'","password":"'.$password.'","attributes":'.$attributes.'}';

	return self::curl('/api/users/'.$id,'PUT',$sessionId,$data,array(self::$jsonC));
}

public static function userDelete($sessionId,$id){

	return self::curl('/api/users/'.$id,'DELETE',$sessionId,$data,array(self::$jsonC));
}

public static function users($sessionId,$id){
	
	if($id != ''){
		$data='userId='.$id;
	}
	
	return self::curl('/api/users?'.$data,'GET',$sessionId,'',array());
}

//Devices
public static function deviceAdd($sessionId,$name,$uniqueId,$phone,$model,$category,$attributes){
	
	$id = '-1';
	$attributes = $attributes;

	$data='{"id":"'.$id.'","name":"'.$name.'","uniqueId":"'.$uniqueId.'","phone":"'.$phone.'","model":"'.$model.'","category":"'.$category.'","attributes":'.$attributes.'}';

	return self::curl('/api/devices','POST',$sessionId,$data,array(self::$jsonC));
}

public static function deviceUpdate($sessionId,$id,$name,$uniqueId,$phone,$model,$category,$attributes){

	$id = $id;
	$attributes = $attributes;

	$data='{"id":"'.$id.'","name":"'.$name.'","uniqueId":"'.$uniqueId.'","phone":"'.$phone.'","model":"'.$model.'","category":"'.$category.'","attributes":'.$attributes.'}';

	return self::curl('/api/devices/'.$id,'PUT',$sessionId,$data,array(self::$jsonC));
}

public static function deviceDelete($sessionId,$id){

	return self::curl('/api/devices/'.$id,'DELETE',$sessionId,$data,array(self::$jsonC));
}

public static function devices($sessionId,$id){
	
	if($id != ''){
		$data='id='.$id;
	}
	
	return self::curl('/api/devices?'.$data,'GET',$sessionId,'',array());
}
	
//curl	
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
