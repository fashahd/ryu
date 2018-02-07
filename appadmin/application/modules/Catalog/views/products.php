<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><?=$tittle?></h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Products List</h3>
					<div class="box-tools">
						<a class="btn btn-primary" href="<?=base_url()?>catalog/addproduct"><span class="fa fa-plus"></span></a>
						<a class="btn btn-danger" href="#" onClick="deleteProduct()"><span class="fa fa-trash"></span></a>
					</div>
				</div>
				<div class="box-body">					
					<table class="table table-bordered">
						<tr>
							<th style="width: 10px"><input type="checkbox" id="selectall"/></th>
							<th>Image</th>
							<th>Product Name</th>
							<th>Category</th>
							<th>Status</th>
							<th style="width: 40px">Action</th>
						</tr>
						<?=$listproduct?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>