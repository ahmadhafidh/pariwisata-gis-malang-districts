<?php $this->load->view('Admin/Header_View')?>
 <div class="box-row">
	<div class="box-cell">
		<div class="box-inner padding">
		  <div class="panel panel-card">
				<div class="panel-body"><a href="<?php echo base_url("Admin/Wisata")?>"><b>WISATA</b></a> / Detail Wisata</div>
				<div class="panel-body">
					<a href="<?php echo base_url("Admin/Wisata")?>" class="btn btn-primary m-b">Kembali</a>
					<div class="map" id="map" style="width: 100%; height: 500px;"></div>
				</div>
					  
		  </div>
		</div>
	</div>
</div>
<script>
	function initMap() {
	var latlng = new google.maps.LatLng(<?php echo $Wisata->latitude?>,<?php echo $Wisata->longitude?>);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 14
    });
	map.setOptions({ minZoom: 17, maxZoom: 19 });
	
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
	  icon: '<?PHP echo base_url("assets/admin/ikon"),"/",$Wisata->icon?>',
   });
	marker.addListener('click', function() {
          infowindow.open(map, marker);
    });

	var contentString = 
			'<div id="content">'+
            '<h3 id="firstHeading" class="firstHeading"><?php echo $Wisata->nama_wisata?></h3><hr>'+
            '<div id="bodyContent">'+
            '<div class="form-group"><label>Alamat</label><br><?php echo $Wisata->alamat?></div>'+
            '<div class="form-group"><label>Jam Buka</label><br><?php echo $Wisata->buka?></div>'+
            '<div class="form-group"><label>Jam Tutup</label><br><?php echo $Wisata->tutup?></div>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });	
}

google.maps.event.addDomListener(window, 'load', initMap);
</script>
<?php $this->load->view('Admin/Footer_View')?>