<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/checkbox.css")?>" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/custom.css")?>" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/style.css")?>" />
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type='text/javascript' src='<?php echo base_url("assets/js/jquery-2.1.3.js")?>'></script>
	<script type='text/javascript' src='<?php echo base_url("assets/js/navbar.js")?>'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv8TT1-OM0crEgjWZO1Z23a1LsLo5gxOQ&callback=initMap">
</script>

<title>Maps</title>
<style>
	.information{
		position: fixed;
		right:0;
		margin-right: 60px;
		margin-top: -75px;
		width: auto;
		height: 30px;
		padding: 10px 10px 10px 10px;
		background:white;
	}
	.fafa{
		color: #000;
		background: #E26A6A;
		border-radius: 5px;
		font-weight: bold;
		padding-right: 10px;
		padding-left: 20px;
		border: 1px solid #fff;
	}
	.control {
		size: 25px;
		font-size: 25px;
	}
	.checkbox{
		width: 25px;
		height: 25px;
		background: #fff;
	}
	.panel{
		padding: 10px 10px 10px 10px;
		width: 350px;
		height: 250px
	}
</style>
<script>
	$(document).ready(function () {
		var marker_array_axis = [];
		var properti_peta;
		var peta;
		var marker1, marker2, marker3, marker4, marker5;
		var infowindow1, infowindow2, infowindow3, infowindow4, infowindow5; 
		
		function initialize() {	
			properti_peta = {
				center: new google.maps.LatLng(-7.883419,112.5313161),
				zoom: 13,
				minZoom: 13,
				maxZoom: 15,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			peta = new google.maps.Map(document.getElementById("div_peta"), properti_peta);
		}
		google.maps.event.addDomListener(window, 'load', initialize);	


		<?php foreach($Maps->result() as $Tampilkan) : ?>
		$("#<?php echo $Tampilkan->id_kategori?>").change(function () {
			if ($(this).is(":checked")) {
				var myLatLng = {lat: <?php echo $Tampilkan->latitude?>, lng:<?php echo $Tampilkan->longitude?>};
				infowindow<?php echo $Tampilkan->id_wisata?> = new google.maps.InfoWindow({
					content: "<div class=''><b><?php echo $Tampilkan->nama_wisata?></div><br><div class=''><label>Alamat</label><br><?php echo $Tampilkan->alamat?></div><div class=''><label>Jam Buka</label><br><?php echo $Tampilkan->buka?></div><div class=''><label>Jam Tutup</label><br><?php echo $Tampilkan->tutup?></div>"
				});
				marker<?php echo $Tampilkan->id_wisata?> = new google.maps.Marker({
					icon: '<?PHP echo base_url("assets/admin/ikon"),"/",$Tampilkan->icon?>',
					position: myLatLng,
					map: peta,
					title: "<?php echo $Tampilkan->nama_wisata?>"
				});

				marker<?php echo $Tampilkan->id_wisata?>.addListener('click', function() {
					infowindow<?php echo $Tampilkan->id_wisata?>.open(peta, marker<?php echo $Tampilkan->id_wisata?>);
				});

			}else{
				marker<?php echo $Tampilkan->id_wisata?>.setMap(null);
			}
		});
<?php endforeach?>		
});
</script>
</head>
<body>

<!--     <div class='' title='SEARCH'>
    	<div>
			<input type="text" class="form-control" name="search"></input>
		</div>
		<div>
			<button>SEARCH</button>
		</div>
	</div> -->
	
	<form action="<?php echo base_url('Home/hasil')?>" action="GET">
		<div class="form-group">
			<label for="cari">data yang dicari</label>
			<input type="text" checked="" lass="form-control" id="cari" name="cari" placeholder="cari">
		</div>
		<input class="btn btn-primary" type="submit" value="Cari">
	</form>

	<div class='navbar-toggle'>
		<div class='bar1'></div>
		<div class='bar2'></div>
		<div class='bar3'></div>
		<div >MENU</div>
	</div>



	<nav class="nav-hide">
		<ul>
			<center>
				<table>
					<tr>
						<th width="60"></th>
						<th></th>
					</tr>


					<?php foreach($Kategori->result() as $Tampilkan) : ?>
						<tr>
							<td><input type="checkbox" id="<?php echo $Tampilkan->id_kategori?>" class="checkbox"></td>
							<td class="fafa"><label class="control" style="font-size: 200%;"><?php echo $Tampilkan->kategori?></label></td>
						</tr>
					<?php endforeach?>
				</table>
			</center>
		</ul>
	</nav>
	<div id="div_peta" class="embed-responsive embed-responsive-16by9" style="height: 670px; position: relative; overflow: hidden; min-height:100%; overflow:auto;"></div>
	<div class="information">
		<?php 
		$this->load->model('Home_Model','Home');
		$kat = $this->Home->GetKategoriById();
		foreach($kat->result() as $Tampilkan) :
			?>
		<img src="<?PHP echo base_url("assets/admin/ikon"),"/",$Tampilkan->icon?>" title="<?PHp echo $Tampilkan->kategori?>">
	<?php endforeach?>
</div>
</body>
</html>