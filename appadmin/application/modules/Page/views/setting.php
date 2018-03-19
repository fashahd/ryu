<?php
	$sql 	= "SELECT image_cover, video, menu_desc, menu_desc_id FROM ryu_menu where menu_id = '$page_id'";
	$query 	= $this->db->query($sql);
	$row 	= $query->row();
	$image_cover = $row->image_cover;
	$video 	= $row->video;
	$menu_desc 	= $row->menu_desc;
	$menu_desc_id 	= $row->menu_desc_id;
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
							<input type="hidden" name="menu_id" value="<?=$page_id?>" />
							<div class="col-lg-6">
								<div class="form-group">
									<label><?=$category_name?> Description (English)</label>
									<textarea name="desc" class="form-control"><?=$menu_desc?></textarea>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label><?=$category_name?> Description (Indonesia)</label>
									<textarea name="desc_id" class="form-control"><?=$menu_desc_id?></textarea>
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
								<div class="input-group">
									<div class="input-group-addon">
										http://youtube.com/v/
									</div>
									<input value="<?=$video?>" class="form-control" type="text" name="video_url" placeholder="Video URL">
									<input type="hidden" name="menu_id" value="<?=$page_id?>" />
								</div>
							</div>
						</div>
						<br>
						<button class="btn btn-primary" type="submit">Save</button>
					</form>
						<div style="width:100%;height:100%;width: 820px; height: 461.25px; float: none; clear: both; margin: 2px auto;">
  <embed src="http://www.youtube.com/v/<?=$video?>=6s?version=3&amp;hl=en_US&amp;rel=0&amp;autohide=1&amp;autoplay=1" wmode="transparent" type="application/x-shockwave-flash" width="100%" height="100%" allowfullscreen="true" title="Adobe Flash Player">
</div> 
						</div>
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