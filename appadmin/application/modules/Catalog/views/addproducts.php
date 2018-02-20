<?php
    $arrlayout = array(
        "layout_1" => "Layout 1",
        "layout_2" => "Layout 2"
    );
    $optlayout = "";
    foreach($arrlayout as $k => $layoutname){
        $optlayout .= "<option value='$k'>$layoutname</option>";
    }
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
                            <input required name="product" type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Category</label>
                            <select required class="form-control" name="category" id="category">
								<option>-- Select Category --</option>
								<?=$optparentmenu?>
							</select>
                        </div>
                        <div>
                            <div class='form-group'>
                                <label>Layout</label>
                                <select required name='product_layout' class='form-control'>
                                    <?=$optlayout?>
                                </select>
                            </div>
                        </div>
                        <div id="subcategory">
                        </div>
                        <div class="form-group">
                            <label>Product Information (English)</label>
                            <textarea name="information_english" class="form-control" rows="3" placeholder="This product is......"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Product Information (Indonesia)</label>
                            <textarea name="information_indonesia" class="form-control" rows="3" placeholder="Product ini adalah......"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="FileUpload1">Product Image</label>
                            <input id="FileUpload1" type="file" name="ImageUpload1" class="image" />
                            <p class="help-block">Image Size Max 2 MB</p>
                            <div id="PreviewPicture1"></div>
                        </div>
                        <div class="form-group">
                            <label for="FileUpload2">Product Image</label>
                            <input id="FileUpload2" type="file" name="ImageUpload2" class="image" />
                            <p class="help-block">Image Size Max 2 MB</p>
                            <div id="PreviewPicture2"></div>
                        </div>
                        <div class="form-group">
                            <label for="FileUpload3">Product Image</label>
                            <input id="FileUpload3" type="file" name="ImageUpload3" class="image" />
                            <p class="help-block">Image Size Max 2 MB</p>
                            <div id="PreviewPicture3"></div>
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