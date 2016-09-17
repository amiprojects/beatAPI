$(document).ready(function() {});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
			// alert(e.target.result);
			$('#selfImage').attr('src', e.target.result);
			detectFace();
		}

		reader.readAsDataURL(input.files[0]);
		
	}
}

function uploadImage(thi) {
	readURL(thi);
}

function upload() {
	$("#imgInp").trigger('click');
}

function uploadCam() {
	alert("hi...");
	//$("#selfImage").hide();
	$("#camera_pop").popup("open");
	Webcam.set({
		width : 365,
		height : 403,
		image_format : 'jpeg',
		jpeg_quality : 90
	});
	Webcam.attach('#my_camera');
	$("#camra-upload").attr('onclick', "take_snapshot();");
}

function take_snapshot() {
	// take snapshot and get image data
	Webcam.snap(function(data_uri) {
		$('#selfImage').attr('src', data_uri);
		$("#camera_pop").popup("close");
		Webcam.reset();
		$("#camra-upload").attr('onclick', "uploadCam();");
	});
}

function uploadUserImage() {
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
					alert(data.msg);
				} else {
					window.sessionStorage.setItem("selfImage", data.image_url);
					window.location = "result.php";
				}
			},
			error : function(a, b, c) {
				console.log("Select Image Js says: " + JSON.stringify(a));
			},
            progress: function(e) {
                if(e.lengthComputable) {
                    var pct = (e.loaded / e.total) * 100;                    
//                    $('#prog')
//                        .progressbar('option', 'value', pct)
//                        .children('.ui-progressbar-value')
//                        .html(pct.toPrecision(3) + '%')
//                        .css('display', 'block');
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