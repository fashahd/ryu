<?php
	$sql 	= "SELECT image_cover, video, menu_desc, menu_desc_id FROM ryu_menu where menu_id = '$category_id'";
	$query 	= $this->db->query($sql);
	$row 	= $query->row();
	$image_cover = $row->image_cover;
	$video 	= $row->video;
	$menu_desc = $row->menu_desc;
	$menu_desc_id = $row->menu_desc_id;
	if($image_cover == ""){
		$image_cover = "appsources/banner/13.jpg";
	}
	
	if($this->session->userdata('site_lang') == "indonesia"){
		if($menu_desc_id != ''){
			$menu_desc = $menu_desc_id;
		}
	}
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
						<div class="slider-text wow" >
							<a href="'.base_url().'product/shop/'.$h->menu_id.'"><p><span>'.$h->menu_title.'</span></p></a>
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
					<div class="col-lg-12">
						<div class="slider-text wow" >
							<p style="font-size:12pt;margin-left:-15px"><a href="'.base_url().'product/shop/'.$h->menu_id.'">'.$h->menu_title.'</a></p>
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
				<img src="<?=base_url()."appadmin/".$image_cover?>" alt="slider-img" title="#caption1" />
			</div>
			<div class="nivo-html-caption" id="caption1" >
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="slider-text wow" >
								<h2><span><?=$tittle?></span></h2>
								<p><?=$menu_desc?></p>
							</div>
						</div>
						<div class="col-lg-6">
						<?=listdetail($category_id)?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- slider-area-end -->
		<!-- banner-area-2-start -->
		<!-- <div class="banner-area-2 mb-50">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="single-banner-2" style="text-align:center">
						<div style="width:100%;height:100%;width: 820px; height: 461.25px; float: none; clear: both; margin: 2px auto;">
  <embed src="http://www.youtube.com/v/<?=$video?>=6s?version=3&amp;hl=en_US&amp;rel=0&amp;autohide=1&amp;autoplay=1" wmode="transparent" type="application/x-shockwave-flash" width="100%" height="100%" allowfullscreen="true" title="Adobe Flash Player">
</div> 
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					</div>
				</div>
			</div>
		</div> -->
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