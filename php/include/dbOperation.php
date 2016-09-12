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