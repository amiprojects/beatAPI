<?php
session_start();
header('Content-Type: application/json');
$response = array();
$_SESSION["userDetails"] = $_REQUEST;

if (!isset($_SESSION["userDetails"]["userId"])) {
	
	$response["error"] = true;

} else {
$response["error"] = false;
$response["userId"]=$_SESSION["userDetails"]["userId"];
}

echo json_encode($response);

?>