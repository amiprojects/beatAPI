var leftHitCount = 0;
var rightHitCount = 0;
var totalHitCount = 0;
function leftHitFunction() {
	leftHitCount = Number(Number(leftHitCount) + Number(1));
	totalHitFunction();
}
function rightHitFunction() {
	rightHitCount = Number(Number(rightHitCount) + Number(1));
	totalHitFunction();
}
function totalHitFunction() {
	if (count > 0) {
		totalHitCount = Number(Number(totalHitCount) + Number(1));
		$("#totalHit").html(totalHitCount);
	} else {
		alert("Timed out !");
	}
}

/*function share_hit(){
	//alert("hi...");
}*/

var count = 15;
var counter = setInterval(timer, 1000);
function timer() {
	count = count - 1;
	$("#hitTimer").html(count);
	if (count <= 0) {
		clearInterval(counter);
		alert("Timed out !");
		insertHit();
		// alert(leftHitCount);
		// alert(rightHitCount);
		return;
	}
}

function insertHit() {
	$.ajax({
		url : serverURL2 + "php/v1/insert_hitcounter",
		type : "post",
		dataType : "json",
		data : {
			user_id : window.sessionStorage.getItem("userId"),
			left_hit_count : leftHitCount,
			right_hit_count : rightHitCount,
			total_hit_count : totalHitCount,
			user_image_id : window.sessionStorage.getItem("image_inserted_id")
		},
		success : function(data) {
			//alert("Inserted Hit Counter");
		},
		error : function(a, b, c) {
			console.log(JSON.stringify(a));
		}
	});
}

$(document).ready(
	function() {
		$("#selfImage").attr("src",
			domain + window.sessionStorage.getItem("selfImage"));
		
	});