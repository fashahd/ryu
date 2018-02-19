<?php
	$tittle 	= strtoupper($tittle);
	$username 	= $this->session->userdata("username");
	$sql 	= "SELECT * FROM ryu_users WHERE username = ?";
	$query	= $this->db->query($sql,array($username));
	if($query->num_rows()>0){
		$row = $query->row();
		$name = $row->fullname;
	}
?>
<!doctype html>
<html class="no-js" lang="en">
    <?=$this->layout->headersource($tittle)?>
    <body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<!-- Logo -->
				<a href="<?=base_url()?>" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>A</b>PG</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>Admin</b>Page</span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>

					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- User Account: style can be found in dropdown.less -->
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<span class="hidden-xs"><?=$name?></span>
								</a>
								<ul class="dropdown-menu">
									<li class="user-body">
										<div class="pull-left">
											<a href="<?=base_url()?>auth/profile" class="btn btn-default btn-flat">Profile</a>
										</div>
										<div class="pull-right">
										<a href="<?=base_url()?>auth/signout" class="btn btn-default btn-flat">Sign out</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<?=$this->menu->treemenu()?>
			</aside>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<?=$this->load->view($pages)?>
			</div>
		</div>
      
		<!-- modal-area-end -->
        <?=$this->layout->headersourcejs()?>
    </body>
</html>
