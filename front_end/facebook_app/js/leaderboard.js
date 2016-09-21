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
				$.map(data.user, function(item) {
					$("#top10score").append(
						'<div style="width: 100%; float: left;">' +
						'<div style="width: 46%; float: left; padding: 2%; text-align: left; color: #000;text-transform: uppercase;">' +
						item.name +
						'</div>' +
						'<div style="width: 46%; float: left; padding: 2%; text-align: right; color: #000;text-transform: uppercase;">' +
						item.max_hit+' HITS' +
						'</div>'
					);
				});

				for (var i = 0; i < 3; i++) {
					item=data.user[i];
					$("#top3score").append(
						'<div style="width: 32.33%;float:left;">'+
						'<div style="width: 200px;float: left;margin-bottom: 20px;background: url(\''+domain+'beat/php/assets/' + item.user_image_id + '.jpg\');background-size: 100% 100%;min-height: 200px;min-width: 200px;background-repeat: no-repeat;">'+
							'<img src="images/'+i+'_batch.png" style="width: 230px;float: left;position: absolute;z-index: 2;top: 24.5%;">'+
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
					);
				}
			}
		}
	});

}