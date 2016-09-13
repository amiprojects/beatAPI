<?php
session_start();
session_destroy();
header('Content-Type: application/json');
$response = array();

if (isset($_SESSION["userDetails"]["userId"])) {
$response["error"] = false;
$response["msg"]="Logout successful";

} else {
$response["error"] = true;
$response["msg"]="Logout not successful";
}

echo json_encode($response);

?>