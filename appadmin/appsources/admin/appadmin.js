document.addEventListener('contextmenu', event => event.preventDefault());

function deleteslider(image_id){
	if (confirm('Are you sure you?')) {
		$.ajax({
			type : 'POST',
			url  : toUrl+"/appadmin/dashboard/deleteslider",
			data : {image_id:image_id},
			// dataType: "json",
			success: function(data){
				alert(data);
				window.location.reload();
			},error: function(xhr, ajaxOptions, thrownError){            
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		});
		// Save it!
	} else {
		// Do nothing!
	}
}

function deletedownload(){
	var sList = "";
	$('input[name=download_id]:checked').each(function () {
		sList += $(this).val() + "|";
	});

	if(sList == ""){
		alert("Please select a Url");
		return;
	}
	if (confirm('Are you sure you?')) {
		$.ajax({
			type : 'POST',
			url  : toUrl+"/appadmin/page/deletedownload",
			data : {download_id:sList},
			// dataType: "json",
			success: function(data){
				alert(data);
				window.location.reload();
			},error: function(xhr, ajaxOptions, thrownError){            
				alert(data);
				window.location.reload();
				return;
			}
		});
		// Save it!
	} else {
		// Do nothing!
	}
}

function deletemessage(){
	var sList = "";
	$('input[name=support_id]:checked').each(function () {
		sList += $(this).val() + "|";
	});

	if(sList == ""){
		alert("Please select a Message");
		return;
	}
	if (confirm('Are you sure you?')) {
		$.ajax({
			type : 'POST',
			url  : toUrl+"/appadmin/page/deletemessage",
			data : {support_id:sList},
			// dataType: "json",
			success: function(data){
				alert(data);
				window.location.reload();
			},error: function(xhr, ajaxOptions, thrownError){            
				alert(data);
				window.location.reload();
				return;
			}
		});
		// Save it!
	} else {
		// Do nothing!
	}
}

function deleteservice(){
	var sList = "";
	$('input[name=service_id]:checked').each(function () {
		sList += $(this).val() + "|";
	});

	if(sList == ""){
		alert("Please select a Store");
		return;
	}
	if (confirm('Are you sure you?')) {
		$.ajax({
			type : 'POST',
			url  : toUrl+"/appadmin/page/deleteservice",
			data : {service_id:sList},
			// dataType: "json",
			success: function(data){
				alert(data);
				window.location.reload();
			},error: function(xhr, ajaxOptions, thrownError){            
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		});
		// Save it!
	} else {
		// Do nothing!
	}
}

function deleteevent(){
	var sList = "";
	$('input[name=event_id]:checked').each(function () {
		sList += $(this).val() + "|";
	});

	if(sList == ""){
		alert("Please select an Event");
		return;
	}
	if (confirm('Are you sure you?')) {
		$.ajax({
			type : 'POST',
			url  : toUrl+"/appadmin/page/deleteevent",
			data : {event_id:sList},
			// dataType: "json",
			success: function(data){
				alert(data);
				window.location.reload();
			},error: function(xhr, ajaxOptions, thrownError){            
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		});
		// Save it!
	} else {
		// Do nothing!
	}
}

function deletesubcategory(){
	var sList = "";
	$('input[name=sub_id]:checked').each(function () {
		sList += $(this).val() + "|";
	});

	if(sList == ""){
		alert("Please select a Subcategory");
		return;
	}
	if (confirm('Are you sure you?')) {
		$.ajax({
			type : 'POST',
			url  : toUrl+"/appadmin/catalog/deletesubcategory",
			data : {sub_id:sList},
			// dataType: "json",
			success: function(data){
				alert(data);
				window.location.reload();
			},error: function(xhr, ajaxOptions, thrownError){            
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		});
		// Save it!
	} else {
		// Do nothing!
	}
}

function deletecategory(){
	var sList = "";
	$('input[name=category_id]:checked').each(function () {
		sList += $(this).val() + "|";
	});

	if(sList == ""){
		alert("Please select a Category");
		return;
	}
	if (confirm('Are you sure you?')) {
		$.ajax({
			type : 'POST',
			url  : toUrl+"/appadmin/catalog/deletecategory",
			data : {category_id:sList},
			// dataType: "json",
			success: function(data){
				alert(data);
				window.location.reload();
			},error: function(xhr, ajaxOptions, thrownError){            
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		});
		// Save it!
	} else {
		// Do nothing!
	}
}

function deleteProduct(){
	var sList = "";
	$('input[name=product_id]:checked').each(function () {
		sList += $(this).val() + "|";
	});

	if(sList == ""){
		alert("Please select a product");
		return;
	}

	if (confirm('Are you sure you?')) {
		$.ajax({
			type : 'POST',
			url  : toUrl+"/appadmin/catalog/deleteproduct",
			data : {product_id:sList},
			// dataType: "json",
			success: function(data){
				alert(data);
				window.location.reload();
			},error: function(xhr, ajaxOptions, thrownError){            
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		});
		// Save it!
	} else {
		// Do nothing!
	}
}

$('#selectall').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    }else{
		$(':checkbox').each(function() {
            this.checked = false;                        
        });
	}
});

$("#category").change(function(){
	var category = $("#category").val();
	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/catalog/getOptSubCategory",
		data : {category:category},
		// dataType: "json",
		success: function(data){
			$("#subcategory").html(data);
		},error: function(xhr, ajaxOptions, thrownError){            
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
});

$("#account").submit(function(event) {
	event.preventDefault();

    // alert("test");
    // return;
    var form = $('#account');

	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/auth/updateaccount",
		data : form.serialize(),
		// dataType: "json",
		success: function(data){
			if(data == "not_match"){
				alert("Password Tidak Sama");
				return;
			}else{
				alert("Sukses");
				window.location.reload();
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			// $("#notif").html('<div class="alert alert-danger alert-dismissible">'
			// +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			// +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			// +"Can't Connect, Please Try Again</div>");
			// return;
		}
	});
})

function setLanguage(lang){
	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/catalog/setLanguage",
		data : {lang:lang},
		success: function(data){
			window.location.reload();
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
		}
	});
}

$("#profile").submit(function(event) {
	event.preventDefault();

    // alert("test");
    // return;
    var form = $('#profile');

	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/auth/updateprofile",
		data : form.serialize(),
		// dataType: "json",
		success: function(data){
			if(data == "error"){
				alert("Gagal");
				return;
			}else{
				alert("Sukses");
				window.location.reload();
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			// $("#notif").html('<div class="alert alert-danger alert-dismissible">'
			// +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			// +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			// +"Can't Connect, Please Try Again</div>");
			// return;
		}
	});
})

$("#replymessage").submit(function(event) {
	event.preventDefault();

    // alert("test");
    // return;
	var form = $('#replymessage');
	$("#buttonreply").html("Sending ......");

	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/page/sendemail",
		data : form.serialize(),
		// dataType: "json",
		success: function(data){
			alert(data);
			window.location.href=toUrl+"/appadmin/page/messages";
		},error: function(xhr, ajaxOptions, thrownError){
			alert("Can't Connect To Mail Server, Please Try Again");
			$("#buttonreply").html('<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>');    
			// alert(xhr.responseText);
			// $("#notif").html('<div class="alert alert-danger alert-dismissible">'
			// +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			// +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			// +"Can't Connect, Please Try Again</div>");
			// return;
		}
	});
})

$('#editcategories').submit(function(event) {
	event.preventDefault();

    // alert("test");
    // return;
    var form = $('#editcategories');

	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/catalog/updateCategories",
		data : form.serialize(),
		// dataType: "json",
		success: function(data){
			if(data =="sukses"){
				alert(data);
				window.location.href=toUrl+"/appadmin/catalog/categories";
				return;
			}else{
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			// alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
})

$('#categories').submit(function(event) {
    event.preventDefault();

    // alert("test");
    // return;
    var form = $('#categories');

	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/catalog/addCategories",
		data : form.serialize(),
		// dataType: "json",
		success: function(data){
			if(data =="sukses"){
				alert(data);
				window.location.href=toUrl+"/appadmin/catalog/categories";
				return;
			}else{
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
});

$("#updatesubcategories").submit(function(event){
	event.preventDefault();

    // alert("test");
    // return;
    var form = $('#updatesubcategories');

	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/catalog/updateSubcategories",
		data : form.serialize(),
		// dataType: "json",
		success: function(data){
			if(data =="sukses"){
				alert(data);
				window.location.href=toUrl+"/appadmin/catalog/subcategories";
				return;
			}else{
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
})

$("#addEvent").submit(function(event){
	event.preventDefault();

    // alert("test");
    // return;
	var formData = new FormData(this);
	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/page/addEvent",
		data: formData,
		cache: false,
        contentType: false,
        processData: false,
		// dataType: "json",
		success: function(data){
			if(data =="sukses"){
				alert(data);
				window.location.href=toUrl+"/appadmin/page/news";
				return;
			}else{
				alert(data);
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			// alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
})

$('#subcategories').submit(function(event) {
    event.preventDefault();

    // alert("test");
    // return;
    var form = $('#subcategories');

	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/catalog/addSubcategories",
		data : form.serialize(),
		// dataType: "json",
		success: function(data){
			if(data =="sukses"){
				alert(data);
				window.location.href=toUrl+"/appadmin/catalog/subcategories";
				return;
			}else{
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			// alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
});

$("#FileUpload1").on("change", function(){
	var files = !!this.files ? this.files : [];
	if (!files.length || !window.FileReader) return; // Check if File is selected, or no FileReader support
		if (/^image/.test( files[0].type)){ //  Allow only image upload
			var ReaderObj = new FileReader(); // Create instance of the FileReader
			ReaderObj.readAsDataURL(files[0]); // read the file uploaded
			ReaderObj.onloadend = function(){ // set uploaded image data as background of div
			$("#PreviewPicture1").css("background-image", "url("+this.result+")");
		}
	}else{
		alert("Upload an image");
	}
});

$("#FileUpload2").on("change", function(){
	var files = !!this.files ? this.files : [];
	if (!files.length || !window.FileReader) return; // Check if File is selected, or no FileReader support
		if (/^image/.test( files[0].type)){ //  Allow only image upload
			var ReaderObj = new FileReader(); // Create instance of the FileReader
			ReaderObj.readAsDataURL(files[0]); // read the file uploaded
			ReaderObj.onloadend = function(){ // set uploaded image data as background of div
			$("#PreviewPicture2").css("background-image", "url("+this.result+")");
		}
	}else{
		alert("Upload an image");
	}
});

$("#FileUpload3").on("change", function(){
	var files = !!this.files ? this.files : [];
	if (!files.length || !window.FileReader) return; // Check if File is selected, or no FileReader support
		if (/^image/.test( files[0].type)){ //  Allow only image upload
			var ReaderObj = new FileReader(); // Create instance of the FileReader
			ReaderObj.readAsDataURL(files[0]); // read the file uploaded
			ReaderObj.onloadend = function(){ // set uploaded image data as background of div
			$("#PreviewPicture3").css("background-image", "url("+this.result+")");
		}
	}else{
		alert("Upload an image");
	}
});

$('#addslider').submit(function(event) {
	event.preventDefault();

    // alert("test");
    // return;
    var formData = new FormData(this);

	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/dashboard/addslider",
		data: formData,
		cache: false,
        contentType: false,
        processData: false,
		dataType: "json",
		success: function(data){
			if(data.status =="sukses"){
				alert(data.message);
				window.location.href=toUrl+"/appadmin/dashboard/front";
			}else if(data.status =="max_upload"){
				$("#notif").html('<div class="alert alert-warning alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}else {
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
		}
	});
})

$('#addproductform').submit(function(event) {
    event.preventDefault();

    // alert("test");
    // return;
    var formData = new FormData(this);

	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/catalog/saveproduct",
		data: formData,
		cache: false,
        contentType: false,
        processData: false,
		dataType: "json",
		success: function(data){
			if(data.status =="sukses"){
				alert(data.message);
				window.location.href=toUrl+"/appadmin/catalog/products";
			}else if(data.status =="max_upload"){
				$("#notif").html('<div class="alert alert-warning alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}else {
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
		}
	});
});

$('#editproductform').submit(function(event) {
    event.preventDefault();

    // alert("test");
    // return;
    var formData = new FormData(this);

	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/catalog/updateproduct",
		data: formData,
		cache: false,
        contentType: false,
        processData: false,
		dataType: "json",
		success: function(data){
			if(data.status =="sukses"){
				alert(data.message);
				window.location.href=toUrl+"/appadmin/catalog/products";
			}else if(data.status =="max_upload"){
				$("#notif").html('<div class="alert alert-warning alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}else {
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
		}
	});
});

var i = 0;
$("#addspec").click(function(){
	//menentukan target append
    var productrow = document.getElementById('productrow');
    
    //membuat element
    var hr = document.createElement('hr');
    var row = document.createElement('div');
    row.setAttribute('class','row');
   
    //membuat button delete
    var deleteRow   = document.createElement('div');
    deleteRow.setAttribute('class','col-md-2 col-xs-2');
    deleteRow.innerHTML = '<i class="fa fa-trash fa-2x"></i>';

    //membuat form-group Komponen
    var colModel = document.createElement('div');
	colModel.setAttribute('class','form-group col-lg-6');
	
    var labelModel   = document.createElement("label");
	labelModel.appendChild(document.createTextNode('Product Model (English)'));
	
    var inputModel   =   document.createElement("input");
    inputModel.setAttribute('class','form-control');
    inputModel.setAttribute('name','model[]');
    inputModel.setAttribute('required','required');
	colModel.appendChild(labelModel);
	colModel.appendChild(inputModel);
	
    //membuat form-group Desc
    var colDesc = document.createElement('div');
	colDesc.setAttribute('class','form-group col-lg-6');
	
    var labelDesc   = document.createElement("label");
	labelDesc.appendChild(document.createTextNode('Product Description (English)'));
	
    var inputDesc   =   document.createElement("input");
    inputDesc.setAttribute('class','form-control');
    inputDesc.setAttribute('name','description[]');
    inputDesc.setAttribute('required','required');
    colDesc.appendChild(labelDesc);
	colDesc.appendChild(inputDesc);
	
	//membuat form-group Komponen
    var colModel_id = document.createElement('div');
	colModel_id.setAttribute('class','form-group col-lg-6');
	
    var labelModel_id   = document.createElement("label");
	labelModel_id.appendChild(document.createTextNode('Product Model (Indonesia)'));
	
    var inputModel_id   =   document.createElement("input");
    inputModel_id.setAttribute('class','form-control');
    inputModel_id.setAttribute('name','model_id[]');
    inputModel_id.setAttribute('required','required');
	colModel.appendChild(labelModel_id);
	colModel.appendChild(inputModel_id);
	
    //membuat form-group Desc
    var colDesc_id = document.createElement('div');
	colDesc_id.setAttribute('class','form-group col-lg-6');
	
    var labelDesc_id   = document.createElement("label");
	labelDesc_id.appendChild(document.createTextNode('Product Description (Indonesia)'));
	
    var inputDesc_id   =   document.createElement("input");
    inputDesc_id.setAttribute('class','form-control');
    inputDesc_id.setAttribute('name','description_id[]');
    inputDesc_id.setAttribute('required','required');
    colDesc.appendChild(labelDesc_id);
    colDesc.appendChild(inputDesc_id);


    productrow.appendChild(row);
    row.appendChild(colModel);
	row.appendChild(colDesc);
	row.appendChild(colModel_id);
	row.appendChild(colDesc_id);
	row.appendChild(deleteRow);
    
    deleteRow.onclick = function () {
        row.parentNode.removeChild(row);
    };

    i++;
})

function deleterow(id){
	$("#row_"+id).remove();
}

$("#addDownload").submit(function(event){
	event.preventDefault();

    // alert("test");
    // return;
	var form = $('#addDownload');
	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/page/addDownload",
		data : form.serialize(),
		// dataType: "json",
		success: function(data){
			if(data =="sukses"){
				alert(data);
				window.location.href=toUrl+"/appadmin/page/download";
				return;
			}else{
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			// alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
})

$("#addService").submit(function(event){
	event.preventDefault();

    // alert("test");
    // return;
	var form = $('#addService');
	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/page/addService",
		data : form.serialize(),
		// dataType: "json",
		success: function(data){
			if(data =="sukses"){
				alert(data);
				window.location.href=toUrl+"/appadmin/page/service";
				return;
			}else{
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			// alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
})

$("#update_support").submit(function(event){
	event.preventDefault();
	var form = $('#update_support');
	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/page/update_support",
		data : form.serialize(),
		dataType: "json",
		success: function(data){
			// alert(data);
			// return;
			if(data.status =="sukses"){
				alert("Updated");
				window.location.href=toUrl+"/appadmin/page/support/"+data.support_id;
				return;
			}else{
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			// alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
})



$("#update_support_id").submit(function(event){
	event.preventDefault();
	var form = $('#update_support_id');
	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/page/update_support_id",
		data : form.serialize(),
		dataType: "json",
		success: function(data){
			// alert(data);
			// return;
			if(data.status =="sukses"){
				alert("Updated");
				window.location.href=toUrl+"/appadmin/page/support/"+data.support_id;
				return;
			}else{
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			// alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
})

$("#addsocial").submit(function(event){
	event.preventDefault();

    // alert("test");
    // return;
	var form = $('#addsocial');
	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/page/addsocial",
		data : form.serialize(),
		// dataType: "json",
		success: function(data){
			if(data =="sukses"){
				alert("Updated");
				window.location.href=toUrl+"/appadmin/page/socialmedia";
				return;
			}else{
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
				+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
				+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
				+"Can't Connect, Please Try Again</div>");
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			// alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
})

$("#desc_page_segmentation").submit(function(event){
	event.preventDefault();

    // alert("test");
    // return;
	var form = $('#desc_page_segmentation');
	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/page/setDescSeg",
		data : form.serialize(),
		dataType: "json",
		success: function(data){
			if(data.status =="sukses"){
				alert(data.message);
				window.location.href=toUrl+"/appadmin/page/segmentation/"+data.setting;
			}else if(data.status =="max_upload"){
				$("#notif").html('<div class="alert alert-warning alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}else {
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			// alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
})

$("#desc_page").submit(function(event) {
	event.preventDefault();

    // alert("test");
    // return;
	var form = $('#desc_page');
	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/page/setDesc",
		data : form.serialize(),
		dataType: "json",
		success: function(data){
			if(data.status =="sukses"){
				alert(data.message);
				window.location.href=toUrl+"/appadmin/page/setting/"+data.setting;
			}else if(data.status =="max_upload"){
				$("#notif").html('<div class="alert alert-warning alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}else {
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			// alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
})

$('#video_page').submit(function(event) {
	event.preventDefault();

    // alert("test");
    // return;
	var form = $('#video_page');
	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/page/setVideo",
		data : form.serialize(),
		dataType: "json",
		success: function(data){
			if(data.status =="sukses"){
				alert(data.message);
				window.location.href=toUrl+"/appadmin/page/setting/"+data.setting;
			}else if(data.status =="max_upload"){
				$("#notif").html('<div class="alert alert-warning alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}else {
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			// alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
			return;
		}
	});
})

$('#image_upload_form').submit(function(event) {
    event.preventDefault();

    // alert("test");
    // return;
    var formData = new FormData(this);

	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/page/setCover",
		data: formData,
		cache: false,
        contentType: false,
        processData: false,
		dataType: "json",
		success: function(data){
			if(data.status =="sukses"){
				alert(data.message);
				window.location.href=toUrl+"/appadmin/page/setting/"+data.setting;
			}else if(data.status =="max_upload"){
				$("#notif").html('<div class="alert alert-warning alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}else {
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
		}
	});
});



$('#image_upload_form_segment').submit(function(event) {
    event.preventDefault();

    // alert("test");
    // return;
    var formData = new FormData(this);

	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/page/setCoverSegment",
		data: formData,
		cache: false,
        contentType: false,
        processData: false,
		dataType: "json",
		success: function(data){
			if(data.status =="sukses"){
				alert(data.message);
				window.location.href=toUrl+"/appadmin/page/segmentation/"+data.setting;
			}else if(data.status =="max_upload"){
				$("#notif").html('<div class="alert alert-warning alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}else {
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message);
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			$("#notif").html('<div class="alert alert-danger alert-dismissible">'
			+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
			+'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
			+"Can't Connect, Please Try Again</div>");
		}
	});
});