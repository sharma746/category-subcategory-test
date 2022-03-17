<!DOCTYPE html>
<html>
<head>
	<title>Dynamic Dropdown Category Subcategory List in PHP MySQL using ajax</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/bootstrap-4.3.1-dist/css/bootstrap.min.css' ?>" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">
<h2 class="text-primary">Dynamic Dropdown Category Subcategory List in PHP MySQL using ajax</h2>
</div>
<div class="card-body">
<form>
<div id="select-container"></div>
</form>
</div>
</div>
</div>
</div>
</div>
<script>
function RegisterSelectChangeEvent(id){
    //console.log("Event Raised");
    $("#ddl" + id).on("change", function (e) {
	  var subCategory = $(this).children("option:selected").val();
      jQuery("#select-container").append(CreateSelect(subCategory,id));
    });
  }

function CreateSelect(id,num=0){
	
	for (var x=num+1; x<5; x++){
		$("#ddl" + x).remove();
		console.log("#ddl" + x);
	} 
	var selectoption="";
	$.ajax({
			url:"http://localhost/testing/index.php/User_category/find_category",
			type: 'post',
			data: {id: id },
			dataType: 'json',
			async: false,
			success: function(response) {
				console.log(response);
			  if (Object.keys(response)[0]!=""){
              for (var i = 0; i < response.length; i++) {
                selectoption+='<option value="' + response[i]['id'] + '">' + response[i]['category'] + '</option>';
                }
			  }else{
				 selectoption="";			 
			  }
				
			}
			
			
		});
		if(selectoption!=""){
		return '<select id="ddl' + id + '">' + selectoption + '<\/select><script>RegisterSelectChangeEvent(' + id + ');<\/script>';
		}
   }
   jQuery("#select-container").append(CreateSelect(0));
</script>
</body>
</html>