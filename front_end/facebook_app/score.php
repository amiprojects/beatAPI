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
<!--<link rel="stylesheet" href="css/style.css" />-->
<link rel="stylesheet" href="css/header.css" />
<link rel="stylesheet" href="css/responsive_header.css" />
<link rel="stylesheet" href="css/score.css" />
<link rel="stylesheet" href="css/responsive_score.css" />
    
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
						<strong onclick="openAbtPg();">ABOUT</strong>
					</div>

					<div style="text-align: center;" class="menu_option activePage">
						<strong onclick="openResultPg();">RESULTS</strong>
					</div>

					<div style="text-align: left;" class="menu_option_1">
						<strong onclick="openLdrBrdPg();">LEADERBOARD</strong>
					</div>
				</div>
			</div>
		</div>


		<div data-role="main">
			<div class="topImageDiv">
				<div class="hitDiv">
					<div class="hitCountBGimg">
						<div style="" class="hitCountTagDiv">
						   <div class="totalHit hitNo">25</div>
						   <div class="hitTag">HITS</div>
						</div>
					</div>
				</div>
			</div>
			
			<!--<div class="whenNotPlayedDiv">
				You are not played yet. To start playing click this button
				<div style="width: 100%; float: left; text-align: center; margin-top: 15px;">
					<span class="startPlayBtn" onclick="openGame();">Play Now !</span>
				</div>
			</div>-->
			
			
			<div class="hitPageTitle">
				<b>THANK YOU FOR TAKING THE PLEDGE</b>
			</div>
			<div class="hitPageDesc">
			    You have scored <span><b><span class="totalHit"></span> hits!</b></span> Download your share your pledge and get your loved ones to join in too. Together, we can beat diabetes step by step.
			</div>

			<div class="pageContDiv">
			    <div class="imageContDiv">
					<div class="imgTitleDiv">
						<div class="mainTitleDiv">
							<span style="font-size: 12px;">I PLEDGE TO FIGHT DIABETES</span><br>
							<span style="margin:0;font-size: 18px;"><b>WITH NEW BEAT</b></span>
						</div>
					</div>
					<div class="imageFrameDiv">
						<div id="myImage" class="bgScoreImageDiv"> 
							<img src="images/result-frame.png" class="scoreFrame"/>
						</div>	
					</div>
				</div>
				
				<div class="shrDwnldBtnDiv">
					<div onclick="share();" class="shareBtn">SHARE</div>
					<div onclick="dwnld();" class="downloadBtn">DOWNLOAD</div>
				</div>
			</div>
		</div>
	</div>
    
   
</body>
</html>


