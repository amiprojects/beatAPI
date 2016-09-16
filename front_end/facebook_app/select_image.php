<?php 
session_start();
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
<script src="js/webcam.min.js"></script>
<script src="js/jquery.facedetection.min.js"></script>

<script src="js/selectImage.js"></script>

<style>
body {
	background-image: url("images/BG_img.png");
}
.face {
    position: absolute;
    border: 2px solid red;
}

.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(images/ajax-loader.gif) center no-repeat rgba(255, 255, 255, .4);
}
</style>
</head>
<body>
<div class="se-pre-con" style="display: none;"></div>
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
				style="width: 100%; height: auto; float: left; padding-top: 40px;">
				<div style="width: 30%; height: 1px; float: left;"></div>
				<div
					style="width: 40%; height: auto; float: left; text-align: center;">
					
					<div data-theme="b" data-role="popup" data-dismissible="false" data-position-to="window" id="camera_pop">
						<div id="my_camera"></div>	
						<input type="button" value="TAKE A SNAPSHOT" onclick="take_snapshot();">				
					</div>
					
					<img onclick="uploadUserImage();" style="width: 68%;" src="images/upload_img.png" id="selfImage">
				</div>
				<div style="width: 30%; height: 1px; float: left;"></div>
			</div>

			<div
				style="width: 100%; height: auto; float: left; padding-top: 40px;">
				<div style="width: 30%; height: 1px; float: left;"></div>
				<div
					style="width: 40%; height: auto; float: left; text-align: center;">
					<!--<div style="width:100%;height:auto;float:left;">-->
					<div id="camra-upload"
						style="width: 48%; height: auto; float: left; background-color: #008bcb;" onclick="uploadCam();">
						<img style="width: 35px; padding-top: 5px;"
							src="images/take_photo.png">
					</div>
					<div style="width: 2%; height: 1px; float: left;"></div>
					<div
						style="width: 48%; height: auto; float: left; background-color: #008bcb;" onclick="upload();">
						 
						<img style="width: 35px; padding-top: 5px;"
							src="images/upload.png">
					</div>
					<!--</div>-->
				</div>
				<div style="width: 30%; height: 1px; float: left;"></div>
			</div>

			<div style="width: 100%; height: 20px; float: left;"></div>
		</div>
	</div>
<input type='file' id="imgInp" onchange="uploadImage(this)" style="display: none;"/>

<input type="hidden" id="userId" value="<?php echo $_SESSION["userDetails"]["userId"] ?>"/>
</body>
</html>
