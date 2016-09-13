$(document).ready(function() {});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
			// alert(e.target.result);
			$('#selfImage').attr('src', e.target.result);
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
	$("#camera_pop").popup("open");
	Webcam.set({
		width : 320,
		height : 240,
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
			}
		});
	} else {
		alert("Please upload an image.");
	}
}