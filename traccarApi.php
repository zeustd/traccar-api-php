<?php
class traccar {

	public static $host = 'http://127.0.0.1:8082';
	public static $cookie;
	private static $adminEmail = 'admin';
	private static $adminPassword = 'admin';
	private static $jsonA = 'Accept: application/json';
	private static $jsonC = 'Content-Type: application/json';
	private static $urlencoded = 'Content-Type: application/x-www-form-urlencoded';

	public static function loginAdmin() {

		return self::login(self::$adminEmail, self::$adminPassword);
	}

	public static function addUser($cookie, $name, $email, $password, $attributes) {

		$id = '-1';
		$name = $name;
		$email = $email;
		$readonly = 'false';
		$admin = 'false';
		$map = '';
		$latitude = '0';
		$longitude = '0';
		$zoom = '0';
		$password = $password;
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

		$data = '{"id":"' . $id . '","name":"' . $name . '","email":"' . $email . '","readonly":"' . $readonly . '","admin":"' . $admin . '","map":"' . $map . '","latitude":"' . $latitude . '","longitude":"' . $longitude . '","zoom":"' . $zoom . '","password":"' . $password . '","twelveHourFormat":"' . $twelveHourFormat . '","coordinateFormat":"' . $coordinateFormat . '","disabled":"' . $disabled . '","expirationTime":"' . $expirationTime . '","deviceLimit":"' . $deviceLimit . '","userLimit":"' . $userLimit . '","deviceReadonly":"' . $deviceReadonly . '","limitCommands":"' . $limitCommands . '","token":"' . $token . '","attributes":' . $attributes . '}';

		return self::curl('/api/users', 'POST', $cookie, $data, array(self::$jsonC));
	}

	public static function updateUser($cookie, $id, $name, $email, $password, $attributes) {

		$id = $id;
		$name = $name;
		$email = $email;
		$password = $password;
		$attributes = '{}';
		$admin = "false";
		$coordinateFormat = "0";
		$deviceLimit = "-1";
		$deviceReadonly = "false";
		$disabled = "false";
		$expirationTime = "";
		$latitude = "0";
		$limitCommands = "false";
		$login = "";
		$longitude = "0";
		$map = "";
		$phone = "";
		$poiLayer = "";
		$readonly = "false";
		$token = "";
		$twelveHourFormat = "false";
		$userLimit = "-1";
		$zoom = "0";

		$data = '{"id":"' . $id . '","name":"' . $name . '","email":"' . $email . '","admin":"' . $admin . '","coordinateFormat":"' . $coordinateFormat . '","deviceLimit":"' . $deviceLimit . '","deviceReadonly":"' . $deviceReadonly . '","disabled":"' . $disabled . '","expirationTime":"' . $expirationTime . '","latitude":"' . $latitude . '","limitCommands":"' . $limitCommands . '","login":"' . $login . '","longitude":"' . $longitude . '","map":"' . $map . '","phone":"' . $phone . '","poiLayer":"' . $poiLayer . '","readonly":"' . $readonly . '","token":"' . $token . '","twelveHourFormat":"' . $twelveHourFormat . '","userLimit":"' . $userLimit . '","zoom":"' . $zoom . '","password":"' . $password . '","attributes":' . $attributes . '}';

		return self::curl('/api/users/' . $id, 'PUT', $cookie, $data, array(self::$jsonC));
	}

	public static function addDevice($cookie, $name, $uniqueId, $phone, $model, $category, $attributes) {

		$id = '-1';
		$attributes = $attributes;

		$data = '{"id":"' . $id . '","name":"' . $name . '","uniqueId":"' . $uniqueId . '","phone":"' . $phone . '","model":"' . $model . '","category":"' . $category . '","attributes":' . $attributes . '}';

		return self::curl('/api/devices', 'POST', $cookie, $data, array(self::$jsonC));
	}

	public static function assignUserDevice($cookie, $userId, $deviceId) {

		$data = '{"userId":"' . $userId . '","deviceId":' . $deviceId . '}';

		return self::curl('/api/permissions', 'POST', $cookie, $data, array(self::$jsonC));
	}

	public static function deleteUserDevice($cookie, $userId, $deviceId) {

		$data = '{"userId":"' . $userId . '","deviceId":' . $deviceId . '}';

		return self::curl('/api/permissions', 'DELETE', $cookie, $data, array(self::$jsonC));
	}

	public static function server() {

		return self::curl('/api/server?' . $data, 'GET', $cookie, '', array());
	}

	public static function login($email, $password) {

		$data = 'email=' . $email . '&password=' . $password;

		return self::curl('/api/session', 'POST', '', $data, array(self::$urlencoded));
	}

	public static function session($cookie) {

		return self::curl('/api/session?' . $data, 'GET', $cookie, '', array());
	}

	public static function logout($cookie) {

		return self::curl('/api/session', 'DELETE', $cookie, '', array(self::$urlencoded));
	}

	public static function groups($cookie) {

		return self::curl('/api/groups?' . $data, 'GET', $cookie, '', array());
	}

	public static function addGroups($cookie, $name, $groupId, $attributes) {

		$data = '{"id":-1,"name":"' . $name . '","groupId":"' . $groupId . '","attributes":' . $attributes . '}';

		return self::curl('/api/groups', 'POST', $cookie, $data, array(self::$jsonC));
	}

	public static function updateGroups($cookie, $id, $name, $groupId, $attributes) {

		$data = '{"id":"' . $id . '","name":"' . $name . '","groupId":"' . $groupId . '","attributes":' . $attributes . '}';

		return self::curl('/api/groups/' . $id, 'PUT', $cookie, $data, array(self::$jsonC));
	}

	public static function deleteGroups($cookie, $id) {

		$data = '{"id":"' . $id . '}';

		return self::curl('/api/groups/' . $id, 'DELETE', $cookie, $data, array(self::$jsonC));
	}

	public static function drivers($cookie) {

		return self::curl('/api/drivers?' . $data, 'GET', $cookie, '', array());
	}

	public static function addDrivers($cookie, $name, $uniqueId, $attributes) {

		$data = '{"id":-1,"name":"' . $name . '","uniqueId":"' . $uniqueId . '","attributes":' . $attributes . '}';

		return self::curl('/api/drivers', 'POST', $cookie, $data, array(self::$jsonC));
	}

	public static function updateDrivers($cookie, $id, $name, $uniqueId, $attributes) {

		$data = '{"id":"' . $id . '","name":"' . $name . '","uniqueId":"' . $uniqueId . '","attributes":' . $attributes . '}';

		return self::curl('/api/drivers/' . $id, 'PUT', $cookie, $data, array(self::$jsonC));
	}

	public static function deleteDrivers($cookie, $id) {

		$data = '{"id":"' . $id . '}';

		return self::curl('/api/drivers/' . $id, 'DELETE', $cookie, $data, array(self::$jsonC));
	}

	public static function geofences($cookie) {

		return self::curl('/api/geofences?' . $data, 'GET', $cookie, '', array());
	}
	
	public static function assignDeviceGeofence($cookie, $deviceId, $geofenceId) {

	$data='{"deviceId":"'.$deviceId.'","geofenceId":'.$geofenceId.'}';

	return self::curl('/api/permissions','POST',$cookie ,$data,array(self::$json));
	}

	public static function removeDeviceGeofence($cookie, $deviceId, $geofenceId) {

	$data='{"deviceId":"'.$deviceId.'","geofenceId":'.$geofenceId.'}';

	return self::curl('/api/permissions','DELETE',$cookie ,$data,array(self::$json));
	}

	public static function calendars($cookie) {

		return self::curl('/api/calendars?' . $data, 'GET', $cookie, '', array());
	}

	public static function attributesComputed($cookie) {

		return self::curl('/api/attributes/computed?' . $data, 'GET', $cookie, '', array());
	}

	public static function commandsTypes($cookie) {

		return self::curl('/api/commands/types?' . $data, 'GET', $cookie, '', array());
	}

	public static function commands($cookie) {

		return self::curl('/api/commands?' . $data, 'GET', $cookie, '', array());
	}

	public static function notificationsTypes($cookie) {

		return self::curl('/api/notifications/types?' . $data, 'GET', $cookie, '', array());
	}

	public static function notifications($cookie) {

		return self::curl('/api/notifications?' . $data, 'GET', $cookie, '', array());
	}

	public static function devices($cookie) {

		return self::curl('/api/devices?' . $data, 'GET', $cookie, '', array());
	}

	public static function updateDevice($cookie, $id, $name, $uniqueId, $phone, $category, $model, $contact, $lastUpdate, $geofenceIds, $groupId, $disabled, $attributes) {

		$data = '{"id":"' . $id . '","name":"' . $name . '","uniqueId":"' . $uniqueId . '","phone":"' . $phone . '","category":"' . $category . '","model":"' . $model . '","contact":"' . $contact . '","lastUpdate":"' . $lastUpdate . '","geofenceId":"' . $geofenceId . '","groupId":"' . $groupId . '","disabled":"' . $disabled . '","attributes":' . $attributes . '}';

		return self::curl('/api/devices/' . $id, 'PUT', $cookie, $data, array(self::$jsonC));
	}

	public static function assignDeviceGeofence($cookie, $deviceId, $geofenceId) {

		$data = '{"deviceId":"' . $deviceId . '","geofenceId":' . $geofenceId . '}';

		return self::curl('/api/permissions', 'POST', $cookie, $data, array(self::$jsonC));
	}

	public static function deleteDeviceGeofence($cookie, $deviceId, $geofenceId) {

		$data = '{"deviceId":"' . $deviceId . '","geofenceId":' . $geofenceId . '}';

		return self::curl('/api/permissions', 'DELETE', $cookie, $data, array(self::$jsonC));
	}

	public static function assignDeviceGroup($cookie, $deviceId, $groupId) {

		$data = '{"deviceId":"' . $deviceId . '","groupId":' . $groupId . '}';

		return self::curl('/api/permissions', 'POST', $cookie, $data, array(self::$jsonC));
	}

	public static function deleteDeviceGroup($cookie, $deviceId, $groupId) {

		$data = '{"deviceId":"' . $deviceId . '","groupId":' . $groupId . '}';

		return self::curl('/api/permissions', 'DELETE', $cookie, $data, array(self::$jsonC));
	}

	public static function assignDeviceDriver($cookie, $deviceId, $driverId) {

		$data = '{"deviceId":"' . $deviceId . '","driverId":' . $driverId . '}';

		return self::curl('/api/permissions', 'POST', $cookie, $data, array(self::$jsonC));
	}

	public static function deleteDeviceDriver($cookie, $deviceId, $driverId) {

		$data = '{"deviceId":"' . $deviceId . '","driverId":' . $driverId . '}';

		return self::curl('/api/permissions', 'DELETE', $cookie, $data, array(self::$jsonC));
	}

	public static function positions($deviceId, $from, $to, $id, $cookie) {

		$data = 'deviceId=' . $deviceId . '&from=' . $from . '&to=' . $to;

		return self::curl('/api/positions?' . $data, 'GET', $cookie, '', array());
	}

	public static function reportSummary($deviceId, $from, $to, $cookie) {

		$data = 'deviceId=' . $deviceId . '&from=' . $from . '&to=' . $to;

		return self::curl('/api/reports/summary?' . $data, 'GET', $cookie, '', array());
	}

	public static function reportTrips($deviceId, $from, $to, $cookie) {

		$data = 'deviceId=' . $deviceId . '&from=' . $from . '&to=' . $to;

		return self::curl('/api/reports/trips?' . $data, 'GET', $cookie, '', array());
	}

	public static function reportStops($deviceId, $from, $to, $cookie) {

		$data = 'deviceId=' . $deviceId . '&from=' . $from . '&to=' . $to;

		return self::curl('/api/reports/stops?' . $data, 'GET', $cookie, '', array());
	}

	public static function curl($task, $method, $cookie, $data, $header) {

		$res = new stdClass();
		$res->responseCode = '';
		$res->error = '';
		$header[] = "Cookie: " . $cookie;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, self::$host . $task);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

		if ($method == 'POST' || $method == 'PUT' || $method == 'DELETE') {
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}

		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$data = curl_exec($ch);
		$size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

		if (preg_match('/^Set-Cookie:\s*([^;]*)/mi', substr($data, 0, $size), $c) == 1) self::$cookie = $c[1];
		$res->response = substr($data, $size);

		if (!curl_errno($ch)) {
			$res->responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		} else {
			$res->responseCode = 400;
			$res->error = curl_error($ch);
		}

		curl_close($ch);
		return $res;
	}

}

//DistanceUnits
$km = 0.001;
$mi = 0.000621371;
$nmi = 0.000539957;

//SpeedUnits
$kn = 1;
$kmh = 1.852;
$mph = 1.15078;

//Timeunits
$second = 60;
$minute = 1;
$hour = 3600;

?>
