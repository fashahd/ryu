<?php
	$sql 	= "SELECT * FROM ryu_segmentation WHERE seg_type= 'metal'";
	$query	= $this->db->query($sql);
	$seg_pic 	= "";
	$seg_desc 	= "";
	$seg_desc_id = "";
	if($query->num_rows()>0){
		$row = $query->row();
		$seg_pic 	 = $row->seg_pic;
		$seg_desc 	 = $row->seg_desc;
		$seg_desc_id = $row->seg_desc_id;
	}
	
	$sql 	= "SELECT * FROM ryu_segmentation WHERE seg_type= 'wood'";
	$query	= $this->db->query($sql);
	$seg_pic_wood 	= "";
	$seg_desc_wood 	= "";
	$seg_desc_id_wood = "";
	if($query->num_rows()>0){
		$row = $query->row();
		$seg_pic_wood 	 = $row->seg_pic;
		$seg_desc_wood 	 = $row->seg_desc;
		$seg_desc_id_wood = $row->seg_desc_id;
	}
	
	$sql 	= "SELECT * FROM ryu_segmentation WHERE seg_type= 'general'";
	$query	= $this->db->query($sql);
	$seg_pic_general 	= "";
	$seg_desc_general 	= "";
	$seg_desc_id_general = "";
	if($query->num_rows()>0){
		$row = $query->row();
		$seg_pic_general 	 = $row->seg_pic;
		$seg_desc_general 	 = $row->seg_desc;
		$seg_desc_id_general = $row->seg_desc_id;
	}
	
	if($this->session->userdata('site_lang') == "indonesia"){
		if($seg_desc_id != ''){
			$seg_desc = $seg_desc_id;
		}
		if($seg_desc_id_wood != ''){
			$seg_desc_wood = $seg_desc_id_wood;
		}
		if($seg_desc_id_general != ''){
			$seg_desc_general = $seg_desc_id_general;
		}
	}
?>
<!-- slider-area-start -->
<div class="slider-area">
<div id="slider">
	<img src="<?=base_url()?>appadmin/<?=$seg_pic?>" alt="slider-img" title="#caption1" />
</div>
<div class="nivo-html-caption" id="caption1" >
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="slider-text">
					<h2><span>METAL WORKING</span></h2>
					<p><?=$seg_desc?></p>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="slider-text">
					<ul>
						<li class="left">Angle Grinders</li>
						<li class="left">Bench Grinders</li>
						<li class="left">Cut Off Saws</li>
						<li class="left">Die Grinders</li>
						<li class="left">Drills</li>
						<li class="left">Impact Drills</li>
						<li class="left">Magnetic Drills</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- slider-area-end -->
<!-- slider-area-start -->
<div class="slider-area">
<div id="slider2">
	<img src="<?=base_url()?>appadmin/<?=$seg_pic_wood?>" alt="slider-img" title="#caption2" />
</div>
<div class="nivo-html-caption" id="caption2" >
	<div class="container">
		<div class="row">
			<div class="col-lg-2">
			</div>
			<div class="col-lg-2" style="text-align:right">
				<div class="slider-text">
					<ul>
						<li class="right">Orbital Sanders</li>
						<li class="right">Planer</li>
						<li class="right">Routers</li>
						<li class="right">Wood Trimmers</li>
						<li class="right">Circular Saws</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-8" style="text-align:right">
				<div class="slider-text">
					<h2><span>Wood Working</span></h2>
					<p><?=$seg_desc_wood?></p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- slider-area-end -->

<!-- slider-area-start -->
<div class="slider-area">
<div id="slider3">
	<img src="<?=base_url()?>appadmin/<?=$seg_pic_general?>" alt="slider-img" title="#caption3" />
</div>
<div class="nivo-html-caption" id="caption3" >
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="slider-text">
					<h2><span>GENERAL WORKING</span></h2>
					<p><?=$seg_desc_general?></p>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="slider-text">
					<ul>
						<li class="left">Angle Polishers</li>
						<li class="left">Blowers</li>
						<li class="left">Cordless</li>
						<li class="left">Demolition Hammers</li>
						<li class="left">Gun Polishers</li>
						<li class="left">Marble Cutters</li>
						<li class="left">Pressure Washers</li>
						<li class="left">Rotary Hammers</li>
						<li class="left">Miter Saws</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- slider-area-end -->