$(document).ready(function() {
	
});

function readURL(input) {
	
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        	alert(e.target.result);

            $('#selfImage').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

//$("#imgInp").change(function(){
//	alert("hello1");
//    readURL(this);
//});

function test(thi){
    readURL(thi);
}

function uploadImage(){
	
}