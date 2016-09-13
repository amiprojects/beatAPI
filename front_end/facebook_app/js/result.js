$(document).ready(function() {
	$("#selfImage").attr("src",domain+window.sessionStorage.getItem("selfImage"));
});

var hitCount = 0;
function hitFunction() {
	hitCount = Number(Number(hitCount) + Number(1));
	$("#totalHit").html(hitCount);
}
