
	function LoadDivContent( module_name_to_load, input_form, target_object, progress_element, query_string_data ){
		
		
		
		var i_form = "#" + input_form;
		//alert("i_form: " + i_form);
		var data=$( i_form ).serialize();
		//alert(data);

		var url = "js-ajax/" + module_name_to_load + ".ajax.php?";
		url += query_string_data;
				
		$.ajax({
			type: "POST",
			url: url,
			data: data,
			dataType: "html",
			error: function(returnval) {
				
			},
			success: function(data){
				
				$('#' + target_object + '').html(data);
				$('#' + target_object + '').css('display','block');
			}
		});
		
		
	}
