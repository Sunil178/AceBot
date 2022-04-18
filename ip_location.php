<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	if (isset($_GET['device_id']) && isset($_GET['ip']) && isset($_GET['location']) && isset($_GET['city'])) {

		$device_id = $_GET['device_id'];
		$ip = $_GET['ip'];
		$location = $_GET['location'];
		$city = $_GET['city'];

		include('db.php');
	 	date_default_timezone_set('Asia/Kolkata');
	    $date = date('y-m-d H:i:s');

	 	$sql = "INSERT INTO ip_locations (device_id, ip, location, city, time)
		VALUES ('".$device_id."', '".$ip."', '".$location."', '".$city."', '".$date."') ON DUPLICATE KEY UPDATE time = '" . $date . "'";

		if ($conn->query($sql) === TRUE) {
		  echo "inserted";
		} else {
		  echo false;
		}
		$conn->close();
	}
	else
		echo "invalid inputs"

?>
