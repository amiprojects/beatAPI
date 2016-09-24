$(document).ready(function() {});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
			// alert(e.target.result);
			// $('#selfImage').attr('src', e.target.result);
			$('#selfImage').attr('src',
				'images/uploade-image-frame-with-face-position.png');
			$('#selfImage_upload').show();

			// $("#selfImage").html();
			// var img_url = domain +
			// window.sessionStorage.getItem("selfImage");
			/*$("#selfImage_upload").css({
				'background-image' : 'url("' + e.target.result + '")',
				'background-size' : '100% 87%',
			// 'padding-left': '40%'
			});*/

			$("#selfImage_upload").empty().append('<img style="width: 300px; height: 475px;" src="' + e.target.result + '" id="selfImage">');
			//$('#selfImage').attr('src', data_uri);
			$('#selfImage_upload').append('<img src="images/uploade-image-frame-with-face-position.png" class="img_frame"/>');


		// detectFace();
		}

		reader.readAsDataURL(input.files[0]);

	}
}

function uploadImage(thi) {
	readURL(thi);
}

function upload() {
	
	Webcam.reset();
	$('#my_camera').append('<img src="images/uploade-image-frame.png" class="mainFrameImage"/>');
	$("#error_div").hide();
	
	$("#imgInp").trigger('click');
}

function uploadCam() {
	navigator.getMedia = (navigator.getUserMedia || // use the proper vendor
	// prefix
	navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);

	navigator
		.getMedia(
			{
				video : true
			},
			function() {
				// webcam is available
				//$("#camera_pop").popup("open");
				$("#selfImage_upload").empty().append('<div id="my_camera"></div>');
				Webcam.set({
					width : 300,
					height : 480,
					dest_width : 300,
					dest_height : 480,
					image_format : 'png',
					jpeg_quality : 90
				});
				Webcam.attach('#my_camera');
				$('#my_camera').append('<img src="images/uploade-image-frame-with-face-position.png" class="img_frame"/>');
				$("#camra-upload").attr('onclick', "take_snapshot();");
			},
			function() {
				// webcam is not available
				$("#error_div").show();
                setTimeout(function(){ $("#error_div").hide(); }, 5000);
			});

}

function take_snapshot() {
	// take snapshot and get image data
	Webcam.snap(function(data_uri) {
		$("#selfImage_upload").empty().append('<img style="width: 300px; height: 475px;" src="' + data_uri + '" id="selfImage">');
		//$('#selfImage').attr('src', data_uri);
		$('#selfImage_upload').append('<img src="images/uploade-image-frame-with-face-position.png"  class="img_frame"/>');
		$("#camera_pop").popup("close");
		Webcam.reset();
		$("#camra-upload").attr('onclick', "uploadCam();");
	});
}

function uploadUserImage() {
	//var img = $("#selfImage_upload").css("background-image");		
	//if (img!='none') {
	if ($('#selfImage').attr('src').split(",").length > 1) {
		$.ajax({
			url : serverURL2 + "php/v1/userImg",
			type : 'post',
			data : {
				user_image : $('#selfImage').attr('src').split(",")[1],
				// user_id : $("#userId").val()
				user_id : window.sessionStorage.getItem("userId")
			},
			dataType : "json",
			success : function(data) {
				if (data.error) {
					console.log(data.msg);
				} else {
					window.sessionStorage.setItem("selfImage", data.image_url);
					window.sessionStorage.setItem("image_inserted_id",
						data.inserted_id);
					// window.location = "result.php";
					window.location = "game.html";
				}
			},
			error : function(a, b, c) {
				alert("Select Image Js says: " + JSON.stringify(a));
			},
			progress : function(e) {
				if (e.lengthComputable) {
					var pct = (e.loaded / e.total) * 100;
				// $('#prog')
				// .progressbar('option', 'value', pct)
				// .children('.ui-progressbar-value')
				// .html(pct.toPrecision(3) + '%')
				// .css('display', 'block');
				} else {
					console.warn('Content Length not reported!');
				}
			}
		});
	} else {
		alert("Please upload an image.");
	}
}

function detectFace() {
	"use strict";
	$('.face').remove();

	$('#selfImage').faceDetection({
		complete : function(faces) {
			console.log(JSON.stringify(faces));

			for (var i = 0; i < faces.length; i++) {
				$('<div>', {
					'class' : 'face',
					'css' : {
						'position' : 'absolute',
						'left' : faces[i].x * faces[i].scaleX + 'px',
						'top' : faces[i].y * faces[i].scaleY + 'px',
						'width' : faces[i].width * faces[i].scaleX + 'px',
						'height' : faces[i].height * faces[i].scaleY + 'px'
					}
				}).insertAfter("#selfImage");
			}
		},
		error : function(code, message) {
			alert('Error: ' + message);
		}
	});
}