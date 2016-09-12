var serverURL = "http://192.168.0.112/beatAPI/beat/";
var serverURL2 = "http://192.168.0.112/beat/";

$(document).ready(function() {
	// Instantiate a counter
	clock = new FlipClock($('.clock'), 0, {
		clockFace : 'Counter',
		minimumDigits : 3
	});
	getTotalUserCount(clock);
	count(clock);
});

function count(clock) {
	window.setTimeout(function() {
		$.ajax(serverURL+"php/v1/total_user").success(function(data, status, headers, config) {
			clock.setTime(data.total_user);
			count(clock);
		});
	}, 1000);
}

function getTotalUserCount(clock){
	$.ajax({
		url:serverURL+"php/v1/total_user",
		type: "get",
		dataType:"json",
		success:function(data){
			if(!data.error){
				//clock.setTime(data.total_user);
				for(i=0;i<data.total_user;i++){
					window.setTimeout(function(){clock.increment();},1);					
				}
			}
		}
	} );
}