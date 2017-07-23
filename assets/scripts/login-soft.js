var Login = function () {

	var handleLogin = function() {
		$('.login-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                email: {
	                    required: true
	                },
	                password: {
	                    required: true
	                },
	                remember: {
	                    required: false
	                }
	            },

	            messages: {
	                email: {
	                    required: "Username is required."
	                },
	                password: {
	                    required: "Password is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger', $('.login-form')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                //form.submit();
					signInForm_submit();
	            }
	        });

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    //$('.login-form').submit();
						signInForm_submit();
	                }
	                return false;
	            }
	        });
	}


    return {
        //main function to initiate the module
        init: function () {
        	
            handleLogin();
    
	       
	       	$.backstretch([
		        "assets/img/bg/1.jpg",
		        "assets/img/bg/4.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		    });
        }

    };

}();



var signInForm_submit = function(){
    //alert($(".login-form").valid());
    if($(".login-form").valid())
    {
    
        //jQuery("#register").hide();
        
        var dataString = jQuery('.login-form').serialize();
        jQuery.ajax({
            type:'POST', 
            url: 'submit/signInForm_submit.php',
            
            data: dataString,
            
            cache: false, 
            success: function(response) {
                //alert(response);
                jQuery('.signInForm_result').html(response);
            },
            error: function(jqXHR, exception) {
            //alert(dataString);
                  if (jqXHR.status === 0) {
                      alert('Not connect.\n Verify Network.');
                      jQuery('#savelobby').show();jQuery('#ajax-indicator').slideUp();
                  } else if (jqXHR.status == 404) {
                      alert('Requested page not found. [404]');
                      jQuery('#savelobby').show();jQuery('#ajax-indicator').slideUp();
                  } else if (jqXHR.status == 500) {
                      alert('Internal Server Error [500].');
                      jQuery('#savelobby').show();jQuery('#ajax-indicator').slideUp();
                  } else if (exception === 'parsererror') {
                      alert('Requested JSON parse failed.');
                      jQuery('#savelobby').show();jQuery('#ajax-indicator').slideUp();
                  } else if (exception === 'timeout') {
                      alert('Time out error.');
                      jQuery('#savelobby').show();jQuery('#ajax-indicator').slideUp();
                  } else if (exception === 'abort') {
                      alert('Ajax request aborted.');
                      jQuery('#savelobby').show();jQuery('#ajax-indicator').slideUp();
                  } else {
                      alert('Uncaught Error.\n' + jqXHR.responseText);
                      jQuery('#savelobby').show();jQuery('#ajax-indicator').slideUp();
                  }
              }
        });
    }
    return false;
}