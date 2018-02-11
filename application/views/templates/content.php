<?php
	$tittle = strtoupper($tittle);
	$facebook = "";
	$instagram = "";
	$sql 	= "SELECT * FROM ryu_social";
	$query	= $this->db->query($sql);
	if($query->num_rows()>0){
		$row 	= $query->row();
		$facebook = $row->facebook;
		$instagram = $row->instagram;
	}
	$sql    = " SELECT * FROM `ryu_menu`
				WHERE menu_parent_id = '0' and editable = 'ya'
				ORDER BY menu_order asc";
	$query  = $this->db->query($sql);
	$menufooter = "";
	if($query->num_rows()>0){
		foreach($query->result() as $h){
			$menufooter .= '<li><a href="#">'.$h->menu_title.'</a></li>';
		}
	}
?>
<!doctype html>
<html class="no-js" lang="en">
    <?=$this->layout->headersource($tittle)?>
    <body class="home-2">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!-- header-area-start -->
		<header>
			<!-- header-mid-area-start -->
			<div class="header-mid-area ptb-30">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="logo-area">
								<a href="<?=base_url()?>"><img style="width:200px"src="<?=base_url()?>appsources/img/logo/ryu_logo.png" alt="logo" /></a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="search-area">
								<form action="#">
									<input type="text" placeholder="Search entire store here ..." />
									<a href="#"><i class="fa fa-search"></i></a>
								</form>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="header-user">
								<a href="#" style="margin-left:10px"><img src="<?=base_url()?>/appsources/img/flag/en.jpg" alt="flag" /></a> 
								<a href="#" style="margin-left:10px"><img src="<?=base_url()?>/appsources/img/flag/id.jpg" alt="flag" /></a>
								<a href="http://www.facebook.com/<?=$facebook?>" target="_blank" style="margin-left:10px"><img src="<?=base_url()?>/appsources/img/logo/facebook.jpg" alt="flag" /></a> 
								<a href="http://www.instagram.com/<?=$instagram?>" target="_blank" style="margin-left:10px"><img src="<?=base_url()?>/appsources/img/logo/instagram.jpg" alt="flag" /></a> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- header-mid-area-end -->
			<!-- header-menu-area-start -->
			<div class="header-menu-area hidden-sm hidden-xs" id="header-sticky">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="main-menu">
								<nav>
									<ul>
										<?=$this->menu->treemenu()?>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- header-menu-area-end -->
			<!-- mobile-menu-area-start -->
			<div class="mobile-menu-area hidden-md hidden-lg">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="mobile-menu">
								<nav id="mobile-menu-active">
									<ul id="nav">
										<?=$this->menu->treemenu()?>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- mobile-menu-area-end -->
		</header>
		<!-- header-area-end -->
		<?=$this->load->view($pages)?>
		<!-- newslatter-area-start -->
		<div class="newslatter-area ptb-30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="newslatter-content text-right">
							<h4>Newsletter</h4>
						</div>
						<div class="newslatter-form">
							<form action="#">
								<input type="text" placeholder="Enter your e-mail" />
								<a href="#"><i class="fa fa-paper-plane"></i></a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- newslatter-area-end -->
		<!-- footer-area-start -->
		<footer>
			<!-- footer-top-area-start -->
			<div class="footer-top-area ptb-80">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
							<!-- single-footer-start -->
							<div class="single-footer">
								<div class="footer-logo mb-30">
									<a href="#"><img style="width:200px"src="<?=base_url()?>appsources/img/logo/ryu_logo.png" alt="logo" /></a>
								</div>
								<div class="footer-logo mb-30">
									<a href="#"><img style="width:200px"src="<?=base_url()?>appsources/img/logo/garansi_logo.png" alt="logo" /></a>
								</div>
							</div>
							<!-- single-footer-end -->
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
							<div class="row">
								<div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
									<!-- single-footer-start -->
									<div class="single-footer">
										<div class="footer-title">
											<h4>Product</h4>
										</div>
										<div class="footer-menu">
											<ul>
												<?=$menufooter?>
											</ul>
										</div>
									</div>
									<!-- single-footer-end -->
								</div>
								<div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
									<!-- single-footer-start -->
									<div class="single-footer">
										<div class="footer-title">
											<h4>Segemntation</h4>
										</div>
										<div class="footer-menu">
											<ul>
												<li><a href="#">Metal Working</a></li>
												<li><a href="#">Wood Working</a></li>
												<li><a href="#">General Working</a></li>
											</ul>
										</div>
									</div>
									<!-- single-footer-end -->
								</div>
								<div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
									<!-- single-footer-start -->
									<div class="single-footer">
										<div class="footer-title">
											<h4>News & Event</h4>
										</div>
									</div>
									<!-- single-footer-end -->
								</div>
								<div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
									<!-- single-footer-start -->
									<div class="single-footer">
										<div class="footer-title">
											<h4>Service & Support</h4>
										</div>
									</div>
									<!-- single-footer-end -->
								</div>
								<div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
									<!-- single-footer-start -->
									<div class="single-footer">
										<div class="footer-title">
											<h4>Download</h4>
										</div>
									</div>
									<!-- single-footer-end -->
								</div>
								<div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
									<!-- single-footer-start -->
									<div class="single-footer">
										<div class="footer-title">
											<h4>Contact Us</h4>
										</div>
									</div>
									<!-- single-footer-end -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer-top-area-end -->
			<!-- footer-bottom-area-start -->
			<div class="footer-bottom-area ptb-20">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="copy-right">
								<p>Copyright <a href="<?=base_url()?>">RYU</a>. All Rights Reserved</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="payment-area">
								FOLLOW US 
								<a href="http://www.facebook.com/<?=$facebook?>" target="_blank" style="margin-left:10px"><img src="<?=base_url()?>/appsources/img/logo/facebook_black.png" alt="flag" /></a> 
								<a href="http://www.instagram.com/<?=$instagram?>" target="_blank" style="margin-left:10px"><img src="<?=base_url()?>/appsources/img/logo/instagram_black.png" alt="flag" /></a> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer-bottom-area-end -->
		</footer>
		<!-- footer-area-end -->
		<!-- modal-area-start -->
		<div class="modal-area">
			<!-- single-modal-start -->
			<div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="modal-img">
								<div class="single-img">
									<img src="img/product/2.jpg" alt="mobile" class="primary" />
								</div>
							</div>
							<div class="model-text">
								<h2><a href="#">Printed Summer Dress</a> </h2>
								<div class="product-rating">
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star-o"></i></a>
								</div>
								<div class="price-rate">
									<span class="old-price"><del>$39.00</del></span>
									<span class="new-price">$59.00</span>
								</div>
								<div class="short-description mt-20">
									<p>Bacon ipsum dolor sit amet ut nostrud chuck, voluptate adipisicing veniam kielbasa fugiat ex spare ribs. Incididunt sint officia non cow, ut et. Cillum porchetta tongue occaecat laborum bacon aliquip fatback flank dolore short loin ball tip bresaola deserunt dolor. Shoulder fugiat ut in ut tail swine dolore, capicola ullamco beef occaecat meatball. Laboris turkey in et chuck deserunt ad incididunt do.</p>
								</div>
								<form action="#">
									<input type="number" value="1"/>
									<button type="submit">Add to cart</button>
								</form>
								<div class="product-meta">
									<span>
										Categories: 
										<a href="#">albums</a>,<a href="#">Music</a>
									</span>
									<span>
										Tags: 
										<a href="#">albums</a>,<a href="#">Music</a>
									</span>
								</div>
								<!-- social-icon-start -->
								<div class="social-icon mt-20">
									<ul>
										<li><a href="#" data-toggle="tooltip" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#" data-toggle="tooltip" title="Share on Twitter"><i  class="fa fa-twitter"></i></a></li>
										<li><a href="#" data-toggle="tooltip" title="Email to a Friend"><i class="fa fa-envelope-o"></i></a></li>
										<li><a href="#" data-toggle="tooltip" title="Pin on Pinterest"><i class="fa fa-pinterest"></i></a></li>
										<li><a href="#" data-toggle="tooltip" title="Share on Google+"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
								<!-- social-icon-end -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- single-modal-end -->
		</div>
		<!-- modal-area-end -->
        <?=$this->layout->headersourcejs()?>
    </body>
</html>
