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
	<link rel="stylesheet" href="css/style.css" />
<script src="js/url.js"></script>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jqueryMobile/jquery.mobile-1.4.5.min.js"></script>
<script src="js/score.js"></script>
<!--<script src="js/score2.js"></script>-->

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
			<div style="width:100%;height:auto;float:left;">
			    <div style="width:100%;height:auto;float:left;text-align:center;">
				    <div style="width:30%;height:10px;float:left;"></div>
				    <div class="hitDiv" style="">
					    <div style="width:200px;height:auto;float:left;background: url('images/hit_count.png');background-size: 100% 100%;background-repeat: no-repeat;min-height: 200px;">
							<div style="width:100%;height:auto;float:left;color:#2d98c8;position: relative;top: 78px;left: -5px;">
							   <div style="width:100%;height:auto;float:left;font-size:25px;" class="totalHit">25</div>
							   <div style="width:100%;height:auto;float:left;font-size:18px;">HITS</div>
							</div>
						</div>
					</div>
				    <div style="width:30%;height:10px;float:left;"></div>
				</div>
			</div>
			<div style="width:100%;height:auto;float:left;text-align:center;font-size:19px;">
				 <b>THANK YOU FOR TAKING THE PLEDGE</b>
			</div>
			<div style="width:95%;height:auto;float:left;text-align:center;font-size:15px;padding: 0px 3%;">
			    You have scored <span><b><span class="totalHit"></span> hits!</b></span> Download your share your pledge and get your loved ones to join in too. Together, we can beat diabetes step by step.
			</div>
			<div style="width:100%;height:20px;float:left;"></div>
			<div style="width:100%;height:auto;float:left;">
			    <div style="width:100%;height:auto;float:left;text-align:center;color:white;">
				    <div style="width:30%;height:10px;float:left;"></div>
				    <div style="width: 40%;height: 50px;float: left;background-color: #2d98c8;min-width: 302px;max-width: 400px;">
							 <span style="font-size: 12px;">I PLEDGE TO FIGHT DIABETES</span><br>
							 <span style="margin:0;font-size: 18px;"><b>WITH NEW BEAT</b></span>
					</div>
					<div style="width:30%;height:10px;float:left;"></div>
				</div>
				<div style="width:100%;height:auto;float:left;">
				     <div style="width:30%;height:10px;float:left;"></div>
				     <div style="width:40%;height:auto;float:left;">
                        <div id="myImage" style="width: 100%;background: url(images/result-player-image.png);background-size: 419px 100%;min-height: 200px;min-width:302px;background-repeat:no-repeat;max-width: 400px;"> 
					           <img style="/* width: 302px; */min-height: 302px;max-width: 400px;" src="images/result-frame.png"/>
					        </div>					 
					 </div>
					 <div style="width:30%;height:10px;float:left;"></div>
				</div>
				<div style="width:100%;height:20px;float:left;"></div>
			</div>
		</div>
	</div>
</body>
</html>


