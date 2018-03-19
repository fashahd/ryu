<?php
	$sql 	= "SELECT * FROM ryu_download";
	$query 	= $this->db->query($sql);
	$listservice = "";
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$listservice .= '
			<h3>'.$row->file_name.' <span><a target="_blank" href="'.$row->url_download.'">Click here to Download</a></span></h3>
			';
		}
	}
?>
<!-- breadcrumb-area-start -->
<div class="breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-content text-center">
					<div class="breadcrumb-title text-left">
						<h3><a href="#"><?=$tittle?></a></h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="breadcrumb-area-down">
	<!-- coupon-area-area-start -->
	<div class="coupon-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="coupon-accordion">
						<?=$listservice?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- coupon-area-area-end -->
</div>