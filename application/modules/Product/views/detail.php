<?php
	list($product_note,$product_id,$product_name,$product_image1,$product_image2,$product_image3,$menu_title,$sub_name,$product_layout)=$detail;
	if($sub_name != ''){
		$sub_name1 = '<li><a href="#">/</a></li><li><a href="#">'.$sub_name.'</a></li>';
	}else{
		$sub_name1 = "";
	}
?>

<!-- breadcrumb-area-start -->
<div class="breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-content text-center">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">/</a></li>
						<li><a href="#"><?=$menu_title?></a></li>
						<?=$sub_name1?>
						<li><a href="#">/</a></li>
						<li><a href="#"><?=$product_name?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumb-area-end -->
<!-- product-details-area-start -->
<div class="product-details-area" style="padding-top:90px">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				<div class="flexslider">
					<ul class="slides">
						<?php if($product_image1 != ""){?>
						<li data-thumb="<?=base_url()?>appadmin/<?=$product_image1?>">
							<img src="<?=base_url()?>appadmin/<?=$product_image1?>" alt="<?=$product_name?>" />
						</li>
						<?php } ?>
						<?php if($product_image2 != ""){?>
						<li data-thumb="<?=base_url()?>appadmin/<?=$product_image2?>">
							<img src="<?=base_url()?>appadmin/<?=$product_image2?>" alt="<?=$product_name?>" />
						</li>
						<?php } ?>
						<?php if($product_image3 != ""){?>
						<li data-thumb="<?=base_url()?>appadmin/<?=$product_image3?>">
							<img src="<?=base_url()?>appadmin/<?=$product_image3?>" alt="<?=$product_name?>" />
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
				<div class="product-info-main">
					<div class="page-title">
						<h4><?=$menu_title?></h4>
					</div>
					<div class="page-title">
						<h1><?=$product_name?></h1>
					</div>
					<div class="short_description_block">
						<p><?=$product_note?></p>
					</div>
					<div class="socialsharing_product">
						<p>share this product</p>
						<a href="#" style="margin-left:0px"><img src="<?=base_url()?>/appsources/img/logo/facebook.jpg" alt="flag" /></a> 
						<a href="#" style="margin-left:0px"><img src="<?=base_url()?>/appsources/img/logo/instagram.jpg" alt="flag" /></a> 
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- product-details-area-end -->
<?php if($product_layout == "layout_1"){?>
<!-- more-info-area-start -->
<div class="more-info-area pt-50">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- tab-menu-start -->
				<div class="tab-menu mb-40">
					<ul>
						<li>Specification</li>
					</ul>
				</div>
				<!-- tab-menu-end -->
			</div>
		</div>
		<!-- tab-area-start -->
		<div class="tab-content">
			<div class="tab-pane active" id="More">
				<div class="row">
					<div class="col-lg-12">
						<div class="rate">
							<div class="table-responsive">          
							<table class="table table-striped">
								<colgroup>
									<col width="50">
									<col width="5">
									<col width="40">
								</colgroup>
								<tbody>
									<?php
										if($spek){
											foreach($spek as $row){
												echo '
													<tr>
														<td style="font-weight:700;font-size:12pt">'.$row->product_model.'</td>
														<td style="text-align:right">:</td>
														<td>'.$row->product_description.'</td>
													</tr>
												';
											}
										}
									?>
								</tbody>
							</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<!-- product-details-area-end -->
<?php if($product_layout == "layout_2"){?>
<!-- more-info-area-start -->
<div class="more-info-area pt-50">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- tab-menu-start -->
				<div class="tab-menu mb-40">
					<ul>
						<li>Description</li>
					</ul>
				</div>
				<!-- tab-menu-end -->
			</div>
		</div>
		<!-- tab-area-start -->
		<div class="tab-content">
			<div class="tab-pane active" id="More">
				<div class="row">
					<div class="col-lg-12">
						<div class="rate">
							<div class="table-responsive">          
							<table class="">
								<colgroup>
									<col width="40%">
									<col width="10%">
									<col width="50%">
								</colgroup>
								<thead>
									<tr>
										<th style="text-transform:uppercase">Model</th>
										<th style="text-transform:uppercase">Description</th>
									</tr>
								</thead>
								<tbody>
									<?php
										if($spek){
											foreach($spek as $row){
												echo '
													<tr>
														<td style="padding: 5px 0 5px 0">'.$row->product_model.'</td>
														<td style="padding: 5px 0 5px 0">'.$row->product_description.'</td>
													</tr>
												';
											}
										}
									?>
								</tbody>
							</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>