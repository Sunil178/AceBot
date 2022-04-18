<?php

	if (isset($_GET['code'])) {
		$code = $_GET['code'];
		if ($code == 5232) {
			include('db.php');
			$proxies = "SELECT * FROM proxies";
			$proxies = $conn->query($proxies);

			$json = [];
			$response = [];
			if ($proxies->num_rows > 0) {
				while($row = mysqli_fetch_assoc($proxies)){
				     $json[] = $row;
				}
				$response['status'] = 200;
				$response['proxies'] = $json;
			} else {
			  $response['status'] = 404;
			}
			$conn->close();
		}
		else
			$response['status'] = 401;
	}
	else
		$response['status'] = 400;
	echo json_encode($response);

?>
