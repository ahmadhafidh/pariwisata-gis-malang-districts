<input type="text" id="mapsearch" size="50">
<div id="map-canvas"></div>
<script>
var map  new google.map.Map(document.getElementById('map-canvas'),){
			center: new google.maps.LatLng(-7.883419,112.5313161),
				zoom: 13,
				minZoom: 13,
				maxZoom: 15,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			},
			
		});
		var marker = new google.maps.marker({
			position:{
				lat: 27.72,
				lng: 85.36
			},
			map:map,
			draggable: true
		});

		var searchBox = new google.maps.places.SearchBox(document.getElementById('mapsearch'));

		google.maps.event.addListener(searchBox, 'places_changed',function(){
			var places = searchBox.getPlaces();

			var bounds = new google.maps.LatLngBounds();
			var i,place;

			for(i=0; place=places[i]; i++){
				bounds.extend(place.geometry.location);
				marker.setPosition(place.geometry.location);
			}
			
			map.fitBounds(bounds);
			map.setZoom(15);
		});
		</script>
