$(function(){

	$( "#del_employees" ).click(function() {
	    ( $( ".emp:checked" ).each(function(  ) {
	        var current = $( this ).val();
	        $.ajax({
	        type: "GET",
	        url: 'employees/'+ current +'/deleteEmployee',
	        success: function(data){
	            $('body').html(data);
	        }
	        }); 
	    })
	    );
	});

	var loaded_update = false;
	var frm = $('#form');
	frm.submit(function (ev) {
	    ev.preventDefault();
	    ev.stopPropagation();
	    var $inputs = $('#form :input');
        var values = {};
        $inputs.each(function() {
            values[this.name] = $(this).val();
        });
        if(loaded_update) return;
	    $.ajax({
	        type: frm.attr('method'),
	        url: "/employees/" + values.id + "/updateEmployee",
	        data: values,
	        method:"POST",
	        async: false,
	        success: function (data) {
        		$('.error_span').remove();
	        	$('#form').prepend(data);
	        }
	    });
	    loaded_update = true;
	});

	var frm_cr = $('#createForm');
	
	var loaded = false;
	frm_cr.submit(function (ev) {
	    ev.preventDefault();
	    ev.stopPropagation();
	    var $inputs = $('#createForm :input');
        var values = {};

        $inputs.each(function() {
            values[this.name] = $(this).val();

        });
        if(loaded) return;
		    $.ajax({
		        type: frm_cr.attr('method'),
		        url: "/employees/insertEmployee",
		        data: values,
		        method:"POST",
		        success: function (data) {
		        	$('.error_span').remove();
			        $('#createForm').prepend(data);
		        }
		    });
		loaded = true;
	});


})
