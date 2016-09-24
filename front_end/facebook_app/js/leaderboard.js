$(document).ready(function() {
	showLeaderBoardData();
});


function showLeaderBoardData() {
	$.ajax({
		url : serverURL2 + "php/v1/top_ten_hitter",
		dataType : "json",
		success : function(data) {
			if (data.error) {

			} else {
				
				/*$.map(data.user, function(item) {
					$("#top10score").append(
						'<div style="width: 100%; float: left;">' +
						'<div style="width: 46%; float: left; padding: 2%; text-align: left; color: #000;text-transform: uppercase;">' +
						item.name +
						'</div>' +
						'<div style="width: 46%; float: left; padding: 2%; text-align: right; color: #000;text-transform: uppercase;">' +
						item.max_hit+' HITS' +
						'</div>'
					);
				});*/

				for (var i = 0; i < 10; i++) {
					item=data.user[i];
					
					if(i<3){
						$("#top3score").append('<div class="ecahPlayerDiv">'+
											'<div class="ecahPlayerImageDiv">'+
												'<div class="batchContDiv">'+
													'<img src="images/'+i+'_b.png" class="batchIcon">'+
												'</div>'+
												'<div class="eachTopPlayerImageDiv">'+
													'<img src="'+domain+'beat/php/assets/' + item.user_image_id + '.jpg" class="eachTopPlayerImage">'+
												'</div>'+
											'</div>'+
											'<div class="ecahPlayerInfoDiv">'+
												'<div class="playerHitInfo">'+item.max_hit+' HITS'+'</div>'+
												'<div class="playerInfo">'+item.name+'</div>'+
											'</div>'+
										'</div>');
					}
					else{
						
						item=data.user[i];
							$("#top10score").append(
								'<div style="width: 100%; float: left;">' +
								'<div style="width: 46%; float: left; padding: 2%; text-align: left; color: #000;text-transform: uppercase;">' +
								item.name +
								'</div>' +
								'<div style="width: 46%; float: left; padding: 2%; text-align: right; color: #000;text-transform: uppercase;">' +
								item.max_hit+' HITS' +
								'</div>'
							);
						
					}
				
					
					
					
					
						/*'<div style="width: 31.33%;float:left;padding:0% 1%;">'+
						'<div style="width: 100%;float: left;margin-bottom: 20px;">'+
							'<img src="'+domain+'beat/php/assets/' + item.user_image_id + '.jpg" style="width: 90%; border: 1px solid #e4e4e4;margin: 0% 5%;">'+
						'</div>'+
						'<div style="width: 100%; float: left;text-align: center;">'+
							'<div style="width: 100%; float: left;color: #0089c7; font-weight: bold; font-size: 16px; text-transform: uppercase;">'+
							item.max_hit+' HITS'+
							'</div>'+
							'<div style="width: 100%;float: left;color: #000;font-size: 15px;text-transform: uppercase;padding-top: 5px;">'+
							item.name+
							'</div>'+
						'</div>'+
					'</div>'
					);*/
				}
			}
		}
	});

}