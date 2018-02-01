<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><?=$tittle?></h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-4">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Add Categories</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form">
					<div class="box-body">
						<div class="form-group">
							<label for="categories">Category Name</label>
							<input type="text" class="form-control" name="categories" id="categories" placeholder="Category Name">
						</div>
						<div class="form-group">
							<label>Parent Menu</label>
							<select class="form-control" id="parentmenu" name="parentmenu">
								<option>-- Select Parent Menu --</option>
								<?=$optparentmenu?>
							</select>
						</div>
						<div class="form-group" id="categories">
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
			<!-- /.box -->
		</div>
	</div>
</section>