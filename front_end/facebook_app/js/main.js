var serverURL = "192.168.0.112/beatAPI/beat/";
var serverURL2 = "192.168.0.112/beat/";

$(document).ready(function() {

	// Instantiate a counter
	clock = new FlipClock($('.clock'), 0, {
		clockFace : 'Counter',
		// autoStart: true,
		minimumDigits : 6
	});
	getTotalUserCount(clock);
});

function count(clock) {
	window.setTimeout(function() {
		clock.increment();
		count(clock);
	}, 100);
}

function getTotalUserCount(clock){
	$.ajax({
		url:serverURL+"php/v1/total_user",
		type: "get",
		dataType:"json",
		success:function(data){
			if(!data.error){
				clock.setTime(data.total_user);
			}
		}
	} );
}