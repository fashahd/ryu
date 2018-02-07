<!-- Content Header (Page header) -->
<div id="notif"></div>
<section class="content-header">
	<h1><?=$tittle?></h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Add Subcategory</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div id="notif"></div>
				<form role="form" id="subcategories">
					<div class="box-body">
						<div class="form-group">
							<label for="category_name">Subcategory Name</label>
							<input required type="text" class="form-control" id="category_name" name="category_name" placeholder="Subcategory Name">
						</div>
						<div class="form-group">
							<label>Subcategory Parent</label>
							<select required class="form-control" name="category_parent">
								<option>-- Select Subcategory Parent --</option>
								<?=$optparentmenu?>
							</select>
						</div>
						<div class="form-group">
							<label for="category_name">Subcategory Order</label>
							<input required type="number" class="form-control" id="category_order" name="category_order" placeholder="Subcategory Order">
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Add</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Subcategory List</h3>
					<table class="table table-bordered">
						<tr>
							<th style="width: 10px">#</th>
							<th>Subcategory Name</th>
							<th>Sort Order</th>
							<th style="width: 40px">Action</th>
						</tr>
						<?=$subcategory?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>