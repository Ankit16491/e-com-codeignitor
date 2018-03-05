function brand(id){
	$('#brand').val(id);
	cat_brand_filter();
}

function cat(id){
	$('#cat').val(id);
	cat_brand_filter();
}


function cat_brand_filter(){
	var brand_id = $('#brand').val();
	var cat_id = $('#cat').val();
	$.ajax({
		url:'User_controller/brand_cat_filter',
		method:"POST",
		data:{'b_id':brand_id,'c_id':cat_id},
		success:function(data);{
			//console.log(data);
			$(".features_items").html(data);
		}
	});
}

