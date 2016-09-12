<?php
require_once dirname ( __FILE__ ) . '/DbConnect.php';
class dboperation extends DbConnect {
	public $conn;
	public $db;
	
	/**
	 * for Database connection
	 */
	function __construct() {
		// opening db connection
		$this->db = new DbConnect ();
		$this->conn = $this->db->connect ();
	}
	
	/**
	 * Insert User If not exist
	 */
	function insertOrIgnoreUsers(users $usr) {
		$response = array ();
		$this->conn->autocommit ( false );
		$sql = "INSERT ignore INTO users (facebook_user_id, name, access_token) VALUES (?,?,?);";
		$stmt = $this->conn->prepare ( $sql );
		
		if ($stmt) {
			$stmt->bind_param ( "sss", $usr->facebook_user_id, $usr->name, $usr->access_token );
			if ($stmt->execute ()) {
				$this->conn->commit ();
				$response ["error"] = false;
				$response ["msg"] = INSERT_SUCCESS;
				$response ["user_id"] = $stmt->insert_id;
			} else {
				$response ["error"] = true;
				$response ["msg"] = INSERT_FAILED;
			}
		} else {
			$response ["error"] = true;
			$response ["msg"] = QUERY_EXCEPTION;
		}
		return $response;
	}
	
	/**
	 * insert user image
	 * @param unknown $image
	 * @param unknown $userId
	 * @return boolean[]|string[]
	 */
	function insertUserImage($image, $userId) {
		$response = array ();
		$this->conn->autocommit ( false );
		$savePath = "../assets/";
		$date = Date ( "Y-m-d H:i:s" );
		
		$sql = "INSERT INTO user_image (user_id, date_time) VALUES (?,?);";
		$stmt = $this->conn->prepare ( $sql );
		
		if ($stmt) {
			$stmt->bind_param ( "ss", $userId, $date );
			if ($stmt->execute ()) {				
				$last_id = $stmt->insert_id;
				
				$fp = fopen ( $savePath . '/' . $last_id.".jpg", "wb" );
				fwrite ( $fp, base64_decode ( $image ) );
				fclose ( $fp );
				$imgURL = "beat/php/assets/" . $last_id.".jpg";
				
				$stmtup = $this->conn->prepare ( "update user_image set user_image_url=? where id=?;" );
				if ($stmtup) {
					$stmtup->bind_param ( "si", $imgURL, $last_id );
					if ($stmtup->execute ()) {
						$this->conn->commit ();
						$response ["error"] = false;
						$response ["msg"] = INSERT_SUCCESS;
						$response ["image_url"]=$imgURL;
					} else {
						$response ["error"] = true;
						$response ["msg"] = "Image ".INSERT_FAILED;
					}
				} else {
					$response ["error"] = true;
					$response ["msg"] = QUERY_EXCEPTION;
				}				
			} else {
				$response ["error"] = true;
				$response ["msg"] = INSERT_FAILED;
			}
		} else {
			$response ["error"] = true;
			$response ["msg"] = QUERY_EXCEPTION;
		}
		return $response;
	}
}
?>