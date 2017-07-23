var FormValidation = function () {

    var handleValidation1 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_sample_1');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
				
				rules: {
					email: {
						required: true,
						remote:{
							url: "submit/check_username.php",
							type: "post",
							data:{
								email: function(){
									return $('.form-horizontal :input[name="email"]').val();
								}
							}
						}
					},
					tDescription: {
						required: function(textarea) {
						CKEDITOR.instances[textarea.id].updateElement(); // update textarea
							var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
							return editorcontent.length === 0;
						}
					}
				},
				
				messages: { // custom messages for username availablity
					email: {
						required: 'Username is required',
						remote: "Username already exists"
					},
				},
				
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					
                    success1.show();
                    error1.hide();
					
					form.submit();
					
                }
            });


    }

    return {
        //main function to initiate the module
        init: function () {
			
            handleValidation1();

        }

    };

}();


var handleDatePickers = function () {

	if (jQuery().datepicker) {
		$('.date-picker').datepicker({
			rtl : App.isRTL(),
			autoclose: true,
			format:"d/m/yyyy"
		});
	}
}


jQuery('#idsubmitData').on('click',function(){
   	FormValidation.init();
});
