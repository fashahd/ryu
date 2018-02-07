<?php
	function treemenu($hasil = null,$parent =0){
		$CI     = &get_instance();
		$list = "";
		$sql    = " SELECT * FROM `ryu_menu`
					WHERE menu_parent_id = '$parent' AND editable <> 'no'
					ORDER BY menu_order asc";
		$query  = $CI->db->query($sql);
		if($query->num_rows()>0){
			foreach($query->result() as $h){
				$cek_parent=$CI->db->query("SELECT * from ryu_menu WHERE menu_parent_id='$h->menu_id'");
				// if($cek_parent->num_rows()>0){
				// 	$list .= "<tr><td></td><td>$h->menu_title</td><td>$h->menu_order</td></tr>";
				// }else{
					$list .= "<tr><td><input type='checkbox' id='cat_$h->menu_id' value='cat_$h->menu_id'/></td><td>$h->menu_title</td><td>$h->menu_order</td><td><button onClick='editCategories(\"$h->menu_id\")'><span class='fa fa-edit'></span></button></td></tr>";
				// }
				$list .= childmenu($h->menu_id,$h->menu_title);
			}
		}

		return $list;
	}

	function childmenu($menu_id = 0,$menu_title){
		$CI     = &get_instance();
		$list = "";
		$sql    = " SELECT * FROM `ryu_menu`
					WHERE menu_parent_id = '$menu_id'
					ORDER BY menu_order asc";
		$query  = $CI->db->query($sql);
		if($query->num_rows()>0){
			foreach($query->result() as $h){
				$cek_parent=$CI->db->query("SELECT * from ryu_menu as a WHERE a.menu_parent_id='$h->menu_id'");
				// if($cek_parent->num_rows()>0){
				// 	$list .= "<tr><td></td><td>$menu_title > $h->menu_title</td><td>$h->menu_order</td></tr>";
				// }
				// else {
					$list .= "<tr><td><input type='checkbox' id='cat_$h->menu_id' value='cat_$h->menu_id'/></td><td>$menu_title > $h->menu_title</td><td>$h->menu_order</td><td><button onClick='editCategories(\"$h->menu_id\")'><span class='fa fa-edit'></span></button></td></tr>";
				// }
				$list .= childmenu($h->menu_id,$h->menu_title);
			}
		}
		return $list;
	}
?>
<!-- Content Header (Page header) -->
<div id="notif"></div>
<section class="content-header">
	<h1><?=$tittle?></h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Add Category</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div id="notif"></div>
				<form role="form" id="categories">
					<div class="box-body">
						<div class="form-group">
							<label for="category_name">Category Name</label>
							<input required type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name">
						</div>
						<div class="form-group">
							<label>Category Parent</label>
							<select required class="form-control" name="category_parent">
								<option>-- Select Category Parent --</option>
								<?=$optparentmenu?>
							</select>
						</div>
						<div class="form-group">
							<label for="category_name">Category Order</label>
							<input required type="number" class="form-control" id="category_order" name="category_order" placeholder="Category Order">
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Add</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Categories List</h3>
					<table class="table table-bordered">
						<tr>
							<th style="width: 10px">#</th>
							<th>Category Name</th>
							<th>Sort Order</th>
							<th style="width: 40px">Action</th>
						</tr>
						<?=treemenu()?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>