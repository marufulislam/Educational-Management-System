$("#file").change(function() {
    
	var random_number = $("#random_number").val();

	var bar = $('.bar');
	var percent = $('.percent');
	var status = $('#status');
	   
	$('#form_sample_1').ajaxSubmit({
		url: 'submit/fileupload.php',
		beforeSend: function() {
			jQuery("#idsubmitData").hide();
			status.empty();
			var percentVal = '0%';
			bar.width(percentVal)
			percent.html(percentVal);
		},
		uploadProgress: function(event, position, total, percentComplete) {
			var percentVal = percentComplete + '%';
			bar.width(percentVal)
			percent.html(percentVal);
		},
		success: function() {
			var percentVal = '100%';
			bar.width(percentVal)
			percent.html(percentVal);
			
		},
		complete: function(xhr) {
			status.html(xhr.responseText);
			jQuery("#idsubmitData").show();
		}
	}); 

});       