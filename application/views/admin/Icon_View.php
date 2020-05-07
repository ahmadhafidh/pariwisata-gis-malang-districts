<?PHP $this->load->view("admin/header_view")?>
  <div class="modal fade" id="<?php echo $add?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		  <div><b>TAMBAH ICON</b></div>
        </div>
      <div class="modal-body">
		<?php echo form_open_multipart('Admin/Kategori/Icon');?>
		  <input type="text" class="form-control no-border p-md" name="nama" placeholder="Nama Icon..." style="border-bottom: 1px solid #ccc;" autocomplete="OFF" autofocus>
		  <div class="form-group" style="margin-top:10px;margin-left:10px">
			<label class="btn btn-default btn-file">
				<input type="file"name="userfile" size="20">
			</label>
		</div>
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
				<div class="panel-body"><B><a href="<?php echo base_url("Admin/Kategori")?>">KATEGORI</a></B> / Icon</div>
				<table class="table table-bordered table-hover bg-white">
				<thead>
				  <tr>
					<th width="5%">NO</th>
					<th width="20%">Nama</th>
					<th>Icon</th>
					<th width="5%">ACTION</th>
				  </tr>
				</thead>
				
				<?php $i=1; foreach($Icon->result() as $Tampilkan) : ?>
				<tbody>
				  <tr>
					<td><?php echo $i++ ?></td>
					<td><?php echo $Tampilkan->nama?></td>
					<td><img src="<?php echo base_url("assets/admin/ikon"),"/",$Tampilkan->icon?>" width="50" height="50"></img></td>
					<td>
					<a href="#" data-toggle="modal" data-target="#<?php echo $Tampilkan->id_icon?>" data-backdrop="static" data-keyboard="false" class="icon mdi-editor-mode-edit i-20"></a>
					<a href="<?php echo base_url("Admin/Kategori/HapusIcon"),"/",$Tampilkan->id_icon?>" class="icon mdi-action-delete i-20"></a>
					</td>
				  </tr>
				</tbody>
				<div class="modal fade" id="<?php echo $Tampilkan->id_icon?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
					<div class="modal-dialog">
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						  <div><b>EDIT ICON</b></div>
						</div>
					  <div class="modal-body">
						<form action="<?php echo base_url("Admin/Kategori/Icon") ?>" method="post">
						
						  <input type="text" class="form-control no-border p-md" name="kategori" value="<?php echo $Tampilkan->nama?>" style="border-bottom: 1px solid #ccc;" autocomplete="OFF" autofocus>
						  
						  <textarea name="deskripsi" class="form-control no-border p-md" rows="1" style="margin: 0px -1px 0px 0px; height: 350px; border-bottom: 1px solid #ccc;" class="col-md-6"><?php echo $Tampilkan->icon?></textarea>
						  
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