<?php

$code = $_GET['start_code'];

if($code == '5232'){

	echo json_encode(true);
} else{

	echo json_encode(false);
}

?>
