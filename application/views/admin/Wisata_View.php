<?PHP $this->load->view("admin/header_view")?>
 <div class="box-row">
	<div class="box-cell">
		<div class="box-inner padding">
		  <div class="panel panel-card">
				<div class="panel-body"><B>WISATA</B></div>
				<table class="table table-bordered table-hover bg-white">
				<thead>
				  <tr>
					<th width="5%">NO</th>
					<th width="35%">WISATA</th>
					<th width="15%">KATEGORI</th>
					<th width="8%">STATUS</th>
					<th width="10%">ACTION</th>
				  </tr>
				</thead>
				
				<?php $i=1; 
					foreach ($result as $Tampilkan) {
				?>
				<tbody>
				  <tr>
					<td><?php echo $i++ ?></td>
					<td><?php echo $Tampilkan->nama_wisata?></td>
					<td><?php echo $Tampilkan->kategori?></td>
					<td><?php $stat = $Tampilkan->status;
						if($stat==1){?>
							<b><a href="<?php echo base_url("Admin/Wisata/SetStatus"),"/",$Tampilkan->id_wisata?>" style="color:red">Public</a></b>
						<?php }else{?>
							<b><a href="<?php echo base_url("Admin/Wisata/SetStatus"),"/",$Tampilkan->id_wisata?>" style="color:red">Not Public</a></b>
						<?php }?>
					<a href=""></a></td>
					<td><a href="<?php echo base_url("Admin/Wisata/Edit"),"/",$Tampilkan->id_wisata?>" class="icon mdi-editor-mode-edit i-20"></a>
					<a href="<?php echo base_url("Admin/Wisata/More"),"/",$Tampilkan->id_wisata?>" class="icon mdi-action-info i-20"></a>
					<a href="<?php echo base_url("Admin/Wisata/Hapus"),"/",$Tampilkan->id_wisata?>"class="icon mdi-action-delete i-20"></a>
					</td>
				  </tr>
				</tbody>
				<?php } ?>
				<?php// endforeach?>
			  </table>
			  <center> <?php echo $Links; ?></center>
		  </div>
<?PHP $this->load->view("admin/footer_view")?>