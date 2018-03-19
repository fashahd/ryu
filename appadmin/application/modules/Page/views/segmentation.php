<?php
	$sql 	= "SELECT * FROM ryu_segmentation WHERE seg_type= '$page_id'";
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
?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><?=$tittle?> <?=$category_name?></h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Page Description</h3>
				</div>
				<div class="box-body">
					<form method="post" id="desc_page_segmentation">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label><?=$category_name?> Description (English)</label>
									<textarea name="desc_seg" class="form-control"><?=$seg_desc?></textarea>
									<input name="seg_type" type="hidden" value="<?=$page_id?>"/>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label><?=$category_name?> Description (Indonesia)</label>
									<textarea name="desc_seg_id" class="form-control"><?=$seg_desc_id?></textarea>
								</div>
							</div>
						</div>
						<button class="btn btn-primary" type="submit">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Image Cover</h3>
				</div>
				<div class="box-body">
					<form method="post" enctype="multipart/form-data" id="image_upload_form_segment">
						<input type="file" accept="image/*" name="image_upload_file" id="image_upload_file">
						<input type="hidden" name="seg_type" value="<?=$page_id?>" />
						<button>Save</button>
					</form>
					<div id="imgArea" class="card-avatar">
						<img src="<?=base_url()?><?=$seg_pic?>" class="circle z-depth-2 responsive-img activator">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</section>