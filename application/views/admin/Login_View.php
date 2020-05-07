
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>LOGIN</title>
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/animate.css/animate.css")?>" type="text/css" />
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/font-awesome/css/font-awesome.css")?>" type="text/css" />
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/jquery/waves/dist/waves.css")?>" type="text/css" />
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/styles/material-design-icons.css")?>" type="text/css" />
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/jquery/bootstrap/dist/css/bootstrap.css")?>" type="text/css" />
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/styles/font.css")?>" type="text/css" />
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/styles/app.css")?>" type="text/css" />

</head>
<body>
<div class="app">
  

  <div class="center-block w-xxl w-auto-xs p-v-md">
    <div class="navbar">
      <div class="navbar-brand m-t-lg text-center">
        <span class="m-l inline"><i class="icon mdi-maps-navigation i-24"></i> Maps Admin</span>
      </div>
    </div>
    <div class="p-lg panel md-whiteframe-z1 text-color m">
      <form action="<?php echo base_url("Admin/Home/Login") ?>" method="post">
        <div class="md-form-group float-label">
          <input type="text" class="md-input" name="username" value="<?php if(isset($username)): echo $username; else : endif; ?>" autocomplete="off" <?php if(isset($ufocus)): echo $ufocus; else :;endif; ?>>
          <label>Username</label>
        </div>
        <div class="md-form-group float-label">
          <input type="password" class="md-input" name="password" value="<?php if(isset($password)): echo $password; else : endif; ?>" autocomplete="off" <?php if(isset($pfocus)): echo $pfocus; else : endif; ?>>
          <label>Password</label>
        </div>      
        <button md-ink-ripple type="submit" class="md-btn md-raised pink btn-block p-h-md">Sign in</button>
      </form>
    </div>
	<?php if(isset($Message)):?>
		<div class="col-md-13">
			<div class="bs-component">
				<div class="alert alert-dismissible alert-danger">
					<button class="close" type="button" data-dismiss="alert">×</button><strong>Gagal Login! </strong><br><?php echo $Message?>.
				</div>
			</div>
		</div>
	<?php  else : endif;?>
  </div>



</div>
<script src="<?PHP echo base_url("assets/admin/jquery/jquery/dist/jquery.js")?>"></script>
<script src="<?PHP echo base_url("assets/admin/jquery/bootstrap/dist/js/bootstrap.js")?>"></script>
<script src="<?PHP echo base_url("assets/admin/jquery/waves/dist/waves.js")?>"></script>
<script src="<?PHP echo base_url("assets/admin/scripts/ui-load.js")?>"></script>
<script src="<?PHP echo base_url("assets/admin/scripts/ui-jp.config.js")?>"></script>
<script src="<?PHP echo base_url("assets/admin/scripts/ui-jp.js")?>"></script>
<script src="<?PHP echo base_url("assets/admin/scripts/ui-nav.js")?>"></script>
<script src="<?PHP echo base_url("assets/admin/scripts/ui-toggle.js")?>"></script>
<script src="<?PHP echo base_url("assets/admin/scripts/ui-form.js")?>"></script>
<script src="<?PHP echo base_url("assets/admin/scripts/ui-waves.js")?>"></script>
<script src="<?PHP echo base_url("assets/admin/scripts/ui-client.js")?>"></script>
</body>
</html>
