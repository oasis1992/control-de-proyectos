$(document).ready(function() { 

	var type = $('#type_member').val();

	hiddenElement(type, 'interno', '#information-interno', 'hidden');

	$("#type_member").change(function() {
	 	var type = $('#type_member').val();
	 	hiddenElement(type, 'interno', '#information-interno', 'hidden');
	});
	/*
	if( $('#fecha_limit_check').is(':checked') ) {
		jQuery('#day').show();
		jQuery('#month').show();
		jQuery('#year').show();
	}else{
		jQuery('#day').hide();
		jQuery('#month').hide();
		jQuery('#year').hide();
	}

	if( $('#fecha_inicio_check').is(':checked') ) {
		jQuery('#day2').show();
		jQuery('#month2').show();
		jQuery('#year2').show();
	}else{
		jQuery('#day2').hide();
		jQuery('#month2').hide();
		jQuery('#year2').hide();
	}

	jQuery('#fecha_limit_check').click(function(e,elm){
	    if(jQuery(this).is(':checked')){
	        jQuery('#day').show();
	        jQuery('#month').show();
	        jQuery('#year').show();
	        var year    = jQuery('#year').val();
	        var month   = jQuery('#month').val();
	        var day     = jQuery('#day').val();
	        jQuery('#date_limit_hidden').val(year+'/'+month+'/'+day);
	    }else{
	        jQuery('#day').hide();
	        jQuery('#month').hide();
	        jQuery('#year').hide();
	        jQuery('#date_limit_hidden').val('');
	    }
	});

	jQuery('#fecha_inicio_check').click(function(e,elm){
	    if(jQuery(this).is(':checked')){
	        jQuery('#day2').show();
	        jQuery('#month2').show();
	        jQuery('#year2').show();
	        var year    = jQuery('#year2').val();
	        var month   = jQuery('#month2').val();
	        var day     = jQuery('#day2').val();
	        jQuery('#date_start_hidden').val(year+'/'+month+'/'+day);

	    }else{
	        jQuery('#day2').hide();
	        jQuery('#month2').hide();
	        jQuery('#year2').hide();
	        jQuery('#date_start_hidden').val('');
	    }
	});
	*/

});

function update_startDate(e, elm){
	e.preventDefault();
    var year    = jQuery(elm).parent('div').find('#year').val();
    var month   = jQuery(elm).parent('div').find('#month').val();
    var day     = jQuery(elm).parent('div').find('#day').val();
    jQuery(elm).parent('div').find('input[type="hidden"]').val(year+'/'+month+'/'+day);
}

function update_endDate(e, elm){
	e.preventDefault();
    var year    = jQuery(elm).parent('div').find('#year2').val();
    var month   = jQuery(elm).parent('div').find('#month2').val();
    var day     = jQuery(elm).parent('div').find('#day2').val();
    jQuery(elm).parent('div').find('input[type="hidden"]').val(year+'/'+month+'/'+day);
}

function hiddenElement(val1, val2, id, class_){
	if(val1 == val2){
 		jQuery(id).removeClass(class_);
 	}else{
 		
 		jQuery(id).addClass(class_);
 	}
}