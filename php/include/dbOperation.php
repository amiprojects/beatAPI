<?php
require_once dirname ( __FILE__ ) . '/DbConnect.php';
require_once dirname ( __FILE__ ) . '/gifmaker.php';

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
				
				if (($stmt->insert_id) == 0) {
					$stmt1 = $this->conn->prepare ( "select id from users where facebook_user_id = ?" );
					$stmt1->bind_param ( "s", $usr->facebook_user_id );
					$stmt1->execute ();
					$stmt1->store_result ();
					$num_rows = $stmt1->num_rows;
					if ($num_rows > 0) {
						$stmt1->bind_result ( $uid );
						$stmt1->fetch ();
						$response ["user_id"] = $uid;
					}
				} else {
					$response ["user_id"] = $stmt->insert_id;
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
	
	
	/*get max user score*/
	
	public function getMaxScoreByUserId($id) {
		$response = array ();		
		
		$sql1 = "select img.user_image_url,hit.total_hit_count from user_image img,hit_counter hit where img.id=hit.user_image_id and hit.total_hit_count=(SELECT MAX(hc.total_hit_count) FROM `hit_counter` hc WHERE hc.user_id=?) and hit.user_id=? and hit.total_hit_count>0;";
		
		$stmt1 = $this->conn->prepare ( $sql1 );
		if ($stmt1) {
			$stmt1->bind_param ( "ii", $id,$id );
			$stmt1->execute ();
			$stmt1->store_result ();
			$num_rows1 = $stmt1->num_rows;
			if ($num_rows1 > 0) {
				$stmt1->bind_result ( $user_image_url, $total_hit_count );
				$result = $stmt1->fetch ();
				
				$response ["error"] = false;
				$response ["msg"] = DATA_FOUND;
				$response ["user_image_url"] = $user_image_url;
				$response ["total_hit_count"] = $total_hit_count;
				
			} else {
				$response ["error"] = true;
				$response ["msg"] = DATA_NOT_FOUND;
			}
		} else {
			$response ["error"] = true;
			$response ["msg"] = QUERY_EXCEPTION;
		}
		return $response;
	}
	
	/**
	 * Get total number of user
	 */
	function getTotalNumberOfUsers() {
		$response = array ();
		$sql = "SELECT COUNT(*) FROM users;";
		$stmt = $this->conn->prepare ( $sql );
		
		if ($stmt) {
			if ($stmt->execute ()) {
				$stmt->store_result ();
				$num_rows = $stmt->num_rows;
				
				if ($num_rows > 0) {
					$stmt->bind_result ( $quantity );
					$stmt->fetch ();
					
					$response ["error"] = false;
					$response ["msg"] = DATA_FOUND;
					$response ["total_user"] = $quantity;
				} else {
					$response ["error"] = true;
					$response ["msg"] = DATA_NOT_FOUND;
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
	
	/**
	 * Insert hit count
	 */
	function insertIntoHitCounter(hit_counter $ht_counter) {
		$response = array ();
		$date = date ( "Y-m-d H:i:s" );
		$this->conn->autocommit ( false );
		$sql = "INSERT INTO hit_counter (user_id,user_image_id, left_hit_count, right_hit_count, total_hit_count, date_time) VALUES (?,?,?,?,?,?);";
		$stmt = $this->conn->prepare ( $sql );
		
		if ($stmt) {
			$stmt->bind_param ( "iiiiis", $ht_counter->user_id, $ht_counter->user_image_id, $ht_counter->left_hit_count, $ht_counter->right_hit_count, $ht_counter->total_hit_count, $date );
			if ($stmt->execute ()) {
				$this->conn->commit ();
				
				$sql1 = "SELECT MAX(total_hit_count) FROM hit_counter where user_id=?;";
				$stmt1 = $this->conn->prepare ( $sql1 );
				$stmt1->bind_param ( "i", $ht_counter->user_id );
				$stmt1->execute ();
				$stmt1->store_result ();
				$stmt1->bind_result ( $max_hit );
				$stmt1->fetch ();
				
				$response ["error"] = false;
				$response ["msg"] = INSERT_SUCCESS;
				$response ["current_hit"] = $ht_counter->total_hit_count;
				$response ["max_hit"] = $max_hit;
			} else {
				$response ["error"] = true;
				$response ["msg"] = INSERT_FAILED;
				$response ["msg_details"] = $this->conn->error;
			}
		} else {
			$response ["error"] = true;
			$response ["msg"] = QUERY_EXCEPTION;
			$response ["msg_details"] = $this->conn->error;
		}
		return $response;
	}
	/**
	 * insert user image
	 *
	 * @param unknown $image        	
	 * @param unknown $userId        	
	 * @return boolean[]|string[]
	 */
	function insertUserImage($image, $userId) {
		$response = array ();
		$this->conn->autocommit ( false );
		$savePath = "../assets";
		$date = Date ( "Y-m-d H:i:s" );
		
		$sql = "INSERT INTO user_image (user_id, date_time) VALUES (?,?);";
		$stmt = $this->conn->prepare ( $sql );
		
		if ($stmt) {
			$stmt->bind_param ( "ss", $userId, $date );
			if ($stmt->execute ()) {
				$last_id = $stmt->insert_id;
				
				$fp = fopen ( $savePath . '/' . $last_id . ".jpg", "wb" );
				fwrite ( $fp, base64_decode ( $image ) );
				fclose ( $fp );
				$imgURL = "beat/php/assets/" . $last_id . ".jpg";
				
				$stmtup = $this->conn->prepare ( "update user_image set user_image_url=? where id=?;" );
				if ($stmtup) {
					$stmtup->bind_param ( "si", $imgURL, $last_id );
					if ($stmtup->execute ()) {
						$this->conn->commit ();
						$response ["error"] = false;
						$response ["msg"] = INSERT_SUCCESS;
						$response ["inserted_id"]=$stmt->insert_id;
						$response ["image_url"] = $imgURL;
					} else {
						$response ["error"] = true;
						$response ["msg"] = "Image " . INSERT_FAILED;
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
	
	/**
	 * Save share image
	 * @param unknown $image
	 * @param unknown $userId
	 * @return boolean[]|string[]
	 */
	function saveShareImage($image, $userId) {
		$response = array ();
		$this->conn->autocommit ( false );
		$savePath = "../assets/";
		$date = Date ( "Y-m-d H:i:s" );
		$filename=uniqid();
		
		try {
			$fp = fopen ( $savePath . 'share_image/' .$userId."_". $filename . ".png", "wb" );
			fwrite ( $fp, base64_decode ( $image ) );
			fclose ( $fp );
			$imgURL = "beat/php/assets/share_image/" . $userId."_". $filename . ".png";
			$response ["error"] = false;
			$response ["image_url"] = $imgURL;
		}catch (Exception $e){
			$response ["error"] = true;
			$response ["msg"] = "Image: " . $e->getMessage();
		}
		
		return $response;
	}
	
	
	function saveGIF($user_image_url, $number_of_hits){
		$gifmaker=new gifmaker();
		return $gifmaker->saveGIF($user_image_url, $number_of_hits);
	}
	
	/**
	 * get top ten hitter in last 7 days
	 */
	function getTopTenHitter() {
		$date = date ( "Y-m-d H:i:s" );
		$beforeSevenDays = date ( 'Y-m-d H:i:s', strtotime ( '-7 days' ) );
		
		$response = array ();
		$sql = "SELECT id, facebook_user_id, name, access_token FROM users;";
		$stmt = $this->conn->prepare ( $sql );
		$temparr = array ();
		$temparr2 = array ();
		
		if ($stmt) {
			if ($stmt->execute ()) {
				$stmt->store_result ();
				$stmt->bind_result ( $id, $facebook_user_id, $name, $access_token );
				$num_rows = $stmt->num_rows;
				
				if ($num_rows > 0) {
					while ( $stmt->fetch () ) {
						$sql1 = "SELECT MAX(total_hit_count), user_image_id FROM hit_counter where user_id=? and date_time>?;";
						$stmt1 = $this->conn->prepare ( $sql1 );
						$stmt1->bind_param ( "is", $id, $beforeSevenDays );
						$stmt1->execute ();
						$stmt1->store_result ();
						$stmt1->bind_result ( $max_hit,$user_image_id );
						$num_rows1 = $stmt1->num_rows;
						$stmt1->fetch ();
						
						$usr = new temp ();
						$usr->id = $id;
						$usr->facebook_user_id = $facebook_user_id;
						$usr->name = $name;
						
						if ($max_hit != null) {
							$usr->max_hit = $max_hit;
						} else {
							$usr->max_hit = 0;
						}
						$usr->user_image_id=$user_image_id;
						
						array_push ( $temparr, $usr );
					}
					
					usort ( $temparr, array (
							$this,
							"descCmp" 
					) );
					
					if (count ( $temparr ) > 10) {
						for($i = 0; $i < 10; $i ++) {
							$usr = new temp ();
							$usr->id = $temparr [$i]->id;
							$usr->facebook_user_id = $temparr [$i]->facebook_user_id;
							$usr->user_image_id=$temparr [$i]->user_image_id;
							$usr->name = $temparr [$i]->name;
							$usr->max_hit = $temparr [$i]->max_hit;
							
							array_push ( $temparr2, $usr );
						}
					} else {
						for($i = 0; $i < count ( $temparr ); $i ++) {
							$usr = new temp ();
							$usr->id = $temparr [$i]->id;
							$usr->facebook_user_id = $temparr [$i]->facebook_user_id;
							$usr->user_image_id=$temparr [$i]->user_image_id;
							$usr->name = $temparr [$i]->name;
							$usr->max_hit = $temparr [$i]->max_hit;
							
							array_push ( $temparr2, $usr );
						}
					}
					
					$response ["error"] = false;
					$response ["msg"] = DATA_FOUND;
					$response ['user'] = $temparr2;
				} else {
					$response ["error"] = true;
					$response ["msg"] = DATA_NOT_FOUND;
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
	
	function getFrameImages(){
		$response=array();
		try {
			$response ["error"] = false;
			
			$response ["frame1"] = base64_encode(file_get_contents("../assets/frame_images/animated-frame1c.png"));
			$response ["frame2"] = base64_encode(file_get_contents("../assets/frame_images/animated-frame2c.png"));
			$response ["frame3"] = base64_encode(file_get_contents("../assets/frame_images/animated-frame3c.png"));
			$response ["frame4"] = base64_encode(file_get_contents("../assets/frame_images/animated-frame4c.png"));
			
		}catch (Exception $e){
			$response ["error"] = true;
			$response ["msg"] = "Image: " . $e->getMessage();
		}
		return $response;
	}
	
	function descCmp($a, $b) {
		if ($a->max_hit == $b->max_hit) {
			return 0;
		}
		return ($a->max_hit > $b->max_hit) ? - 1 : 1;
	}
	
	
}
?>