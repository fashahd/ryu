<?php
	$month = date("m");
	$sql 	= "SELECT * FROM ryu_download";
	$query	= $this->db->query($sql);
	$list = "";
	if($query->num_rows()>0){
		$no 	= 1;
		$row 	= $query->row();
		$filename = $row->file_name;
		$url 	= $row->url_download;
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
	<div class="col-lg-6">
		<div class="box box-primary">
            <div class="box-header">
        	    <h3 class="box-title">Url <?=$tittle?></h3>
            </div>
            <div class="box-body">
				<form id="addDownload">
					<div class="row">
						<!-- time Picker -->
						<div class="form-group col-lg-12">
							<div class="form-group">
								<label>URL Download</label>
                                <input required  name="url_download" type="text" class="form-control" placeholder="http://drive.google.com/file/xxxxx" value="<?=$url?>">
							</div>
						</div>
						<div class="form-group col-lg-6">
							<button class="btn btn-primary" type="submit">Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.row -->