<?php
	$retnewproduct = "";
	if($newproduct){
		foreach($newproduct as $row){
			if (strlen($row->product_name) > 30){
				$product_name = substr($row->product_name, 0, 30) . '...';
			}else{
				$product_name = $row->product_name;
			}
			$retnewproduct .= '
			<div class="single-product" style="margin-left:15px">
				<div class="product-img">
					<a href="#">
						<img src="'.base_url().'/appadmin/'.$row->product_image1.'" alt="product" class="first" />
					</a>
				</div>
				<div class="product-content">
					<h3><a href="#">'.$row->menu_title.'</a></h3>
					<div class="product-price">
						<ul>
							<li class="new-price">'.$product_name.'</li>
						</ul>
					</div>
					<a href="'.base_url().'product/detail/'.$row->product_id.'" class="button-new"> '.$this->lang->line("view_product").'</a>
				</div>
			</div>
			';
		}
	}
	$sql 	= "SELECT * FROM ryu_image where position = 'top' order by created_dttm desc";
	$query	= $this->db->query($sql);
	$listimagetop = "";
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$listimagetop .= '
			<img src="'.base_url().'/appadmin/'.$row->image_url.'" alt="slider-img" title="#caption1" />
			';
		}
	}
	$sql 	= "SELECT * FROM ryu_image where position = 'down' order by created_dttm desc";
	$query	= $this->db->query($sql);
	$listimagebottom = "";
	$capbottom 		 = "";
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$listimagebottom .= '
				<img src="'.base_url().'/appadmin/'.$row->image_url.'" alt="slider-img" title="#caption'.$row->image_id.'" />
			';
			$capbottom .= '				
				<div class="nivo-html-caption" id="caption'.$row->image_id.'" >
					<div class="container">
						<div class="row">
							<div class="col-lg-4">
								<div class="slider-text wow fadeInDownBig" data-wow-delay=".5s" >
									<h2>'.$row->image_desc.'</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			';
		}
	}
?>
		<!-- slider-area-start -->
		<div class="slider-area">
			<div id="slider">
				<?=$listimagetop?>
			</div>
		</div>
		<!-- slider-area-end -->
		<!-- banner-area-start -->
		<div class="banner-area ptb-50">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="single-banner text-center">
							<div class="banner-img phone mb-20">
								<a><img src="<?=base_url()?>appsources/img/banner/1.png" alt="banner" /></a>
							</div>
							<div class="banner-text">
								<h4><?=$this->lang->line('banner_text_price');?></h4>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 hidden-sm col-xs-12">
						<div class="single-banner text-center">
							<div class="banner-img card mb-20">
								<a><img src="<?=base_url()?>appsources/img/banner/4.png" alt="banner" /></a>
							</div>
							<div class="banner-text">
								<h4><?=$this->lang->line('banner_text_spread');?></h4>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="single-banner text-center">
							<div class="banner-img mb-20 plane">
								<a><img src="<?=base_url()?>appsources/img/banner/complete.png" alt="banner" /></a>
							</div>
							<div class="banner-text">
								<h4><?=$this->lang->line('banner_text_tech');?></h4>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="single-banner text-center">
							<div class="banner-img mb-20 light">
								<a><img src="<?=base_url()?>appsources/img/banner/3.png" alt="banner" /></a>
							</div>
							<div class="banner-text">
								<h4><?=$this->lang->line('banner_text_compatible');?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner-area-end -->
		<!-- banner-area-2-start -->
		<div class="banner-area-2 mb-50">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="single-banner-2">
							<a href="#"><img src="<?=base_url()?>appsources/img/banner/9.jpg" alt="banner" /></a>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="single-banner-2">
							<a href="#"><img src="<?=base_url()?>appsources/img/banner/10.jpg" alt="banner" /></a>
						</div>
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
						<div class="section-title mb-30">
							<h2><?=$this->lang->line('new_arrival');?></h2>
						</div>
					</div>
				</div>	
				<div class="product-active">
					<?=$retnewproduct?>
				</div>
				<div class="see-more">
					<a href="<?=base_url()?>product/all" class="button-new"><?=$this->lang->line('see_more');?></a>
				</div>
			</div>
		</div>
		<!-- pos_new_product-area-end -->		
		<!-- slider-area-start -->
		<div class="slider-area">
			<div id="slider2">
				<?=$listimagebottom?>
			</div>
			<?=$capbottom?>
		</div>
		<!-- slider-area-end -->