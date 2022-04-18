<?php

$token = 'eyJhbGciOiJSUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2Njg4MjgwOTYsImlhdCI6MTYzNzI5MjA5NiwicmF5IjoiMzA2NzAxNDc4ZjJkNzFmZjU2YTgyYzBlMTZkMmIyZTYiLCJzdWIiOjgxMzg1MX0.Qz3uP21cuo0PBaqNvnqKwNkiOg1TOLTgeGeVnEmW50cyWRrec6T_EUqTTPrXMcGXfd_rJJtGTQH6mmIvuIE5ZTqBdOfo3X0JD8IQ__lxXJJSwaVMKhE-gPMnCUxnISc1n7uhev8HgPSWVG6K5X3sdBCbMgiMrOe8qM4MaF7Op4l5YfAtns4whZnt_YIolIK49VBckKrC_XC5eDcZytzLUjUCboCwE54UihLCnbNf-zahTHwUVf2PdoPue6zVWH4R-TlfqDqKWvBTRpHM4uN0yTz0sUvkc8H5fo4W9r-BBsz6MxT6F7XzdgbROwohQi_li3GUmNL19okFh3f7u78aJg';

$ch = curl_init();

$id = $_GET['order_id'];

curl_setopt($ch, CURLOPT_URL, 'https://5sim.net/v1/user/finish/' . $id);
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
 
echo json_encode($result);
exit;
?>
