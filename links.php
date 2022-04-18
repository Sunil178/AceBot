<?php

	include('db.php');
	$links = "SELECT * FROM tracking_links";
	$links = $conn->query($links);

	$json = [];
	$response = [];
	if ($links->num_rows > 0) {
		while($row = mysqli_fetch_assoc($links)){
		     $json[] = $row;
		}
		$response['status'] = 200;
		$response['links'] = $json;
	} else {
	  $response['status'] = 404;
	}
	$conn->close();
	echo json_encode($response);

?>
