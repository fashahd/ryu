<?php
	$month = date("m");
	$sql 	= "SELECT * FROM ryu_service";
	$query	= $this->db->query($sql);
	$list = "";
	if($query->num_rows()>0){
		$no = 1;
		foreach($query->result() as $row){
			$list .= "
				<tr>
					<td><input type='checkbox' name='service_id' id='cat_$row->service_id' value='$row->service_id'/></td>
					<td>$no</td>
					<td>$row->service_store</td>
					<td>$row->service_address</td>
					<td>$row->service_phone</td>
					<td>$row->service_city</td>
					<td>$row->service_province</td>
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
				<form id="addService">
					<div class="row">
						<div class="form-group col-lg-6">
							<label>Store Name</label>
                            <input required name="store" type="text" class="form-control pull-right" placeholder="Store Name">
							<!-- /.input group -->
						</div>
						<!-- time Picker -->
						<div class="form-group col-lg-6">
							<div class="form-group">
								<label>Phone Number</label>
                                <input required  name="phone" type="text" class="form-control" placeholder="ex:(021) 99123123">
							</div>
						</div>
						<div class="form-group col-lg-6">
							<label>City</label>
							<input required name="city" type="text" class="form-control pull-right" placeholder="ex : Jakarta">
						</div>
						<div class="form-group col-lg-6">
							<label>Province</label>
							<input required name="province" type="text" class="form-control pull-right" placeholder="ex : Banten">
							<!-- /.input group -->
						</div>
						<!-- Date -->
						<div class="form-group col-lg-12">
							<label>Address</label>
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-map"></i>
								</div>
								<input required  name="address" type="text" class="form-control" placeholder="Address">
							</div>
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
				<h3 class="box-title">List <?=$tittle?> </h3>

				<div class="box-tools">
					<div class="input-group input-group-sm" style="width: 150px;text-align:right">						
						<span onclick="deleteservice()" class="btn btn-danger"><i class="fa fa-trash"></i></span>
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
							<th>Store Name</th>
							<th>Store Address</th>
							<th>Store Phone</th>
							<th>Store City</th>
							<th>Store Province</th>
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