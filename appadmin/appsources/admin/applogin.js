document.addEventListener('contextmenu', event => event.preventDefault());

$('#loginadmin').submit(function(event) {
    event.preventDefault();

    // alert("test");
    // return;
    var form = $('#loginadmin');	
    $("#loginbutton").html('<span class="btn waves-effect waves-light col s12">Loading....</span>');

	$.ajax({
		type : 'POST',
		url  : toUrl+"/appadmin/auth/validation",
		data : form.serialize(),
		// dataType: "json",
		success: function(data){
			// alert(data);
			// return;
			if(data =="sukses"){
				window.location.href=toUrl+"/appadmin/dashboard/front";
				return;
			}else{
				swal("Ooopps!", "Password Or Email is Wrong", "warning");
				$("#loginbutton").html('<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>');
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			$("#loginbutton").html('<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>');
		}
	});
});