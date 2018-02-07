<?php
    $product_name   = "";
    $product_note   = "";
    $product_image1     = "";
    $product_image2     = "";
    $product_image3     = "";
    $product_category   = "";
    $product_subcategory = "";
    $optsubcategory = "";
    if($product){
        foreach($product as $row){
            $product_name = $row->product_name;
            $product_note = $row->product_note;
            $product_category = $row->product_category;
            $product_subcategory = $row->product_subcategory;
            $product_image1 = "<img width='180px' src='".base_url()."$row->product_image1'/>";
            $product_image2 = "<img width='180px' src='".base_url()."$row->product_image2'/>";
            $product_image3 = "<img width='180px' src='".base_url()."$row->product_image3'/>";
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
    <form id="addproductform"  method="post" enctype="multipart/form-data">
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
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Category</label>
                            <select required class="form-control" name="category" id="category">
								<option>-- Select Category --</option>
								<?=$optparentmenu?>
							</select>
                        </div>
                        <div id="subcategory">
                            <?=$optsubcategory?>
                        </div>
                        <div class="form-group">
                            <label>Product Information</label>
                            <textarea name="information" class="form-control" rows="3" placeholder="This product is......"><?=$product_note?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="FileUpload1">Product Image</label>
                            <input id="FileUpload1" type="file" name="ImageUpload1" class="image" />
                            <p class="help-block">Image Size Max 2 MB</p>
                            <div id="PreviewPicture1"><?=$product_image1?></div>
                        </div>
                        <div class="form-group">
                            <label for="FileUpload2">Product Image</label>
                            <input id="FileUpload2" type="file" name="ImageUpload2" class="image" />
                            <p class="help-block">Image Size Max 2 MB</p>
                            <div id="PreviewPicture2"><?=$product_image2?></div>
                        </div>
                        <div class="form-group">
                            <label for="FileUpload3">Product Image</label>
                            <input id="FileUpload3" type="file" name="ImageUpload3" class="image" />
                            <p class="help-block">Image Size Max 2 MB</p>
                            <div id="PreviewPicture3"><?=$product_image3?></div>
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