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
			<div class="col-lg-12 col-md-9 col-sm-12 col-xs-12" style="padding-top:30px">
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
