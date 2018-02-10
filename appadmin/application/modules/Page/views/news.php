<?php
	$month = date("m");
	$sql 	= "SELECT * FROM ryu_event WHERE MONTH(event_date) = '$month'";
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
					<td>".date("l, d M Y", strtotime($row->event_date))." ".date("H:i", strtotime($row->event_time))."</td>
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
        	    <h3 class="box-title">Add News / Events</h3>
            </div>
            <div class="box-body">
				<form id="addEvent">
					<div class="row">
						<div class="form-group col-lg-12">
							<label>News / Event Title :</label>

							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-newspaper-o"></i>
								</div>
								<input required name="news" type="text" class="form-control pull-right" placeholder="News / Event Title">
							</div>
							<!-- /.input group -->
						</div>
						<!-- Date -->
						<div class="form-group col-lg-6">
							<label>News / Event Date :</label>

							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input required  name="tanggal" type="text" class="form-control pull-right" id="datepicker" value="<?=date("Y-m-d")?>">
							</div>
							<!-- /.input group -->
						</div>
						<!-- time Picker -->
						<div class="bootstrap-timepicker col-lg-6">
							<div class="form-group">
								<label>News / Event Time :</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
									<input required  name="time" type="text" class="form-control timepicker">
								</div>
								<!-- /.input group -->
							</div>
							<!-- /.form group -->
						</div>
						<div class="form-group col-lg-6">
							<button class="btn btn-primary" type="submit">Add</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-xs-6">
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
							<th>Event Date</th>
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