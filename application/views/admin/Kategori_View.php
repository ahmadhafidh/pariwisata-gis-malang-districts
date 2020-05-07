<?PHP $this->load->view("admin/header_view")?>
  <div class="modal fade" id="<?php echo $add?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		  <div><b>TAMBAH KATEGORI</b></div>
        </div>
      <div class="modal-body">
		<form action="<?php echo base_url("Admin/Kategori") ?>" method="post">
		  <input type="text" class="form-control no-border p-md" name="kategori" placeholder="Kategori Name..." style="border-bottom: 1px solid #ccc;" autocomplete="OFF" autofocus>
		  <select class="form-control no-border" style="width: 100%;" name="icon">
					<option disabled="disabled">Pilih ICON</option>
					<?php $i=1; foreach($Icon->result() as $Tampilkan) : ?>
					<option value="<?php echo $Tampilkan->id_icon?>"><?php echo $Tampilkan->nama;?></option>
					<?php endforeach?>
          </select>
          
        <div class="lt p">
		  <button name="baru" value="baru" class="md-btn md-raised pull-right p-h-md green">SIMPAN</button>
          <ul class="nav nav-pills nav-sm">
          </ul>
        </div>
        </form>
      </div>
      </div>
    </div>
  </div>
 <div class="box-row">
	<div class="box-cell">
		<div class="box-inner padding">
		  <div class="panel panel-card">
				<div class="panel-body"><B>KATEGORI</B></div>
				<table class="table table-bordered table-hover bg-white">
				<thead>
				  <tr>
					<th width="5%">NO</th>
					<th width="20%">KATEGORI</th>
					
					<th width="5%">ACTION</th>
				  </tr>
				</thead>
				
				<?php $i=1; foreach($Kategori->result() as $Tampilkan) : ?>
				<tbody>
				  <tr>
					<td><?php echo $i++ ?></td>
					<td><?php echo $Tampilkan->kategori?></td>
					
					<td>
					<a href="#" data-toggle="modal" data-target="#<?php echo $Tampilkan->id_kategori?>" data-backdrop="static" data-keyboard="false" class="icon mdi-editor-mode-edit i-20"></a>
					<a href="<?php echo base_url("Admin/Kategori/Hapus"),"/",$Tampilkan->id_kategori?>" class="icon mdi-action-delete i-20"></a>
					</td>
				  </tr>
				</tbody>
				<div class="modal fade" id="<?php echo $Tampilkan->id_kategori?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
					<div class="modal-dialog">
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						  <div><b>EDIT KATEGORI</b></div>
						</div>
					  <div class="modal-body">
						<form action="<?php echo base_url("Admin/Kategori") ?>" method="post">
						
						  <input type="text" class="form-control no-border p-md" name="kategori" value="<?php echo $Tampilkan->kategori?>" style="border-bottom: 1px solid #ccc;" autocomplete="OFF" autofocus>
						  
						  
						  
						<div class="lt p">
						<input type="hidden" name="id_kategori" value="<?php echo $Tampilkan->id_kategori?>">
						  <button name="update" value="update" class="md-btn md-raised pull-right p-h-md green">SIMPAN</button>
						  <ul class="nav nav-pills nav-sm">
						  </ul>
						</div>
						</form>
					  </div>
					  </div>
					</div>
				  </div>				
				
				<?php endforeach?>
			  </table>
		  </div>
	
<?PHP $this->load->view("admin/footer_view")?>