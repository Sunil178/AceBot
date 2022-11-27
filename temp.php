<?php
	function check_number_exist($mobile) {
		include('db.php');
		$select_mobile = "SELECT mobile FROM mobile_numbers where mobile = '$mobile'";
		$mobile_data = $conn->query($select_mobile);

		$conn->close();
		if ($mobile_data->num_rows > 0) {
			$row = mysqli_fetch_assoc($mobile_data);
			echo $row['mobile'];
		   return true;
		}
		return false;
	}

	echo check_number_exist("+917388055371");

?>