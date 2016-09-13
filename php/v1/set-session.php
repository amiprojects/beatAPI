<?php
session_start ();
header ( "Access-Control-Allow-Origin: *" );
header ( "Access-Control-Allow-Credentials: 1" );
header ( 'content-type: application/json; charset=utf-8' );
$response = array ();
$_SESSION ["userDetails"] = $_REQUEST;

if (! isset ( $_SESSION ["userDetails"] ["userId"] )) {
	
	$response ["error"] = true;
} else {
	$response ["error"] = false;
	$response ["userId"] = $_SESSION ["userDetails"] ["userId"];
}

echo json_encode ( $response );

?>