<?php
session_start ();
?>

<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facebook App</title>
<link rel="stylesheet"href="js/jqueryMobile/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/header.css" />
<link rel="stylesheet" href="css/responsive_header.css" />
    
<script type="text/javascript" src="js/html2canvas.js"></script>
<script src="js/url.js"></script>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jqueryMobile/jquery.mobile-1.4.5.min.js"></script>
<script src="js/score.js"></script>
<script src="js/change_page.js"></script>

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
<body id="demo321">

	<div data-role="page" data-theme="c">
    <!--<div id="demo321">-->
		<div data-role="header" data-tap-toggle="false">
			<!--for logo-->
			<div class="header_div">
				<img src="images/logo.png" class="header_icon">
			</div>
			<!--for header menu-->
			<div class="header_menu_div">
				<div class="header_menu">
					<div style="text-align: right;" class="menu_option">
						<!--<a href="" style="text-decoration: none; color: #8c8c8c;">-->
							<strong onclick="openAbtPg();">ABOUT</strong>
						<!--</a>-->
					</div>

					<div style="text-align: center;" class="menu_option">
						<strong>RESULTS</strong>
					</div>

					<div style="text-align: left;" class="menu_option_1">
						<!--<a href="leaderboard.php" style="text-decoration: none;" class="activePage">-->
							<strong onclick="openLdrBrdPg();">LEADERBOARD</strong>
						<!--</a>-->
					</div>
				</div>
			</div>
		</div>


		<div data-role="main">
			<div style="width:100%;height:auto;float:left;">
			    <div style="width:100%;height:auto;float:left;text-align:center;">
				    <div style="width:33%;height:10px;float:left;"></div>
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
			<div style="width:50%;height:auto;float:left;text-align:center;font-size:15px;padding: 0px 25%;">
			    You have scored <span><b><span class="totalHit"></span> hits!</b></span> Download your share your pledge and get your loved ones to join in too. Together, we can beat diabetes step by step.
			</div>
			<div style="width:100%;height:20px;float:left;"></div>
			<div style="width:100%;height:auto;float:left;">
			    <div style="width:100%;height:auto;float:left;text-align:center;color:white;">
				        <div style="width:100%;height:auto;float:left;text-align:center;color:white;">
							<div style="width:36%;height:10px;float:left;"></div>
							<div style="width: 310px;height: 50px;float: left;background-color: #2d98c8;min-width: 302px;max-width: 400px;">
									 <span style="font-size: 12px;">I PLEDGE TO FIGHT DIABETES</span><br>
									 <span style="margin:0;font-size: 18px;"><b>WITH NEW BEAT</b></span>
							</div>
							<div style="width:30%;height:10px;float:left;"></div>
						</div>
						<div style="width:100%;height:auto;float:left;">
							 <div style="width:36%;height:10px;float:left;"></div>
							 <div style="width:40%;height:auto;float:left;">
								<div id="myImage" style="width: 100%;background: url(images/result-player-image.png);background-size: 310px 100%;min-height: 200px;min-width:302px;background-repeat:no-repeat;max-width: 400px;"> 
									   <img style=" width: 302px; */min-height: 302px;max-width: 400px;" src="images/result-frame.png"/>
									</div>					 
							 </div>
							 <div style="width:30%;height:10px;float:left;"></div>
				        </div>
				</div>
				
				<div style="width:100%;height:20px;float:left;"></div>
				<div style="width:100%;height:auto;float:left;">
				      <div style="width:28%;height:10px;float:left;padding: 0px 1.5%;"></div>
				      <div style="width:40%;height:auto;float:left;">
					       <div onclick="share();" style="width:50%;height:auto;float:left;"><button class="btn btn-primary">Share</button></div>
					       <div style="width:50%;height:auto;float:left;"><button class="btn btn-primary">Download</button></div>
					  </div>
				      <div style="width:30%;height:10px;float:left;"></div>
				</div>
				<div style="width:100%;height:20px;float:left;"></div>
			</div>
		</div>
	</div>
    
   
</body>
</html>


