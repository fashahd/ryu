<?php
	$month = date("m");
	$sql 	= "SELECT * FROM ryu_download";
	$query	= $this->db->query($sql);
	$list = "";
	if($query->num_rows()>0){
		$no = 1;
		foreach($query->result() as $row){
			$list .= "
				<tr>
					<td><input type='checkbox' name='download_id' id='cat_$row->id' value='$row->id'/></td>
					<td>$no</td>
					<td>$row->file_name</td>
					<td>$row->url_download</td>
				</tr>
			";
			$no++;
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
	<div class="col-lg-6">
		<div class="box box-primary">
            <div class="box-header">
        	    <h3 class="box-title">Add <?=$tittle?></h3>
            </div>
            <div class="box-body">
				<form id="addDownload">
					<div class="row">
						<div class="form-group col-lg-12">
							<label>File Name</label>
                            <input required name="file_name" type="text" class="form-control pull-right" placeholder="Download Name">
							<!-- /.input group -->
						</div>
						<!-- time Picker -->
						<div class="form-group col-lg-12">
							<div class="form-group">
								<label>URL Download</label>
                                <input required  name="url_download" type="text" class="form-control" placeholder="http://drive.google.com/file/xxxxx">
							</div>
						</div>
						<div class="form-group col-lg-6">
							<button class="btn btn-primary" type="submit">Add</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">List <?=$tittle?> </h3>

				<div class="box-tools">
					<div class="input-group input-group-sm" style="width: 150px;text-align:right">						
						<span onclick="deletedownload()" class="btn btn-danger"><i class="fa fa-trash"></i></span>
					</div>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<thead>
						<tr>
							<th style="width: 10px"><input type="checkbox" id="selectall"/></th>
							<th>#</th>
							<th>File Name</th>
							<th>Url Download</th>
						</tr>
					</thead>
					<tbody>
						<?=$list?>
					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
<!-- /.row -->