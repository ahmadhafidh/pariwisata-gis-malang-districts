<?php $this->load->view('Admin/Header_View')?>
      <div class="box-row">
        <div class="box-cell">
          <div class="box-inner padding">
            <div class="padding-out">
			  <div class="p-h-md p-v bg-white box-shadow pos-rlt">
				<h3 class="no-margin">Pengaturan</h3>
			  </div>
			  <div class="box">
				<div class="col-md-12 b-l bg-white bg-auto">
				  <div class="p-md bg-light lt b-b font-bold">Pengaturan Profile Admin</div>
				  <form action="<?php echo base_url("Admin/Home/Settings/") ?>" method="post" class="p-md col-md-6">
					<div class="form-group">
					  <label>Title Header</label>
					  <input type="text" class="form-control" name="nama" value="<?php echo $profil->nama?>" placeholder="Nama" autocomplete="off">
					</div>
					<div class="form-group">
					  <label>Email</label>
					  <input type="text" class="form-control" name="email" value="<?php echo $profil->email?>" placeholder="Email" autocomplete="off">
					</div>
					<div class="form-group">
					  <label>Username</label>
					  <input type="text" class="form-control" name="username" placeholder="<?php echo $profil->username?>" autocomplete="off">
					</div>

					<style>
					.infosmile{
						font-size: 11px;
						color: red;
					}
					</style>
					<div class="form-group">
					  <label>Password <a href="https://id.wikipedia.org/wiki/MD5" target="_blank" title="Tentang MD5"><span class="infosmile">(Dilindungi MD5)</span></a></label>
					  <input type="password" class="form-control" name="password" placeholder="<?php echo $profil->password?>">
					</div>
					<input type="hidden" name="id_admin" value="<?php echo $profil->id_admin?>">
					<button type="submit" class="btn btn-info m-t" name="update" value="update">Simpan</button>
				  </form>
				</div>
			  </div>
			</div>
          </div>
        </div>
      </div>
	
<?php $this->load->view('Admin/Footer_View')?>