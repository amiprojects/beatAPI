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
<body>
	<div data-role="page" data-theme="c">
		<div data-role="header" data-tap-toggle="false">
			<div
				style="width: 100%; height: auto; float: left; border-bottom: 1px solid #b3ddf3;">
				<div style="width: 50%; height: 80px; float: left;">
					<div style="width: 100%; height: auto; float: left;">
						<div style="width: 5%; height: 1px; float: left;"></div>

						<div style="width: 95%; height: 1px; float: left;">
							<img src="images/logo.png">
						</div>

					</div>
				</div>
				<div style="width: 50%; height: 80px; float: left;">
					<div
						style="width: 100%; height: auto; float: left; position: relative; top: 25px;">
						<div style="width: 5%; height: 1px; float: left;"></div>
						<div
							style="width: 26.66%; height: auto; float: left; font-family: HelveticaNeue; text-align: center;">
							<a href=""
								style="text-decoration: none; color: #008ac8; font-weight: bold; font-size: 13px;">ABOUT</a>
						</div>
						<div style="width: 5%; height: 1px; float: left;"></div>
						<div
							style="width: 26.66%; height: auto; float: left; font-family: HelveticaNeue; text-align: center;">
							<a href=""
								style="text-decoration: none; color: #848484; font-size: 13px;">RESULTS</a>
						</div>
						<div style="width: 5%; height: 1px; float: left;"></div>
						<div
							style="width: 26.66%; height: auto; float: left; font-family: HelveticaNeue; text-align: center;">
							<a href=""
								style="text-decoration: none; color: #848484; font-size: 13px;">LEADERBOARD</a>
						</div>
						<div style="width: 5%; height: 1px; float: left;"></div>
					</div>
				</div>

			</div>
		</div>


		<div data-role="main">
			<div
				style="width: 100%; height: 35px; float: left; padding-top: 5px;">
				<div style="width: 30%; height: 1px; float: left;"></div>
				<div
					style="width: 40%; height: 35px; float: left; text-align: center; color: red;">
					<strong><span id="hitTimer">60</span></strong>
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
						<span style="font-size: 3.2vw;">SHARE</span>
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


