$(document).ready(function() {
	$(".totalHit").html(window.sessionStorage.getItem("totalHit"));
});

$(document).ready(function() {
	var img_url = domain + window.sessionStorage.getItem("selfImage");
	$("#myImage").css({
		'background-image' : 'url("' + img_url + '")',
		'background-size' : '100% 100%'
	});
});