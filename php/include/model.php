<?php
class users {
	public $id;
	public $facebook_user_id;
	public $name;
	public $access_token;
}
class hit_counter {
	public $id;
	public $user_id;
	public $user_image_id;
	public $left_hit_count;
	public $right_hit_count;
	public $total_hit_count;
	public $date_time;
}
class user_image {
	public $id;
	public $user_id;
	public $user_image_url;
	public $date_time;
}
class temp {
}
?>