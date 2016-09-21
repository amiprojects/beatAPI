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
<script src="js/leaderboard.js"></script>

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
			<div style="width: 100%; height: 5px; float: left;"></div>
			<div
				style="width: 100%; height: auto; float: left; text-align: center; /*border-bottom: 1px solid #e4e4e4;*/ border-top: 1px solid #e4e4e4;">
				<img style="padding-top: 6px;" src="images/logo.png">
			</div>

			<!--for header menu-->
			<div
				style="width: 100%; height: auto; float: left; border-top: 1px solid #e4e4e4; border-bottom: 1px solid #e4e4e4; padding-top: 15px; padding-bottom: 15px;">
				<div style="width: 20%; height: 1px; float: left;"></div>
				<div style="width: 60%; height: auto; float: left;">
					<div style="width: 100%; height: auto; float: left;">

						<div style="width: 33.33%; height: auto; float: left; text-align: right;">
							<a href="index.html" style="text-decoration: none;">
								<span style="font-size: 11pt; color: #8c8c8c; font-family: OpenSans;">
									<strong>ABOUT</strong>
								</span>
							</a>
						</div>

						<div style="width: 33.33%; height: auto; float: left; text-align: center;">
							<span style="font-size: 11pt; font-family: OpenSans; color: #8c8c8c">
								<strong>RESULTS</strong>
							</span>
						</div>

						<div style="width: 33.33%; height: auto; float: left; text-align: left;">
							<a href="leaderboard.php" style="text-decoration: none;">
								<span style="font-size: 11pt; font-family: OpenSans; color: #d16a39">
									<strong>LEADERBOARD</strong>
								</span>
							</a>
						</div>

					</div>
				</div>
				<div style="width: 20%; height: 1px; float: left;"></div>
			</div>
		</div>


		<div data-role="main">
			<div style="width: 64%; float: left; padding: 30px 18%;">
				<div style="width: 100%; float: left;">
					<hr
						style="width: 30%; float: left; height: 2px; margin-top: 13px; background-color: #0089c7; border: none; border-color: #0089c7;">
					<div
						style="width: 40%; float: left; text-align: center; color: #0089c7; font-weight: bold; font-size: 2vw;">
						WEEKLY LEADERBOARD</div>
					<hr
						style="width: 30%; float: left; height: 2px; margin-top: 13px; background-color: #0089c7; border: none; border-color: #0089c7;">
				</div>

				<div
					style="width: 100%; float: left; padding: 50px 0%; border-bottom: 1px solid #e4e4e4;"
					id="top3score">
					<!--<div style="width: 32.33%;float:left;">
						<div style="width: 200px;float: left;margin-bottom: 20px;background: url('images/position.png');background-size: 100% 100%;min-height: 200px;min-width: 200px;background-repeat: no-repeat;">
							<img src="images/1st_batch.png" style="width: 230px;float: left;position: absolute;z-index: 2;top: 24.5%;">
						</div>
						<div style="width: 100%; float: left;text-align: center;">
							<div style="width: 100%; float: left;color: #0089c7; font-weight: bold; font-size: 16px; text-transform: uppercase;">
								678 HITS
							</div>
							<div style="width: 100%;float: left;color: #000;font-size: 15px;text-transform: uppercase;padding-top: 5px;">
								John Lemon
							</div>
						</div>
					</div>
					<div style="width: 31.33%;float:left;padding:0% 1%;">
						<div style="width: 100%;float: left;margin-bottom: 20px;">
							<img src="images/position.png" style="width: 90%; border: 1px solid #e4e4e4;margin: 0% 5%;">
						</div>
						<div style="width: 100%; float: left;text-align: center;">
							<div style="width: 100%; float: left;color: #0089c7; font-weight: bold; font-size: 16px; text-transform: uppercase;">
								678 HITS
							</div>
							<div style="width: 100%;float: left;color: #000;font-size: 15px;text-transform: uppercase;padding-top: 5px;">
								John Lemon
							</div>
						</div>
					</div>
					<div style="width: 31.33%;float:left;padding:0% 1%;">
						<div style="width: 100%;float: left;margin-bottom: 20px;">
							<img src="images/position.png" style="width: 90%; border: 1px solid #e4e4e4;margin: 0% 0% 0% 10%;">
						</div>
						<div style="width: 100%; float: left;text-align: center;">
							<div style="width: 100%; float: left;color: #0089c7; font-weight: bold; font-size: 16px; text-transform: uppercase;">
								678 HITS
							</div>
							<div style="width: 100%;float: left;color: #000;font-size: 15px;text-transform: uppercase;padding-top: 5px;">
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


