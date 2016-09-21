var leftHitCount = 0;
var rightHitCount = 0;
var totalHitCount = 0;

var counter;
function totalHitFunction() {
	if (totalHitCount == 0) {
		counter = setInterval(timer, 1000);
	}
	if (count > 0) {
		totalHitCount = Number(Number(totalHitCount) + Number(1));
		$("#totalHit").html(totalHitCount);
	} else {
		// alert("Timed out !");
	}
}

var count = 15;
// var counter = setInterval(timer, 1000);
function timer() {
	count = count - 1;
	$("#hitTimer").html(count);
	if (count <= 0) {
		clearInterval(counter);
		window.sessionStorage.setItem("totalHit", totalHitCount);
		insertHit();
		// return;
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
			// alert("Inserted Hit Counter");
			window.location = "score.php";
		},
		error : function(a, b, c) {
			console.log(JSON.stringify(a));
		}
	});
}

$(document).ready(function() {
	var img_url = domain + window.sessionStorage.getItem("selfImage");
	$("#selfImage").css({
		'background-image' : 'url("' + img_url + '")',
		'background-size' : '100% 95%'
	});
});