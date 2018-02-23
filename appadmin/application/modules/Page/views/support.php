<?php
	
	$support_title 		= "";
	$support_tagline 	= "";
	$support_subtitle 	= "";
	$support_isi 		= "";
	$support_title_id 		= "";
	$support_tagline_id 	= "";
	$support_subtitle_id 	= "";
	$support_isi_id 		= "";
	$sql 	= "SELECT * FROM ryu_support where support_id = '$support_id'";
	$query	= $this->db->query($sql);
	if($query->num_rows()>0){
		$row = $query->row();
		$support_title 		= $row->support_title;
		$support_tagline 	= $row->support_tagline;
		$support_subtitle 	= $row->support_subtitle;
		$support_isi 	= $row->support_isi;
		
		$support_title_id 		= $row->support_title_id;
		$support_tagline_id 	= $row->support_tagline_id;
		$support_subtitle_id 	= $row->support_subtitle_id;
		$support_isi_id 	= $row->support_isi_id;
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
	<div class="col-lg-12">
		<div class="box box-primary">
            <div class="box-header">
        	    <h3 class="box-title">Page <?=$tittle?> (English)</h3>
            </div>
            <div class="box-body">
				<form id="update_support">
					<div class="row">
						<div class="form-group col-lg-6">
							<label><?=$tittle?> Title</label>
                            <input value="<?=$support_title?>" name="title" type="text" class="form-control pull-right" placeholder="<?=$tittle?> Title">
							<input name="support_id" type="hidden" value="<?=$support_id?>"/>
							<!-- /.input group -->
						</div>
						<!-- time Picker -->
						<div class="form-group col-lg-6">
							<div class="form-group">
								<label><?=$tittle?> Tagline</label>
                                <input value="<?=$support_tagline?>"  name="tagline" type="text" class="form-control" placeholder="<?=$tittle?> Tagline">
							</div>
						</div>
						<div class="form-group col-lg-6">
							<label><?=$tittle?> Subtitle</label>
							<input value="<?=$support_subtitle?>" name="subtitle" type="text" class="form-control pull-right" placeholder="<?=$tittle?> Subtitle">
						</div>
						<!-- Date -->
						<div class="form-group col-lg-12">
							<label><?=$tittle?> Content</label>
							<textarea name="content" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$support_isi?></textarea>
							<!-- /.input group -->
						</div>
						<div class="form-group col-lg-6">
							<button class="btn btn-primary" type="submit">Add</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="col-lg-12">
		<div class="box box-primary">
            <div class="box-header">
        	    <h3 class="box-title">Page <?=$tittle?> (Indonesia)</h3>
            </div>
            <div class="box-body">
				<form id="update_support_id">
					<div class="row">
						<div class="form-group col-lg-6">
							<label><?=$tittle?> Title</label>
                            <input value="<?=$support_title_id?>" name="title" type="text" class="form-control pull-right" placeholder="<?=$tittle?> Title">
							<input name="support_id" type="hidden" value="<?=$support_id?>"/>
							<!-- /.input group -->
						</div>
						<!-- time Picker -->
						<div class="form-group col-lg-6">
							<div class="form-group">
								<label><?=$tittle?> Tagline</label>
                                <input value="<?=$support_tagline_id?>"  name="tagline" type="text" class="form-control" placeholder="<?=$tittle?> Tagline">
							</div>
						</div>
						<div class="form-group col-lg-6">
							<label><?=$tittle?> Subtitle</label>
							<input value="<?=$support_subtitle_id?>" name="subtitle" type="text" class="form-control pull-right" placeholder="<?=$tittle?> Subtitle">
						</div>
						<!-- Date -->
						<div class="form-group col-lg-12">
							<label><?=$tittle?> Content</label>
							<textarea name="content" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$support_isi_id?></textarea>
							<!-- /.input group -->
						</div>
						<div class="form-group col-lg-6">
							<button class="btn btn-primary" type="submit">Add</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>