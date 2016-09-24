$(document).ready(function() {
	/*if(window.sessionStorage.getItem("totalHit") == null){
		$(".totalHit").html("0");
		$(".whenNotPlayedDiv").show();
	}else{*/
		$(".totalHit").html(window.sessionStorage.getItem("totalHit"));
	//}
	
});
var img_url;
$(document).ready(function() {
	
	/*if(window.sessionStorage.getItem("selfImage") == null){
		img_url = "images/uploade-image-frame.png";
		//alert(img_url);
	}else{*/
		img_url = domain + window.sessionStorage.getItem("selfImage");
	//}
	
	$("#myImage").css({
		'background-image' : 'url("' + img_url + '")',
		'background-size' : '100% 100%'
	});
});

//function share(){
//		
//	var scrn_sht;
//	var img_base64;
//				
//	/*for screenshoot*/ 
//	var t=document.getElementById("demo321"); 
//	 
//	html2canvas(t,{
//		onrendered: function(canvas) {
//					//alert(canvas.toDataURL());
//					console.log(canvas.toDataURL());	
//					//document.body.appendChild(canvas);				
//					},
//	  width: 200,
//	  height: 200
//	
//	}).then(function(canvas) {
//		
//		scrn_sht=canvas.toDataURL();
//		img_base64=scrn_sht.split(',')[1];
//		
//		$.ajax({
//				url:serverURL2 + "php/v1/shareImg"         ,
//				dataType:'json'       ,
//				type:'post'      ,
//				
//				data:{							
//					image:img_base64,
//					user_id:sessionStorage.getItem('userId')								
//				},
//				success:function(data){	
//					/*alert("success");
//					alert("final url"+data.image_url);*/
//					
//					console.log(domain+data.image_url);
//					/*for share*/
//					FB.ui({
//						method: 'share',
//						href: 'https://apps.facebook.com/test_app_ami/',
//						picture: domain+data.image_url ,
//						//picture: 'http://www.planwallpaper.com/static/images/i-should-buy-a-boat.jpg' ,
//					}, function(response){
//						
//					});
//								
//				},
//				complete: function(data){
//					//alert("complete");
//				},
//				error: function(a,b,c){
//					alert("error");
//					alert(JSON.stringify(a));
//					alert("It seems you'r not connected to internet, we can't find any network.");							
//				}
//		});
//		
//	});
//		
//}



function share(){
	$.ajax({
				url:serverURL2 + "php/v1/savegif"         ,
				dataType:'json'       ,
				type:'post'      ,
				
				data:{							
					user_image_url:window.sessionStorage.getItem("selfImage"),
					number_of_hits:window.sessionStorage.getItem("totalHit")								
				},
				success:function(data){	
					
					/*for share*/
					FB.ui({
						method: 'share',
						href: 'https://apps.facebook.com/test_app_ami/',
						picture: domain+data.gif_url ,
						//picture: 'http://www.planwallpaper.com/static/images/i-should-buy-a-boat.jpg' ,
					}, function(response){
						
					});
								
				},
				complete: function(data){
					//alert("complete");
				},
				error: function(a,b,c){
					
					alert(JSON.stringify(a));
					alert("It seems you'r not connected to internet, we can't find any network.");							
				}
		});
}

function dwnld(){
	
	$.ajax({
				url:serverURL2 + "php/v1/savegif"         ,
				dataType:'json'       ,
				type:'post'      ,
				
				data:{							
					user_image_url:window.sessionStorage.getItem("selfImage"),
					number_of_hits:window.sessionStorage.getItem("totalHit")								
				},
				success:function(data){	
					
					//alert("Download success...");
					
					var a = $("<a>").attr("href", domain+data.gif_url).attr("download", "img.gif");

					a[0].click();
					
					a.remove();
					
							
				},
				complete: function(data){
					//alert("complete");
				},
				error: function(a,b,c){
					
					alert(JSON.stringify(a));
					alert("It seems you'r not connected to internet, we can't find any network.");							
				}
		});

}
   
