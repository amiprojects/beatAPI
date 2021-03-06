<?php
header ( "Access-Control-Allow-Origin: *" );
header ( "Access-Control-Allow-Credentials: 1" );
header ( 'content-type: application/json; charset=utf-8' );

require_once '../include/Config.php';

require_once '../include/dbOperation.php';
require_once '../include/model.php';
require '.././libs/Slim/Slim.php';

\Slim\Slim::registerAutoloader ();

$app = new \Slim\Slim ();

date_default_timezone_set ( 'Asia/Kolkata' );
global $date;
$date = date ( "Y-m-d" );

$app->get ( '/serverdate', function () use ($app) {
	global $date;
	echoRespnse ( 200, array (
			"date" => $date 
	) );
} );



//gourab api
/*get max user score*/
$app->get ( '/max_score/:id', function ($id) use ($app) {
	$response = array ();
	$obj = new dbOperation ();
	$response = $obj->getMaxScoreByUserId ( $id );
	echoRespnse ( 201, $response );
} );



/**
 * for data inserting or ignoring into users table
 */
$app->post ( '/insert_user', function () use ($app) {
	$response = array ();
	
	verifyRequiredParams ( array (
			'fb_user_id',
			'name',
			'access_token' 
	) );
	
	$fb_user_id = $app->request->post ( 'fb_user_id' );
	$name = $app->request->post ( 'name' );
	$access_token = $app->request->post ( 'access_token' );
	
	$obj = new dboperation ();
	$usr = new users ();
	$usr->facebook_user_id = $fb_user_id;
	$usr->name = $name;
	$usr->access_token = $access_token;
	
	$response = $obj->insertOrIgnoreUsers ( $usr );
	echoRespnse ( 201, $response );
} );

/**
 * total number of users
 */
$app->get ( '/total_user', function () use ($app) {
	$response = array ();
	
	$obj = new dboperation ();
	
	$response = $obj->getTotalNumberOfUsers ();
	echoRespnse ( 201, $response );
} );

/**
 * for data inserting into hit_counter table
 */
$app->post ( '/insert_hitcounter', function () use ($app) {
	$response = array ();
	
	verifyRequiredParams ( array (
			'user_id',
			'user_image_id',
			'left_hit_count',
			'right_hit_count',
			'total_hit_count' 
	) );
	
	$user_id = $app->request->post ( 'user_id' );
	$left_hit_count = $app->request->post ( 'left_hit_count' );
	$right_hit_count = $app->request->post ( 'right_hit_count' );
	$total_hit_count = $app->request->post ( 'total_hit_count' );
	$user_image_id = $app->request->post ( 'user_image_id' );
	
	$obj = new dboperation ();
	$hit_counter = new hit_counter ();
	$hit_counter->user_image_id = $user_image_id;
	$hit_counter->user_id = $user_id;
	$hit_counter->left_hit_count = $left_hit_count;
	$hit_counter->right_hit_count = $right_hit_count;
	$hit_counter->total_hit_count = $total_hit_count;
	
	$response = $obj->insertIntoHitCounter ( $hit_counter );
	echoRespnse ( 201, $response );
} );
/**
 * add user image
 */
$app->post ( '/userImg', function () use ($app) {
	$response = array ();
	verifyRequiredParams ( array (
			'user_image',
			'user_id' 
	) );
	$user_image = $app->request->post ( 'user_image' );
	$user_id = $app->request->post ( 'user_id' );
	$obj = new dboperation ();
	$response = $obj->insertUserImage ( $user_image, $user_id );
	echoRespnse ( 201, $response );
} );

/**
 * insert Share image
 */
$app->post ( '/shareImg', function () use ($app) {
	$response = array ();
	verifyRequiredParams ( array (
			'image',
			'user_id' 
	) );
	$image = $app->request->post ( 'image' );
	$user_id = $app->request->post ( 'user_id' );
	$obj = new dboperation ();
	$response = $obj->saveShareImage ( $image, $user_id );
	echoRespnse ( 201, $response );
} );

/**
 * save gif
 */
$app->post ( '/savegif', function () use ($app) {
	$response = array ();
	verifyRequiredParams ( array (
			'user_image_url',
			'number_of_hits' 
	) );
	
	$user_image_url = $app->request->post ( 'user_image_url' );
	$number_of_hits = $app->request->post ( 'number_of_hits' );
	
	$obj = new dboperation ();
	$response = $obj->saveGIF ( $user_image_url, $number_of_hits );
	echoRespnse ( 201, $response );
} );
/**
 * get top ten hitter in last 7 days
 */
$app->get ( '/top_ten_hitter', function () use ($app) {
	$response = array ();
	
	$obj = new dboperation ();
	
	$response = $obj->getTopTenHitter ();
	echoRespnse ( 201, $response );
} );

/**
 * get frame iamges
 */
$app->get ( '/frame_images', function () use ($app) {
	$response = array ();
	
	$obj = new dboperation ();
	
	$response = $obj->getFrameImages ();
	echoRespnse ( 201, $response );
} );
/**
 * Verifying required params posted or not
 */
function verifyRequiredParams($required_fields) {
	$error = false;
	$error_fields = "";
	$request_params = array ();
	$request_params = $_REQUEST;
	
	// Handling PUT request params
	
	if ($_SERVER ['REQUEST_METHOD'] == 'PUT') {
		$app = \Slim\Slim::getInstance ();
		parse_str ( $app->request ()->getBody (), $request_params );
	}
	
	foreach ( $required_fields as $field ) {
		if (! isset ( $request_params [$field] ) || strlen ( trim ( $request_params [$field] ) ) <= 0) {
			$error = true;
			$error_fields .= constant ( strtoupper ( $field ) ) . ', ';
		}
	}
	
	if ($error) {
		// Required field(s) are missing or empty
		
		// echo error json and stop the app
		
		$response = array ();
		$app = \Slim\Slim::getInstance ();
		$response ["error"] = true;
		$response ["message"] = substr ( $error_fields, 0, - 2 ) . ' required';
		echoRespnse ( 400, $response );
		$app->stop ();
	}
}

/**
 *
 * Echoing json response to client
 *
 *
 *
 * @param String $status_code
 *        	Http response code
 *        	
 * @param Int $response
 *        	Json response
 *        	
 */
function echoRespnse($status_code, $response) {
	$app = \Slim\Slim::getInstance ();
	
	// Http response code
	
	$app->status ( $status_code );
	
	// setting response content type to json
	
	$app->contentType ( 'application/json; charset=utf-8' );
	$app->response->headers->set ( 'Access-Control-Allow-Origin', '*' );
	echo json_encode ( $response );
}

$app->run ();

?>