<?php 
session_start();
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
<link rel="stylesheet" href="css/select_image.css" />
<link rel="stylesheet" href="css/responsive_select_image.css" />

<script src="js/url.js"></script>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jqueryMobile/jquery.mobile-1.4.5.min.js"></script>
<script src="js/webcam.min.js"></script>
<script src="js/jquery.facedetection.min.js"></script>

<script src="js/selectImage.js"></script>
<script src="js/change_page.js"></script>

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

					<div style="text-align: left;" class="menu_option_1">
						<strong onclick="openLdrBrdPg();">LEADERBOARD</strong>
					</div>
				</div>
			</div>
		</div>


		<div data-role="main">

			<div class="mainDiv">
				<div class="mainFrameImageDiv">
					<div class="mainFrameDiv" id="selfImage_upload">                        
                        <img class="mainFrameImage" src="images/uploade-image-frame.png" id="selfImage">                        
				    </div>
				</div>
				
				<!-- for button div -->
				<div class="button_container">
					<div class="double_btn">
						<div id="camra-upload" class="camera_btn_div" onclick="uploadCam();">
							<img src="images/take_photo.png" class="btn_icon">
							<span class="btn_tag">TAKE A PHOTO</span>
						</div>
						<div onclick="upload();" class="upld_btn_div">
							<img src="images/upload.png" class="btn_icon">
							<span class="btn_tag">UPLOAD</span>
						</div>
					</div>
                    
                    <!--for error msg-->
				<div id="error_div" style="width:100%;height:auto;float:left;display:none;">
					<div style="width:35%;height:1px;float:left;"></div>
					<div style="width:100%;height:auto;float:left;">
						<span style="color:red">Camera not available! Please connect your camera and try again.</span>
					</div>
					<div style="width:35%;height:1px;float:left;"></div>
				</div>
                
                
					
					<div class="single_btn">
						<div class="nxt_btn" onclick="uploadUserImage();">
                            Next
                        </div>
					</div>
				</div>
				
				
			
				<!--for error msg-->
				<!--<div id="error_div" style="width:100%;height:auto;float:left;display:none;">
					<div style="width:35%;height:1px;float:left;"></div>
					<div style="width:30%;height:auto;float:left;">
						<span style="color:red">Camera not available! Please connect your camera and try again.</span>
					</div>
					<div style="width:35%;height:1px;float:left;"></div>
				</div>-->
			</div>
	
		</div>
	</div>
<input type='file' id="imgInp" onchange="uploadImage(this)" style="display: none;"/>

<input type="hidden" id="userId" value="<?php echo $_SESSION["userDetails"]["userId"] ?>"/>
</body>
</html>
