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
	$sql_1 = "SELECT * FROM ryu_menu where menu_parent_id = '66' order by menu_order asc";
	$query_1	= $this->db->query($sql_1);
	$list1 = "";
	if($query_1->num_rows()>0){
		foreach($query_1->result() as $row1){
			$list1 .= '
				<li class="left"><a href="'.base_url().'product/shop/'.$row1->menu_id.'">'.$row1->menu_title.'</a></li>
			';
		}
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
	$sql_2 = "SELECT * FROM ryu_menu where menu_parent_id = '67' order by menu_order asc";
	$query_2	= $this->db->query($sql_2);
	$list2 = "";
	if($query_2->num_rows()>0){
		foreach($query_2->result() as $row2){
			$list2 .= '
				<li class="right"><a href="'.base_url().'product/shop/'.$row2->menu_id.'">'.$row2->menu_title.'</a></li>
			';
		}
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
	
	$sql_3 = "SELECT * FROM ryu_menu where menu_parent_id = '75' order by menu_order asc";
	$query_3	= $this->db->query($sql_3);
	$list3 = "";
	if($query_3->num_rows()>0){
		foreach($query_3->result() as $row3){
			$list3 .= '
				<li class="left"><a href="'.base_url().'product/shop/'.$row3->menu_id.'">'.$row3->menu_title.'</a></li>
			';
		}
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
			<div class="col-lg-3">
				<div class="slider-text">
					<ul>
						<?=$list1?>
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
			<div class="col-lg-3" style="text-align:right">
				<div class="slider-text">
					<ul>
						<?=$list2?>
					</ul>
				</div>
			</div>
			<div class="col-lg-7" style="text-align:right">
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
			<div class="col-lg-3">
				<div class="slider-text">
					<ul>
						<?=$list3?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- slider-area-end -->