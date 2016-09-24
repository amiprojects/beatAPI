var img_url;
$(document).ready(function() {
	
	$.ajax({
		url	: serverURL2+'php/v1/max_score/'+window.sessionStorage.getItem("userId"),
		dataType: 'json',
		type: 'get',
		success: function(data){
			if(data.error){
				$(".totalHit").html("0");
				img_url = "images/background-image.png";
				$(".whenNotPlayedDiv").show();
			}else{
				$(".totalHit").html(data.total_hit_count);
				img_url = domain + data.user_image_url;
				
				window.sessionStorage.setItem("hightestHit",data.total_hit_count);
				window.sessionStorage.setItem("hightestHitImage",data.user_image_url);
			}
		},
		complete: function(){
			$("#myImage").css({
				'background-image' : 'url("' + img_url + '")',
				'background-size' : '100% 100%'
			});
		}
	
	});
	
	
});




function share(){
	$.ajax({
				url:serverURL2 + "php/v1/savegif"         ,
				dataType:'json'       ,
				type:'post'      ,
				
				data:{							
					user_image_url:window.sessionStorage.getItem("hightestHitImage"),
					number_of_hits:window.sessionStorage.getItem("hightestHit")								
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
					user_image_url:window.sessionStorage.getItem("hightestHitImage"),
					number_of_hits:window.sessionStorage.getItem("hightestHit")								
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
   