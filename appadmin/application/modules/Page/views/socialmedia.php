<?php
	$facebook = "";
	$instagram = "";
	$sql 	= "SELECT * FROM ryu_social";
	$query	= $this->db->query($sql);
	if($query->num_rows()>0){
		$row 	= $query->row();
		$facebook = $row->facebook;
		$instagram = $row->instagram;
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
	<div class="col-lg-4">
		<div class="box box-primary">
            <div class="box-header">
        	    <h3 class="box-title">Add <?=$tittle?></h3>
            </div>
            <div class="box-body">
				<form id="addsocial">
					<div class="row">
						<div class="form-group col-lg-12">
							<label>Facebook</label>                            
							<div class="input-group">
								<div class="input-group-addon">
									www.facebook.com/
								</div>
								<input value="<?=$facebook?>" type="text" class="form-control" name="facebook" placeholder="ex: john">
							</div>
						</div>
						<!-- time Picker -->
						<div class="form-group col-lg-12">
							<label>Instagram</label>
							<div class="input-group">
								<div class="input-group-addon">
									www.instagram.com/
								</div>
								<input value="<?=$instagram?>" type="text" class="form-control" name="instagram" placeholder="ex: john">
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
</div>
<!-- /.row -->