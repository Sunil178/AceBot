<?php

        if (isset($_GET['city'])) {
                $city = $_GET['city'];
                include('db.php');
                $locations = "SELECT location FROM ip_locations where city = '".$city."'";
                $locations = $conn->query($locations);

                $json = [];
                $response = [];
                if ($locations->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($locations)){
                         $json[] = $row;
                    }
                }
                $response['status'] = 200;
                $response['data'] = $json;
                $conn->close();
        }
        else
            $response['status'] = 400;
        echo json_encode($response);

?>

