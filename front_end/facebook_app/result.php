<?php
session_start ();
?>

<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facebook App</title>
<link rel="stylesheet"
	href="js/jqueryMobile/jquery.mobile-1.4.5.min.css" />
<script src="js/url.js"></script>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jqueryMobile/jquery.mobile-1.4.5.min.js"></script>
<script src="js/result.js"></script>

<style>
body {
	background-image: url("images/BG_img.png");
}
</style>
</head>


<!-- for share function -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7&appId=189138751495606";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




<body>
	<div data-role="page" data-theme="c">
		<div data-role="header" data-tap-toggle="false">
			<!--for logo-->
            <div style="width:100%;height:5px;float:left;"></div>
            <div style="width:100%;height:auto;float:left;text-align: center;/*border-bottom: 1px solid #e4e4e4;*/border-top: 1px solid #e4e4e4;">
            	<img style="padding-top: 6px;" src="images/logo.png">
            </div>
            
            <!--for header menu-->
            <div style="width:100%;height:auto;float:left;border-top: 1px solid #e4e4e4;border-bottom: 1px solid #e4e4e4;padding-top: 15px;padding-bottom: 15px;">
            	<div style="width:20%;height:1px;float:left;"></div>
                <div style="width:60%;height:auto;float:left;">
                	<div style="width:100%;height:auto;float:left;">
                    	
                        <div style="width:33.33%;height:auto;float:left;text-align: right;"><span style="font-size:11pt;color:#d16a39;font-family:OpenSans;"><strong>ABOUT</strong></span></div>
                       
                        <div style="width:33.33%;height:auto;float:left;text-align: center;"><span style="font-size:11pt;font-family:OpenSans;color:#8c8c8c"><strong>RESULTS</strong></span></div>
                        
                        <div style="width:33.33%;height:auto;float:left;text-align: left;"><span style="font-size:11pt;font-family:OpenSans;color:#8c8c8c"><strong>LEADERBOARD</strong></span></div>
                        
                    </div>
                </div>
                <div style="width:20%;height:1px;float:left;"></div>
            </div>
		</div>


		<div data-role="main">
			<div
				style="width: 100%; height: 35px; float: left; padding-top: 5px;">
				<div style="width: 30%; height: 1px; float: left;"></div>
				<div
					style="width: 40%; height: 35px; float: left; text-align: center; color: red;">
					<strong><span id="hitTimer">15</span></strong>
				</div>
				<div style="width: 30%; height: 1px; float: left;"></div>
			</div>

			<div
				style="width: 100%; height: auto; float: left; padding-top: 0px;">
				<div style="width: 30%; height: 1px; float: left;"></div>
				<div
					style="width: 40%; height: auto; float: left; text-align: center;">
					<!-- <img style="width: 100%;" src="images/upload_img.png">-->
					<img style="width: 100%;" src="images/upload_img.png" id="selfImage">
				</div>
				<div style="width: 30%; height: 1px; float: left;"></div>
			</div>

			<div
				style="width: 100%; height: auto; float: left; padding-top: 40px;">
				<div style="width: 30%; height: 1px; float: left;"></div>
				<div
					style="width: 40%; height: auto; float: left; text-align: center;">
					<!--<img style="width: 68%;" src="images/upload_img.png">-->
					<div style="width: 100%; height: auto; float: left;">
						<div style="width: 32%; height: auto; float: left;"
							onclick="leftHitFunction();">
							<img style="width: 100%;" src="images/left_hand.png">
						</div>


						<div
							style="width: 32%; height: auto; float: left; font-size: 4vw;">
							<div style="width: 100%; height: 10%; float: left;"></div>

							<div
								style="width: 100%; height: 80%; float: left; border: 2px solid black; border-radius: 15%;">
								<div
									style="width: 100%; height: 60%; float: left; text-align: center;">
									<strong><span id="totalHit">0</span></strong>
								</div>
								<div
									style="width: 100%; height: 40%; float: left; text-align: center;">
									<span>HITS</span>
								</div>
							</div>

							<div style="width: 100%; height: 10%; float: left;"></div>
						</div>


						<div style="width: 32%; height: auto; float: left;"
							onclick="rightHitFunction();">
							<img style="width: 100%;" src="images/right_hand.png">
						</div>
					</div>
				</div>
				<div style="width: 30%; height: 1px; float: left;"></div>
			</div>


			<div
				style="width: 100%; height: auto; float: left; padding-top: 35px;">
				<div style="width: 30%; height: 1px; float: left;"></div>
				<div style="width: 40%; height: auto; float: left;">
					<div style="width: 10%; height: 1px; float: left;"></div>
					<div
						style="width: 80%; height: 1px; float: left; text-align: center;">
						<span>Join me to learn the steps to keep diabetes in check</span>
					</div>
					<div style="width: 10%; height: 1px; float: left;"></div>
				</div>
				<div style="width: 30%; height: 1px; float: left;"></div>
			</div>

			<div
				style="width: 100%; height: auto; float: left; padding-top: 115px;">
				<div style="width: 30%; height: 1px; float: left;"></div>
				<div style="width: 40%; height: auto; float: left;">
					<!--<div style="width:100%;height:auto;float:left;">-->
					<div
						style="width: 50%; height: auto; float: left; background-color: #006ea0; color: white; text-align: center;">
						
						  <div style="font-size: 3.2vw;" class="fb-share-button" data-href="https://www.assaisolutions.com/beat/front_end/facebook_app/" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a style="text-decoration:none;color:white;" class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.assaisolutions.com%2Fbeat%2Ffront_end%2Ffacebook_app%2F&amp;src=sdkpreparse">Share</a></div>
						  
					</div>
					<div
						style="width: 50%; height: auto; float: left; background-color: #0089c8; color: white; text-align: center;">
						<span style="font-size: 3.2vw;">DOWNLOAD</span>
					</div>
					<!--</div>-->
				</div>
				<div style="width: 30%; height: 1px; float: left;"></div>
			</div>

		</div>

	</div>

	<input type="hidden" id="userId"
		value="<?php echo $_SESSION["userDetails"]["userId"] ?>" />

</body>
</html>


