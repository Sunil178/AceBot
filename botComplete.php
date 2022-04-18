<?php

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        if (isset($_GET['android_id'])) {
                $android_id = $_GET['android_id'];
                include('db.php');
                date_default_timezone_set('Asia/Kolkata');
                $date = date('y-m-d H:i:s');

                $sql = "UPDATE device_details SET bot_complete = '1' WHERE android_id = '$android_id'";

                if ($conn->query($sql) === true) {
                  echo 'inserted';
                } else {
                  echo 'false';
                }
                $conn->close();
        }
        else
        echo 'invalid inputs';
