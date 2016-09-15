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

var count = 10;
var counter = setInterval(timer, 1000);
function timer() {
	count = count - 1;
	$("#hitTimer").html(count);
	if (count <= 0) {
		clearInterval(counter);
		alert("Timed out !");
		// alert(leftHitCount);
		// alert(rightHitCount);
		return;
	}
}

$(document).ready(
		function() {
			$("#selfImage").attr("src",
					domain + window.sessionStorage.getItem("selfImage"));
		});
