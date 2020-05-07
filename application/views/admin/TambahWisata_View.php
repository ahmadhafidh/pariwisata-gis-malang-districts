<?php $this->load->view('Admin/Header_View')?>
 <div class="box-row">
	<div class="box-cell">
		<div class="box-inner padding">
		  <div class="panel panel-card">
				<div class="panel-body"><a href="<?php echo base_url("Admin/Wisata")?>"><b>WISATA</b></a> / Tambah Wisata</div>
				<div class="panel-body">
				  <form action="<?php echo base_url("Admin/Wisata/Add") ?>" method="post">
					<div class="form-group">
					  <label for="wisata">Wisata</label>
					  <input type="text" class="form-control" id="wisata" name="wisata" placeholder="Wisata..." autocomplete="OFF">
					</div>
					<div class="form-group">
					  <label for="wisata">Kategori</label>
					  <select class="form-control" style="width: 100%;" name="id_kategori">
							<option disabled="disabled">Pilih Kategori</option>
							<?php foreach($Kategori->result() as $Tampilkan) : ?>
							<option value="<?php echo $Tampilkan->id_kategori?>"><?php echo $Tampilkan->kategori;?></option>	
							<?php endforeach?>
					  </select>
					</div>
					<div class="form-group">
					  <label for="wisata">Telephone</label>
					  <input type="number" class="form-control" id="telephone" name="telephone" placeholder="Telephone..." autocomplete="OFF" min="0">
					</div>
					
					<label for="wisata">Jam Operasi</label>
					<div class="form-group">
					  <div class="col-md-6">
					  <label for="wisata">Buka</label>
					  <input type="text" class="form-control" id="buka" name="buka" placeholder="Jam Buka..." autocomplete="OFF">
					  </div>
					  <div class="col-md-6">
					  <label for="wisata">Tutup</label>
					  <input type="text" class="form-control" id="tutup" name="tutup" placeholder="Jam Tutup..." autocomplete="OFF">
					  </div>
					</div>
					
					<div class="form-group">
					  <label for="exampleInputEmail1">Maps</label>
					  <div class="map" id="map" style="width: 100%; height: 300px;"></div>
						<input type="text" class="form-control" name="location" id="location" placeholder="Geser Penanda Pada Maps Untuk Menampilkan Jalan...">
						<div class="input-group">
							<div class="col-lg-6">
								<input type="hidden" class="form-control" name="lat" id="lat" placeholder="Latitude..."	>
							</div>
							<div class="col-lg-6">
								<input type="hidden" class="form-control" name="lng" id="lng" placeholder="longitude...">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<a href="<?php echo base_url("Admin/Wisata")?>" class="btn btn-default m-b">BATAL</a>
						<button type="submit" class="btn btn-primary m-b" name="baru" value="baru">SIMPAN</button>
					</div>
				  </form>
				</div>
		  </div>
		</div>
	</div>
</div>
<script>
/* script */
function initMap() {
   var latlng = new google.maps.LatLng(-7.8823138,112.529857);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 14
    });
	map.setOptions({ minZoom: 15, maxZoom: 18 });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();   
    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            // map.setZoom(17);
            map.setZoom(1);
        }
       
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);          
    
        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);
       
    });
    // this function will work on marker move event into map 
    google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {        
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
}
function bindDataToForm(address,lat,lng){
   document.getElementById('location').value = address;
   document.getElementById('lat').value = lat;
   document.getElementById('lng').value = lng;
}
google.maps.event.addDomListener(window, 'load', initMap);
</script>
<?php $this->load->view('Admin/Footer_View')?>