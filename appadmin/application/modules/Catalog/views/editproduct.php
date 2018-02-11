<?php
    $arrlayout = array(
        "layout_1" => "Layout 1",
        "layout_2" => "Layout 2"
    );
    $product_name   = "";
    $product_note   = "";
    $product_image1     = "";
    $product_image2     = "";
    $product_image3     = "";
    $url_product_image1     = "";
    $url_product_image2     = "";
    $url_product_image3     = "";
    $product_category   = "";
    $product_subcategory = "";
    $optsubcategory = "";
    $detailret = "";
    $product_id = "";
    if($product){
        foreach($product as $row){
            $product_id = $row->product_id;
            $product_name = $row->product_name;
            $product_note = $row->product_note;
            $product_category = $row->product_category;
            $product_subcategory = $row->product_subcategory;
            $product_image1 = $row->product_image1;
            $product_image2 = $row->product_image2;
            $product_image3 = $row->product_image3;
            $product_layout = $row->product_layout;
            $url_product_image1 = "<img width='180px' src='".base_url()."$row->product_image1'/>";
            $url_product_image2 = "<img width='180px' src='".base_url()."$row->product_image2'/>";
            $url_product_image3 = "<img width='180px' src='".base_url()."$row->product_image3'/>";
        }
    }
    $optlayout = "";
    foreach($arrlayout as $k => $layoutname){
        if($k == $product_layout){
            $slct = "selected";
        }else{
            $slct = "";
        }
        $optlayout .= "<option $slct value='$k'>$layoutname</option>";
    }
    if($detailproduct){
        foreach($detailproduct as $key){
            $detailret .= '
            <div class="row" id="row_'.$key->id.'">            
                <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Product Model</label>
                    <input required name="model[]" type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Model" value="'.$key->product_model.'">
                </div>           
                <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Product Description</label>
                    <input required name="description[]" type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Description" value="'.$key->product_description.'">
                </div>
                <div class="col-md-2 col-xs-2">
                    <i class="fa fa-trash fa-2x" onClick="deleterow(\''.$key->id.'\')"></i>
                </div>
            </div>
            ';
        }
    }
    $optparentmenu = $this->ModelAdmin->getOptParentMenu(0,$product_category);
    // if($product_subcategory != ""){
    $optsubcategory = $this->ModelAdmin->getOptSubCategory($product_category,$product_subcategory);
    // }
?>
<!-- Content Header (Page header) -->
<div id="notif"></div>
<section class="content-header">
	<h1><?=$tittle?></h1>
</section>

<!-- Main content -->
<section class="content">
    <form id="editproductform"  method="post" enctype="multipart/form-data">
	    <div class="row">
            <div class="col-md-12">
                <a href="<?=base_url()?>catalog/products" class="btn btn-default pull-right" style="margin: 0 5px 5px 0"><i class="fa fa-mail-reply-all"></i></a>
                <button class="btn btn-primary pull-right" style="margin: 0 5px 5px 0"><i class="fa fa-save"></i></button>
            </div>
        </div>
	    <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product Data</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input required name="product" type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Name" value="<?=$product_name?>">
                            <input name="product_id" type="hidden" class="form-control" id="exampleInputEmail1" value="<?=$product_id?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Category</label>
                            <select required class="form-control" name="category" id="category">
								<option>-- Select Category --</option>
								<?=$optparentmenu?>
							</select>
                        </div>
                        <div id="subcategory">
                            <div class='form-group'>
                                <label>Subcategory</label>
                                <select name='subcategory' class='form-control'>
                                    <option>-- Select Subcategory --</option>
                                    <?=$optsubcategory?>
                                </select>
                            </div>
                        </div>
                        <div id="subcategory">
                            <div class='form-group'>
                                <label>Layout</label>
                                <select required name='product_layout' class='form-control'>
                                    <option>-- Select Layout --</option>
                                    <?=$optlayout?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Product Information</label>
                            <textarea name="information" class="form-control" rows="3" placeholder="This product is......"><?=$product_note?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="FileUpload1">Product Image</label>
                            <input id="FileUpload1" type="file" name="ImageUpload1" class="image" />
                            <input name="deleteimage1" type="hidden" class="form-control" id="exampleInputEmail1" value="<?=$product_image1?>">
                            <p class="help-block">Image Size Max 2 MB</p>
                            <div id="PreviewPicture1"><?=$url_product_image1?></div>
                        </div>
                        <div class="form-group">
                            <label for="FileUpload2">Product Image</label>
                            <input id="FileUpload2" type="file" name="ImageUpload2" class="image" />
                            <input name="deleteimage2" type="hidden" class="form-control" id="exampleInputEmail1" value="<?=$product_image2?>">
                            <p class="help-block">Image Size Max 2 MB</p>
                            <div id="PreviewPicture2"><?=$url_product_image2?></div>
                        </div>
                        <div class="form-group">
                            <label for="FileUpload3">Product Image</label>
                            <input id="FileUpload3" type="file" name="ImageUpload3" class="image" />
                            <input name="deleteimage3" type="hidden" class="form-control" id="exampleInputEmail1" value="<?=$product_image3?>">
                            <p class="help-block">Image Size Max 2 MB</p>
                            <div id="PreviewPicture3"><?=$url_product_image3?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product Specification</h3>
                    </div>
                    <div class="box-body">
                        <?=$detailret?>
                        <div id="productrow">
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <span id="addspec" class="btn btn-primary" style="float:right;margin:20px"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
    </form>
</section>