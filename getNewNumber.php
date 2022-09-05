<?php

 


function getOperatorWiseNumber($product, $operator){

		$token = 'eyJhbGciOiJSUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2Njg4MjgwOTYsImlhdCI6MTYzNzI5MjA5NiwicmF5IjoiMzA2NzAxNDc4ZjJkNzFmZjU2YTgyYzBlMTZkMmIyZTYiLCJzdWIiOjgxMzg1MX0.Qz3uP21cuo0PBaqNvnqKwNkiOg1TOLTgeGeVnEmW50cyWRrec6T_EUqTTPrXMcGXfd_rJJtGTQH6mmIvuIE5ZTqBdOfo3X0JD8IQ__lxXJJSwaVMKhE-gPMnCUxnISc1n7uhev8HgPSWVG6K5X3sdBCbMgiMrOe8qM4MaF7Op4l5YfAtns4whZnt_YIolIK49VBckKrC_XC5eDcZytzLUjUCboCwE54UihLCnbNf-zahTHwUVf2PdoPue6zVWH4R-TlfqDqKWvBTRpHM4uN0yTz0sUvkc8H5fo4W9r-BBsz6MxT6F7XzdgbROwohQi_li3GUmNL19okFh3f7u78aJg';


		$ch = curl_init();
		$country = 'india';
		
		curl_setopt($ch, CURLOPT_URL, 'https://5sim.net/v1/user/buy/activation/' . $country . '/' . $operator . '/' . $product);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


		$headers = array();
		$headers[] = 'Authorization: Bearer ' . $token;
		$headers[] = 'Accept: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	    $result = curl_exec($ch);
	    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}

		curl_close($ch);

		$result1 = json_decode($result,true);

		$phone = $result1['phone'];
		$product = $result1['product'];
		$order_id = $result1['id'];

		$mobile_exists = check_number_exist($phone);

		if($mobile_exists == 1){
			cancel_order($order_id);
			$result1 = getOperatorWiseNumber("jungleerummy","virtual21");
			return $result1;
		}else{

			save_mobile_date($product,$phone);
			return [$result,$httpcode];

		}

        


}


function cancel_order($order_id){

		$token = 'eyJhbGciOiJSUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2Njg4MjgwOTYsImlhdCI6MTYzNzI5MjA5NiwicmF5IjoiMzA2NzAxNDc4ZjJkNzFmZjU2YTgyYzBlMTZkMmIyZTYiLCJzdWIiOjgxMzg1MX0.Qz3uP21cuo0PBaqNvnqKwNkiOg1TOLTgeGeVnEmW50cyWRrec6T_EUqTTPrXMcGXfd_rJJtGTQH6mmIvuIE5ZTqBdOfo3X0JD8IQ__lxXJJSwaVMKhE-gPMnCUxnISc1n7uhev8HgPSWVG6K5X3sdBCbMgiMrOe8qM4MaF7Op4l5YfAtns4whZnt_YIolIK49VBckKrC_XC5eDcZytzLUjUCboCwE54UihLCnbNf-zahTHwUVf2PdoPue6zVWH4R-TlfqDqKWvBTRpHM4uN0yTz0sUvkc8H5fo4W9r-BBsz6MxT6F7XzdgbROwohQi_li3GUmNL19okFh3f7u78aJg';

		$ch = curl_init();
	
		$id = $order_id;

		curl_setopt($ch, CURLOPT_URL, 'https://5sim.net/v1/user/cancel/' . $id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


		$headers = array();
		$headers[] = 'Authorization: Bearer ' . $token;
		$headers[] = 'Accept: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);

		if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);

		return true;


}

		function check_number_exist($mobile){


		include('db.php');
		$select_mobile = "SELECT mobile FROM mobile_numbers where mobile = '".$mobile."'";
		$mobile_data = $conn->query($select_mobile);

		if ($mobile_data->num_rows > 0) {
		  
		   return 1;
		} else {
		  return 2;
		}
		$conn->close();


		}


		function save_mobile_date($product,$phone)
		{
			
		 	include('db.php');

		 	date_default_timezone_set('Asia/Kolkata');
            $date = date('y-m-d H:i:s');

		 	$sql = "INSERT INTO mobile_numbers (product, mobile, date_created)
			VALUES ('".$product."', '".$phone."', '".$date."')";

			if ($conn->query($sql) === TRUE) {
			  //echo "inserted";
			} else {
			  //echo false;
			}
           return true;
			$conn->close();
		}


  
		 
		$result1 = getOperatorWiseNumber("jungleerummy","virtual31");

	 	$result = json_encode($result1[0]);
	 	//$result = str_replace("\"","",$result);
	    $http_code= json_encode($result1[1]);

	    if (strpos($result, "no free phones") !== false) {
	    	//echo "3";

	    	echo false;
	    	exit;
	    }else if($http_code == 400){

	    	//echo "10";
		 	echo false;
		 	exit;

		 }else{
				

				echo $result;



			 }


?>
