<?php

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        if (isset($_POST['flag']) && isset($_POST['android_id']) && isset($_POST['ipv4']) && isset($_POST['ipv6']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['device_details'])) {
                $flag = $_POST['flag'];
                $android_id = $_POST['android_id'];
                $ipv4 = $_POST['ipv4'];
                $ipv6 = $_POST['ipv6'];
                $latitude = $_POST['latitude'];
                $longitude = $_POST['longitude'];
                $device_details = $_POST['device_details'];

                include('db.php');
                date_default_timezone_set('Asia/Kolkata');
            $date = date('y-m-d H:i:s');

                $sql = "INSERT INTO device_details (flag, android_id, ipv4, ipv6, latitude, longitude, device_details, time)
                VALUES ('$flag', '$android_id', '$ipv4', '$ipv6', '$latitude', '$longitude', '$device_details', '$date') ON DUPLICATE KEY UPDATE time = '$date'";

                if ($conn->query($sql) === true) {
                  echo 'inserted';
                } else {
                  echo 'false';
                }
                $conn->close();
        }
        else
        echo 'invalid inputs';

