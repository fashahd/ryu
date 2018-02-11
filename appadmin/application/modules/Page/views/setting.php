<?php
	$sql 	= "SELECT image_cover, video, menu_desc FROM ryu_menu where menu_id = '$page_id'";
	$query 	= $this->db->query($sql);
	$row 	= $query->row();
	$image_cover = $row->image_cover;
	$video 	= $row->video;
	$menu_desc 	= $row->menu_desc;
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
					<form method="post" id="desc_page">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label><?=$category_name?> Description</label>
									<textarea name="desc" class="form-control"><?=$menu_desc?></textarea>
									<input type="hidden" name="menu_id" value="<?=$page_id?>" />
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
					<h3 class="box-title">Video Page</h3>
				</div>
				<div class="box-body">
					<form method="post" id="video_page">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Video URL</label>
									<input value="<?=$video?>" class="form-control" type="text" name="video_url" placeholder="Video URL">
									<input type="hidden" name="menu_id" value="<?=$page_id?>" />
								</div>
							</div>
						</div>
						<button class="btn btn-primary" type="submit">Save</button>
					</form>
					<video controls style="width:80%;margin-top:30px">
					<source src='<?=$video?>' type='video/mp4'>
						Your browser does not support HTML5 video.
					</video>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Image Cover</h3>
				</div>
				<div class="box-body">
					<form method="post" enctype="multipart/form-data" id="image_upload_form">
						<input type="file" accept="image/*" name="image_upload_file" id="image_upload_file">
						<input type="hidden" name="menu_id" value="<?=$page_id?>" />
						<button>Save</button>
					</form>
					<div id="imgArea" class="card-avatar">
						<img src="<?=base_url().$image_cover?>" class="circle z-depth-2 responsive-img activator">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</section>