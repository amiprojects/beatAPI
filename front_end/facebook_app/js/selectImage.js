$(document).ready(function() {
	
});

function readURL(input) {
	
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        	//alert(e.target.result);
            $('#selfImage').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function uploadImage(thi){
    readURL(thi);
}

function upload(){
	$("#imgInp").trigger('click');
}

function uploadCam(){
	$("#my_camera").show();
	Webcam.set({
		width: 320,
		height: 240,
		image_format: 'jpeg',
		jpeg_quality: 90
	});
	Webcam.attach( '#my_camera' );
	$("#camra-upload").attr('onclick', "take_snapshot();");
}

function take_snapshot() {
	// take snapshot and get image data
	Webcam.snap( function(data_uri) {
		alert(data_uri);
		$('#selfImage').attr('src', data_uri);
		$("#my_camera").hide();
		Webcam.reset();
		$("#camra-upload").attr('onclick', "uploadCam();");
	} );
}