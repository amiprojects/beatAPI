$(document).ready(function() {
	$(".totalHit").html(window.sessionStorage.getItem("totalHit"));
});
var img_url;
$(document).ready(function() {
	img_url = domain + window.sessionStorage.getItem("selfImage");
	$("#myImage").css({
		'background-image' : 'url("' + img_url + '")',
		'background-size' : '100% 100%'
	});
});

function share(){
	 var scrn_sht;
	 var t=document.getElementById("demo321"); 
	 
    html2canvas(t,{
		onrendered: function(canvas) {
					//alert(canvas.toDataURL());
					//console.log(canvas.toDataURL());					
					},
	  width: 300,
	  height: 900
	
	}).then(function(canvas) {
		//document.body.appendChild(canvas);
		//console.log(canvas.toDataURL());
		scrn_sht=canvas.toDataURL();
	});
	
	
	FB.ui({
		method: 'share',
		href: 'https://apps.facebook.com/test_app_ami/',
		picture: img_url,
	}, function(response){
		console.log(img_url);
		});
	
}

   
