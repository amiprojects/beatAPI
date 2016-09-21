// JavaScript Document

$(document).ready(function() {
	//alert("hi...");
	var img_url = domain + window.sessionStorage.getItem("selfImage");
	$("#myImage").css({
		'background-image' : 'url("' + img_url + '")',
		'background-size' : '100% 100%'
	});
});