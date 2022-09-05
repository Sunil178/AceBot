<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['ipv4']) && isset($_POST['ipv6'])) {
        $ipv4 = $_POST['ipv4'];
        $ipv6 = $_POST['ipv6'];

        include('db.php');
        $query = "SELECT id FROM device_details where ipv4 = '".$ipv4."' OR ipv6 = '" . $ipv6 . "'";
        $mobile_data = $conn->query($query);

        $response = [];
        if ($mobile_data) {
                if ($mobile_data->num_rows > 0) {
                   $response['code'] = false;
                } else {
                   $response['code'] = true;
                }
        }
        else
           $response['code'] = true;
        $conn->close();
        echo json_encode($response);
}
?>

