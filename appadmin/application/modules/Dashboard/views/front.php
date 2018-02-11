<?php
	$sql 	= "SELECT * FROM ryu_image where position = 'top' order by created_dttm desc";
	$query	= $this->db->query($sql);
	$listimagetop = "";
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$listimagetop .= '
			<div class="col-md-3">
				<img class="img-responsive pad" src="'.base_url().''.$row->image_url.'" alt="Photo">
				<p>'.$row->image_desc.'</p>
				<button onclick="deleteslider(\''.$row->image_id.'\')" type="button" class="btn btn-danger btn-xs"><i class="fa fa-delete"></i> Delete</button>
			</div>
			';
		}
	}
	$sql 	= "SELECT * FROM ryu_image where position = 'down' order by created_dttm desc";
	$query	= $this->db->query($sql);
	$listimagebottom = "";
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$listimagebottom .= '
			<div class="col-md-3">
				<img class="img-responsive pad" src="'.base_url().''.$row->image_url.'" alt="Photo">
				<p>'.$row->image_desc.'</p>
				<button onclick="deleteslider(\''.$row->image_id.'\')" type="button" class="btn btn-danger btn-xs"><i class="fa fa-delete"></i> Delete</button>
			</div>
			';
		}
	}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><?=$tittle?></h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3><?=$jml_product?></h3>
					<p>Products</p>
				</div>
				<div class="icon">
					<i class="ion ion-bag"></i>
				</div>
				<a href="<?=base_url()?>catalog/products" class="small-box-footer">See More <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>4</h3>
					<p>Categories</p>
				</div>
				<div class="icon">
					<i class="fa fa-folder-open"></i>
				</div>
				<a href="#" class="small-box-footer">See More <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>65</h3>

					<p>Pages</p>
				</div>
				<div class="icon">
					<i class="fa fa-desktop"></i>
				</div>
				<a href="#" class="small-box-footer">See More <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>2</h3>

				<p>Users</p>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<a href="#" class="small-box-footer">See More <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-md-12">
			<!-- Box Comment -->
			<div class="box box-widget">
				<div class="box-header with-border">
					<div class="user-block">
						<h4>Home Slider</h4>
					</div>
					<!-- /.user-block -->
					<div class="box-tools">
						<button class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i></button>
					</div>
					<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div class="user-block">
								<h4>Top Slider</h4>
							</div>
							<?=$listimagetop?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="user-block">
								<h4>Bottom Slider</h4>
							</div>
							<?=$listimagebottom?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="addslider" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<span type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></span>
						<h4 class="modal-title">Add Image Slider</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Upload Image</label>
							<input required type="file" name="imageslider" />
						</div>
						<div class="form-group">
							<label>Position</label>
							<select required class="form-control" name="position">
								<option value="top">Top</option>
								<option value="down">Down</option>
							</select>
						</div>
						<div class="form-group">
							<label>Image Description</label>
							<textarea name="imagedesc" class="form-control"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<span type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</span>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
</section>