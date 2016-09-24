<?php
require_once 'AnimGif.php';
require_once 'MargeImage.php';

class gifmaker {
	function saveGIF($user_image_url,$number_of_hits) {
		$mi=new MargeImage();
		$response = array ();
		try {
			$user_image_url=str_replace("php", "..", $user_image_url);
			$user_image_url=str_replace("beat", ".", $user_image_url);
				
			$frames = array ($mi->createimageinstantly("./../assets/frame_images/animated-frame1.png",$user_image_url,$number_of_hits),
					$mi->createimageinstantly("./../assets/frame_images/animated-frame2.png",$user_image_url,$number_of_hits),
					$mi->createimageinstantly("./../assets/frame_images/animated-frame3.png",$user_image_url,$number_of_hits),
					$mi->createimageinstantly("./../assets/frame_images/animated-frame4.png",$user_image_url,$number_of_hits) 
			);
			
			$anim = new GifCreator\AnimGif ();
			
			$time=1500/$number_of_hits;
			
			$anim->create ( $frames, array (
					$time,
					$time,
					$time,
					$time 
			),($number_of_hits/4));
			
			$gif = $anim->get ();
			$filename = uniqid ();
			$path = "./../assets/download_gif/" . $filename . ".gif";
			$anim->save ( $path );
			$response ["error"] = false;
			$response ["gif_url"] = "beat/php/assets/download_gif/" . $filename . ".gif";
		} catch ( Exception $e ) {
			$response ["error"] = true;
			$response ["msg"] = "Image: " . $e->getMessage ();
		}		
		return $response;
	}
}
?>