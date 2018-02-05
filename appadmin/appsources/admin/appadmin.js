document.addEventListener('contextmenu', event => event.preventDefault());
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
			alert(data);
			return;
			if(data =="sukses"){
				window.location.href=toUrl+"/appadmin/dashboard/front";
				return;
			}else{
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
                +'Wrong Username / Password</div>');
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			$("#loginbutton").html('<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>');
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
		// dataType: "json",
		success: function(data){
			alert(data);
			return;
			if(data =="sukses"){
				window.location.href=toUrl+"/appadmin/dashboard/front";
				return;
			}else{
				$("#notif").html('<div class="alert alert-danger alert-dismissible">'
                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
                +'Wrong Username / Password</div>');
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			$("#loginbutton").html('<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>');
		}
	});
});

var i = 1;
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
	labelModel.appendChild(document.createTextNode('Product Model'));
	
    var inputModel   =   document.createElement("input");
    inputModel.setAttribute('class','form-control');
    inputModel.setAttribute('name','model['+i+']');
    inputModel.setAttribute('required','required');
	colModel.appendChild(labelModel);
	colModel.appendChild(inputModel);
	
    //membuat form-group Desc
    var colDesc = document.createElement('div');
	colDesc.setAttribute('class','form-group col-lg-6');
	
    var labelDesc   = document.createElement("label");
	labelDesc.appendChild(document.createTextNode('Product Description'));
	
    var inputDesc   =   document.createElement("input");
    inputDesc.setAttribute('class','form-control');
    inputDesc.setAttribute('name','description['+i+']');
    inputDesc.setAttribute('required','required');
    colDesc.appendChild(labelDesc);
    colDesc.appendChild(inputDesc);


    productrow.appendChild(row);
    row.appendChild(colModel);
	row.appendChild(colDesc);
	row.appendChild(deleteRow);
    
    deleteRow.onclick = function () {
        row.parentNode.removeChild(row);
    };

    i++;
})