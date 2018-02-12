<?php
	$sql 	= "SELECT * FROM ryu_subcategory WHERE sub_parent_id = '$category_id'";
	$query	= $this->db->query($sql);
	$sublist = "";
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$sql 		= "SELECT * FROM ryu_product WHERE product_subcategory = '$row->sub_id'";
			$query 		= $this->db->query($sql);
			$sublist   .= '<li><a href="'.base_url().'product/category/'.$row->sub_id.'">'.$row->sub_name.' ('.$query->num_rows().')</a></li>';
		}
	}
?>

<!-- breadcrumb-area-start -->
<div class="breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-content text-center">
					<ul>
						<li><a href="#">Home / </a></li>
						<li><a href="#"><?=$tittle?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="breadcrumb-area-down">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-content-down text-center">
					<div class="breadcrumb-title">
						<h3><a href="#"><?=$tittle?></a></h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumb-area-end -->
<!-- shop-main-area-start -->
<div class="shop-main-area" style="background:#f0f0f0">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<!-- shop-left-area-start -->
				<div class="shop-left-area" style="padding-top:40px">
					<!-- single-shop-left-start -->
					<div class="single-shop-left mb-30">
						<div class="shop-left-title">
							<h3> <?=$tittle?> Category</h3>
						</div>
						<div class="shop-left-menu">
							<ul>
								<?=$sublist?>
							</ul>
						</div>
					</div>
					<!-- single-shop-left-end -->
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding-top:30px">
				<!-- tab-area-start -->
				<div class="tab-content">
					<div class="tab-pane active" id="th">
						<div class="row">
							<?=$listproduct?>
						</div>
					</div>
				</div>
				<!-- pagination-area-start -->
				<div class="pagination-area">
					<?=$pagination?>
					<!-- <div class="pagination-number">
						<ul>
							<li><a href="#"><i class="fa fa-angle-left"></i></a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
						</ul>
					</div> -->
				</div>
				<!-- pagination-area-end -->
			</div>
		</div>
	</div>
</div>
