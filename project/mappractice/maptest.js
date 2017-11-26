var map;
var gyongbokkong = {lat:37.578024, lng: 126.976891};

function initMap() {
	map = new google.maps.Map(document.getElementById('googlemap'), {
		center : {lat:37.578024, lng: 126.976891},
		zoom: 15
	});
}