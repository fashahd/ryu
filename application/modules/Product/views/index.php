<?php
	function listdetail($category_id){
		$CI     = &get_instance();
		$list = "";
		$sql    = " SELECT * FROM `ryu_menu`
					WHERE menu_parent_id = '$category_id'
					ORDER BY menu_order asc";
		$query  = $CI->db->query($sql);
		if($query->num_rows()>0){
			foreach($query->result() as $h){
				$list .= '
					<div class="col-lg-6">
						<div class="slider-text wow fadeInDownBig" data-wow-delay=".5s" >
							<p><span>'.$h->menu_title.'</span></p>
							<ul>
								'.listchild($h->menu_id).'
							</ul>
						</div>
					</div>
				';
			}
		}

		return $list;
	}

	function listchild($menu_id){
		$CI     = &get_instance();
		$list = "";
		$sql    = " SELECT * FROM `ryu_menu`
					WHERE menu_parent_id = '$menu_id'
					ORDER BY menu_order asc";
		$query  = $CI->db->query($sql);
		if($query->num_rows()>0){
			foreach($query->result() as $h){
				$list .= '
					<div class="col-lg-6">
						<div class="slider-text wow fadeInDownBig" data-wow-delay=".5s" >
							<p><span>'.$h->menu_title.'</span></p>
							<ul>
								'.listchild($h->menu_id).'
							</ul>
						</div>
					</div>
				';
			}
		}

		return $list;
	}
?>
		<!-- slider-area-start -->
		<div class="slider-area">
			<div id="slider">
				<img src="<?=base_url()?>appsources/img/banner/powertools.jpg" alt="slider-img" title="#caption1" />
			</div>
			<div class="nivo-html-caption" id="caption1" >
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="slider-text wow fadeInDownBig" data-wow-delay=".5s" >
								<h2><span><?=$tittle?></span></h2>
								
							</div>
						</div>
						<div class="col-lg-6">
						<?=listdetail($category_id)?>
							<!-- <div class="col-lg-6">
								<div class="slider-text wow fadeInDownBig" data-wow-delay=".5s" >
									<p><span>Metal Working</span></p>
									<ul>
										<li>Grinders</li>
										<li>Cut Off Show</li>
										<li>Drill</li>
										<li>Impact Drill</li>
										<li>Magneting Drill</li>
										<li>Bench Drill</li>
										<li>Steel Body</li>
										<li>Miter Saw</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="slider-text wow fadeInDownBig" data-wow-delay=".5s" >
									<p><span>Others</span></p>
									<ul>
										<li>Polisher</li>
										<li>Gun Polisher</li>
										<li>Drill</li>
										<li>Impact Drill</li>
										<li>Magneting Drill</li>
										<li>Bench Drill</li>
										<li>Steel Body</li>
										<li>Miter Saw</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="slider-text wow fadeInDownBig" data-wow-delay=".5s" >
									<p><span>Wood Working</span></p>
									<ul>
										<li>Polisher</li>
										<li>Gun Polisher</li>
										<li>Drill</li>
										<li>Impact Drill</li>
										<li>Magneting Drill</li>
										<li>Bench Drill</li>
										<li>Steel Body</li>
										<li>Miter Saw</li>
									</ul>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- slider-area-end -->
		<!-- banner-area-2-start -->
		<div class="banner-area-2 mb-50">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="single-banner-2" style="text-align:center">
							<video controls style="width:80%">
								<source src="<?=base_url()?>appsources/video/ryu-video.mp4" type="video/mp4">
								Your browser does not support HTML5 video.
							</video>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					</div>
				</div>
			</div>
		</div>
		<!-- banner-area-2-end -->
		<!-- pos_new_product-area-start -->
		<div class="pos_new_product">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title1 mb-30">
							<h2><span class="alphabetic" style="text-transform:uppercase"><?=$tittle?></span></h2>
						</div>
					</div>
				</div>	
			</div>	
				<div class="product-active transparent">
					<?=$listproduct?>
				</div>
			</div>
		</div>
		<!-- pos_new_product-area-end -->