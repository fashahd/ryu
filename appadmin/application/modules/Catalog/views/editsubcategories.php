<?php
    if($subcategories){
        foreach($subcategories as $row){
            $sub_id = $row->sub_id;
            $sub_name = $row->sub_name;
            $sub_order = $row->sub_order;
            $sub_parent_id = $row->sub_parent_id;
        }
    }
    function optcategory($menu_parent_id,$menu_id){
        $CI     = &get_instance();
        $list = "";
        $sql    = " SELECT * FROM `ryu_menu`
                    WHERE menu_parent_id = '0' AND editable <> 'no'
                    ORDER BY menu_order asc";
        $query  = $CI->db->query($sql);
        if($query->num_rows()>0){
            foreach($query->result() as $h){
                if($h->menu_id == $menu_parent_id){
                    $slct = "selected";
                }else{
                    $slct = "";
                }
                $list .= "<option $slct value='$h->menu_id'>$h->menu_title</option>";
                $list .= childmenu($h->menu_id,$h->menu_title,$menu_parent_id);
            }
        }
        return $list;
    }

    function childmenu($menu_id,$menu_title,$menu_parent_id){
        $CI     = &get_instance();
        $list = "";
        $sql    = " SELECT * FROM `ryu_menu`
                    WHERE menu_parent_id = '$menu_id'
                    ORDER BY menu_order asc";
        $query  = $CI->db->query($sql);
        if($query->num_rows()>0){
            foreach($query->result() as $h){
                if($h->menu_id == $menu_parent_id){
                    $slct = "selected";
                }else{
                    $slct = "";
                }
                $list .= "<option $slct value='$h->menu_id'>$menu_title > $h->menu_title</option>";
                $list .= childmenu($h->menu_id,$h->menu_title,$menu_parent_id);
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
					<h3 class="box-title">Edit Subcategory</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div id="notif"></div>
				<form role="form" id="updatesubcategories">
					<div class="box-body">
						<div class="form-group">
							<label for="category_name">Subcategory Name</label>
							<input required value="<?=$sub_name?>" type="text" class="form-control" id="category_name" name="category_name" placeholder="Subcategory Name">
                            <input name="category_id" type="hidden" class="form-control" id="exampleInputEmail1" value="<?=$sub_id?>">
                        </div>
						<div class="form-group">
							<label>Subcategory Parent</label>
							<select required class="form-control" name="category_parent">
								<option>-- Select Subcategory Parent --</option>
								<?=optcategory($sub_parent_id,$sub_id)?>
							</select>
						</div>
						<div class="form-group">
							<label for="category_name">Subcategory Order</label>
							<input required value="<?=$sub_order?>" type="number" class="form-control" id="category_order" name="category_order" placeholder="Subcategory Order">
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Update</button>
						<a href="<?=base_url()?>catalog/subcategories" class="btn btn-default">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>