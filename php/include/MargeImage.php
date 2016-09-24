 <?php
	class MargeImage {
		
		/**
		 * marge two image
		 * 
		 * @param unknown $img2        	
		 * @param unknown $img1        	
		 * @return resource
		 */
		function createimageinstantly($img2, $img1,$number_of_hits) {
			$x = 308;
			$y = 610;
			
			// $img1 = './../assets/frame_images/player.png';
			// $img2 = 'animated-frame1.png';
			
			file_get_contents ( $img1 );
			
			$outputImage = imagecreatetruecolor ( 308, 610 );
			
			$white = imagecolorallocate ( $outputImage, 255, 255, 255 );
			imagefill ( $outputImage, 0, 0, $white );
			
			$first = imagecreatefromstring ( file_get_contents ( $img1 ) );
			$second = imagecreatefrompng ( $img2 );
			
			imagecopyresized ( $outputImage, $first, 0, 0, 0, 0, $x, $y, imagesx ( $first ), imagesy ( $first ) );
			imagecopyresized ( $outputImage, $second, 0, 0, 0, 0, $x, $y, $x, $y );
			
			$im = imagecreate(100, 100);
			$white = imagecolorallocate($im, 255, 255, 255);
			$text = 'You have scored '.$number_of_hits.' hits!';
			$font = dirname(__FILE__) . '/arial.ttf';
			imagettftext($outputImage, 15, 0, 10,590, $white, $font, $text);
			
			return $outputImage;
			imagedestroy ( $outputImage );
		}
		
		/**
		 *
		 * @param unknown $filename        	
		 * @throws InvalidArgumentException
		 * @return resource
		 */
		function imagecreatefromfile($filename) {
			$file_info = new finfo ( FILEINFO_MIME );
			$mimetype = $file_info->buffer ( file_get_contents ( $filename ) );
			// echo $mimetype;
			// $mimetype = mime_content_type ( $filename );
			switch ($mimetype) {
				case 'image/jpeg; charset=binary' :
					return imagecreatefromjpeg ( $filename );
					break;
				
				case 'image/png; charset=binary' :
					return imagecreatefrompng ( $filename );
					break;
				
				case 'image/gif; charset=binary' :
					return imagecreatefromgif ( $filename );
					break;
				
				case 'image/bmp; charset=binary' :
					return imagecreatefromwbmp ( $filename );
					break;
				
				default :
					throw new InvalidArgumentException ( 'File "' . $filename . '" is not valid jpg, png or gif image.' );
					break;
			}
		}
	}
	?>