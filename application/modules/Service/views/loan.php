<?php
		$support_title 		= "";
		$support_tagline 	= "";
		$support_subtitle 	= "";
		$support_isi 		= "";
	$sql = "SELECT * FROM ryu_support WHERE support_id = 'loan'";
	$query 	= $this->db->query($sql);
	if($query->num_rows()>0){
		$row 			= $query->row();
		$support_title 		= $row->support_title;
		$support_tagline 	= $row->support_tagline;
		$support_subtitle 	= $row->support_subtitle;
		$support_isi 		= $row->support_isi;
	}
?>
<!-- breadcrumb-area-start -->
<div class="breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-content text-center">
					<div class="breadcrumb-title text-left">
						<h3><a href="#"><?=$support_title?></a></h3>
						<p style="font-weight:700;margin-top:10px"><?=$support_tagline?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="breadcrumb-area-down">
	<div class="container">
		<div class="row">
			<div class="col-lg-12" style="margin-top:30px">
				<div class="breadcrumb-content-down">					
					<div class="col-lg-12 col-xs-12">
						<h2><?=$support_subtitle?></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="warranty">
		<?=$support_isi?>
	</div>
</div>