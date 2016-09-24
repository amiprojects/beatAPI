<?php
session_start ();
?>

<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facebook App</title>
<link rel="stylesheet" href="js/jqueryMobile/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="css/header.css" />
<link rel="stylesheet" href="css/responsive_header.css" />
<link rel="stylesheet" href="css/leaderboard.css" />

<script src="js/url.js"></script>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jqueryMobile/jquery.mobile-1.4.5.min.js"></script>
<script src="js/leaderboard.js"></script>
<script src="js/change_page.js"></script>

<style>
body {
	background-image: url("images/BG_img.png");
}
</style>
</head>



<body>
	<div data-role="page" data-theme="c">
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

					<div style="text-align: center;" class="menu_option">
						<strong onclick="openResultPg();">RESULTS</strong>
					</div>

					<div style="text-align: left;" class="menu_option_1 activePage">
						<strong onclick="openLdrBrdPg();">LEADERBOARD</strong>
					</div>
				</div>
			</div>
		</div>


		<div data-role="main">
			<div class="leaderboardHeadlineDiv">
				<div class="leaderboardHeadline">
					<hr class="hrLeft">
					<div class="headLine">
						WEEKLY LEADERBOARD
					</div>
					<hr class="hrRight">
				</div>

				<div id="top3score" class="topPlayersDiv">
					<!--<div class="ecahPlayerDiv">
						<div class="ecahPlayerImageDiv">
							<div class="batchContDiv">
								<img src="images/0_b.png" class="batchIcon">
							</div>
							<div class="eachTopPlayerImageDiv">
								<img src="images/position.png" class="eachTopPlayerImage">
							</div>
						</div>

						<div class="ecahPlayerInfoDiv">
							<div class="playerHitInfo">
								678 HITS
							</div>
							<div class="playerInfo">
								John Lemon
							</div>
						</div>
					</div>
					
					<div class="ecahPlayerDiv">
						<div class="ecahPlayerImageDiv">
							<div class="batchContDiv">
								<img src="images/1_b.png" class="batchIcon">
							</div>
							<div class="eachTopPlayerImageDiv">
								<img src="images/position.png" class="eachTopPlayerImage">
							</div>
						</div>

						<div class="ecahPlayerInfoDiv">
							<div class="playerHitInfo">
								678 HITS
							</div>
							<div class="playerInfo">
								John Lemon
							</div>
						</div>
					</div>
					
					<div class="ecahPlayerDiv">
						<div class="ecahPlayerImageDiv">
							<div class="batchContDiv">
								<img src="images/2_b.png" class="batchIcon">
							</div>
							<div class="eachTopPlayerImageDiv">
								<img src="images/position.png" class="eachTopPlayerImage">
							</div>
						</div>

						<div class="ecahPlayerInfoDiv">
							<div class="playerHitInfo">
								678 HITS
							</div>
							<div class="playerInfo">
								John Lemon
							</div>
						</div>
					</div>-->
					
					
				</div>

				<div
					style="width: 100%; float: left; border-bottom: 1px solid #e4e4e4;">
					<div
						style="width: 46%; float: left; padding: 2%; text-align: left; font-weight: bold; color: #0089c7;">
						NAME</div>
					<div
						style="width: 46%; float: left; padding: 2%; text-align: right; font-weight: bold; color: #0089c7;">
						SCORE</div>
				</div>

				<div
					style="width: 100%; float: left; border-bottom: 1px solid #e4e4e4; padding-bottom: 10px;"
					id="top10score">
					<!--<div style="width: 100%; float: left;">
						<div style="width: 46%; float: left; padding: 2%; text-align: left; color: #000;text-transform: uppercase;">
							John Lemon
						</div>
						<div style="width: 46%; float: left; padding: 2%; text-align: right; color: #000;text-transform: uppercase;">
							566 HITS
						</div>
					</div>
					<div style="width: 100%; float: left;">
						<div style="width: 46%; float: left; padding: 2%; text-align: left; color: #000;text-transform: uppercase;">
							John Lemon
						</div>
						<div style="width: 46%; float: left; padding: 2%; text-align: right; color: #000;text-transform: uppercase;">
							566 HITS
						</div>
					</div>
					<div style="width: 100%; float: left;">
						<div style="width: 46%; float: left; padding: 2%; text-align: left; color: #000;text-transform: uppercase;">
							John Lemon
						</div>
						<div style="width: 46%; float: left; padding: 2%; text-align: right; color: #000;text-transform: uppercase;">
							566 HITS
						</div>
					</div>
					<div style="width: 100%; float: left;">
						<div style="width: 46%; float: left; padding: 2%; text-align: left; color: #000;text-transform: uppercase;">
							John Lemon
						</div>
						<div style="width: 46%; float: left; padding: 2%; text-align: right; color: #000;text-transform: uppercase;">
							566 HITS
						</div>
					</div>
					<div style="width: 100%; float: left;">
						<div style="width: 46%; float: left; padding: 2%; text-align: left; color: #000;text-transform: uppercase;">
							John Lemon
						</div>
						<div style="width: 46%; float: left; padding: 2%; text-align: right; color: #000;text-transform: uppercase;">
							566 HITS
						</div>
					</div>
					<div style="width: 100%; float: left;">
						<div style="width: 46%; float: left; padding: 2%; text-align: left; color: #000;text-transform: uppercase;">
							John Lemon
						</div>
						<div style="width: 46%; float: left; padding: 2%; text-align: right; color: #000;text-transform: uppercase;">
							566 HITS
						</div>
					</div>-->
				</div>

			</div>



		</div>

	</div>
</body>
</html>


