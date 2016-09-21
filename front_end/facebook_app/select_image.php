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
				style="width: 100%; height: auto; float: left; padding-top: 40px;">
				<div style="width: 30%; height: 1px; float: left;"></div>
				<div
					style="width: 40%; height: auto; float: left; text-align: center;">
					
					<div style="max-width: 1336px!important;top: -207.5px !important;left: -103.5px!important;" data-theme="b" data-role="popup" data-dismissible="false" data-position-to="window" id="camera_pop">
						<div id="my_camera"></div>	
						<input type="button" value="TAKE A SNAPSHOT" onclick="take_snapshot();">				
					</div>
					
					<img style="width: 300px;" src="images/uploade-image-frame.png" id="selfImage">
				</div>
				<div style="width: 30%; height: 1px; float: left;"></div>
			</div>
                        <!--for error msg-->
                        <div id="error_div" style="width:100%;height:auto;float:left;display:none;">
                            <div style="width:35%;height:1px;float:left;"></div>
                            <div style="width:30%;height:auto;float:left;">
                                <span style="color:red">Camera not available! Please connect your camera and try again.</span>
                            </div>
                            <div style="width:35%;height:1px;float:left;"></div>
                        </div>

			<div
				style="width: 100%; height: auto; float: left; /*padding-top: 40px;*/">
				<div style="width: 39%; height: 1px; float: left;"></div>
				<div
					style="width: 22%; height: auto; float: left; text-align: center;">
					<!--<div style="width:100%;height:auto;float:left;">-->
					<div id="camra-upload" style="width: 49.5%; height: auto; float: left; background-color: #008bcb;border-right: 2px solid white;" onclick="uploadCam();">
						<img style="width: 35px; padding-top: 5px;"
							src="images/take_photo.png">
					</div>
					<!--<div style="width: 2%; height: 1px; float: left;"></div>-->
					<div style="width: 49.5%; height: auto; float: left; background-color: #008bcb;" onclick="upload();">
						 
						<img style="width: 35px; padding-top: 5px;"
							src="images/upload.png">
					</div>
					<!--</div>-->
				</div>
				<div style="width: 39%; height: 1px; float: left;"></div>
			</div>

			<div style="width: 100%; height: 20px; float: left;"></div>

                        <div style="width:100%;height:auto;float:left;">
                            <div style="width:43%;height:1px;float:left;"></div>
                            <div onclick="uploadUserImage();" style="width: 14%;height:auto;float:left;/* background-color: #008bcb; */color: white;text-align: center;">
                                <div style="width:100%;height:20%;float:left;"></div>
                                <div style="width: 94%;/* height:60%; */float:left;background-color: #cd5b1c;padding: 3%;/* margin: 0%; */margin-bottom: 20px;">
                                   <span>Next</span>
                                </div>
                                <div style="width:100%;height:20%;float:left;"></div>

                            </div>
                            <div style="width:43%;height:1px;float:left;"></div>
                        </div>


		</div>
	</div>
<input type='file' id="imgInp" onchange="uploadImage(this)" style="display: none;"/>

<input type="hidden" id="userId" value="<?php echo $_SESSION["userDetails"]["userId"] ?>"/>
</body>
</html>
