<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
	<?php if(isset($Title)) : ?>
  <title><?php echo $Title; ?></title>
	<?php else : ?>
  <title>-</title>
	<?php endif; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/animate.css/animate.css")?>" type="text/css" />
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/font-awesome/css/font-awesome.css")?>" type="text/css" />
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/jquery/waves/dist/waves.css")?>" type="text/css" />
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/styles/material-design-icons.css")?>" type="text/css" />
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/jquery/bootstrap/dist/css/bootstrap.css")?>" type="text/css" />
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/styles/font.css")?>" type="text/css" />
  <link rel="stylesheet" href="<?PHP echo base_url("assets/admin/styles/app.css")?>" type="text/css" />
  <link rel="shortcut icon" href="<?php echo base_url("assets/admin/images/ico.png")?>">
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv8TT1-OM0crEgjWZO1Z23a1LsLo5gxOQ&callback=initMap">
	</script>
</head>
<body>
<?php 
$username = $this->session->userdata('username');
$this->load->model('Admin_Model','Admin');
$title = $this->Admin->GetDetailAdmin($username);
?>
<div class="app">
  <aside id="aside" class="app-aside modal fade " role="menu">
    <div class="left">
      <div class="box bg-white">
        <div class="navbar md-whiteframe-z1 no-radius teal">
            <a class="navbar-brand">
              <span class="hidden-folded m-l inline"><?php echo $title->nama?></span>
            </a>
        </div>
		
        <div class="box-row">
          <div class="box-cell scrollable hover">
            <div class="box-inner">
              <div id="nav">
                <nav ui-nav>
                  <ul class="nav">
					<li>
                      <a href="<?PHP echo base_url("admin/Wisata")?>">
                        <i class="icon mdi-social-mood i-20"></i>
                        <span class="font-normal">Wisata</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?PHP echo base_url("admin/Kategori")?>">
                        <i class="icon mdi-editor-format-list-bulleted i-20"></i>
                        <span class="font-normal">Kategori</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </aside>
  <div id="content" class="app-content" role="main">
    <div class="box">
    <div class="navbar md-whiteframe-z1 no-radius teal">
      <a md-ink-ripple  data-toggle="modal" data-target="#aside" class="navbar-item pull-left visible-xs visible-sm"><i class="mdi-navigation-menu i-24"></i></a>
      <div class="navbar-item pull-left h4"></div>
      <ul class="nav nav-sm navbar-tool pull-right">
		<?php if(isset($add)) : ?>
		<li>
		  <a href="#" data-toggle="modal" data-target="#<?php echo $add?>" data-backdrop="static" data-keyboard="false">
            <i class="mdi-content-add-box i-24"></i>
          </a>
        </li>
		<?php else : endif;?>

		<?php if(isset($addwisata)) : ?>
		<li><a href="<?php echo base_url("Admin"),"/",$addwisata?>"><i class="mdi-content-add-box i-24"></i></a></li>
		<?php else : endif;?>
		
        <li class="dropdown">
          <a md-ink-ripple data-toggle="dropdown">
            <i class="mdi-navigation-more-vert i-24"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-scale pull-right pull-up text-color">
			<?php if(isset($icon)) : ?>
				<li><a href="<?php echo base_url("Admin/Kategori/Icon")?>">Icon</a></li>
			<?php else : endif;?>
			<?php if(isset($refresh)) : ?>
				<li><a href="<?php echo base_url("Admin"),"/",$refresh?>">Refresh</a></li>
			<?php else : endif;?>
				<li><a href="<?php echo base_url("Admin/Home/Settings")?>">Settings</a></li>
				<li class="divider"></li>
				<li><a href="<?PHP echo base_url("admin/Home/Logout")?>">Logout</a></li>
          </ul>
        </li>
      </ul>
      <div class="pull-right" ui-view="navbar@"></div>
    </div>