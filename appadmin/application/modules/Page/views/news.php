<?php
	$month = date("m");
	$sql 	= "SELECT * FROM ryu_event WHERE MONTH(event_created_date) = '$month'";
	$query	= $this->db->query($sql);
	$list = "";
	if($query->num_rows()>0){
		$no = 1;
		foreach($query->result() as $row){
			$list .= "
				<tr>
					<td><input type='checkbox' name='event_id' id='cat_$row->event_id' value='$row->event_id'/></td>
					<td>$no</td>
					<td>$row->event_tittle</td>
					<td>".date("l, d M Y", strtotime($row->event_created_date))."</td>
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
	<div class="col-lg-12">
		<div class="box box-primary">
            <div class="box-header">
        	    <h3 class="box-title">Add News / Events</h3>
            </div>
            <div class="box-body">
				<form id="addEvent">
					<div class="row">
						<div class="form-group col-lg-4">
							<label>News / Event Title :</label>

							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-newspaper-o"></i>
								</div>
								<input required name="news" type="text" class="form-control pull-right" placeholder="News / Event Title">
							</div>
							<!-- /.input group -->
						</div>
						<div class="form-group col-lg-4">
							<label>News / Event Image :</label>

							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-image"></i>
								</div>
								<input required name="image_upload_file" type="file" class="form-control pull-right" placeholder="News / Event Image">
							</div>
							<!-- /.input group -->
						</div>
						<div class="form-group col-lg-12">
							<label>News / Event Content</label>
							<textarea name="content" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">List News & Events </h3>

				<div class="box-tools">
					<div class="input-group input-group-sm" style="width: 150px;text-align:right">						
						<span onclick="deleteevent()" class="btn btn-danger"><i class="fa fa-trash"></i></span>
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
							<th>Event Title</th>
							<th>Created Date</th>
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