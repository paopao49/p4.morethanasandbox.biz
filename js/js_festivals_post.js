// Need to implement form validator to check for all 4 required fields

// Setting up options for AJAX form
var options = { 
    type: 'post',
    url: '/festivals/p_post',
    success: function(response) {
		$('#message_holder')
			.css('display','inline')
			.delay(1000)
			.queue(function(){
				window.location.replace('/festivals/index');
			}
		);    	         
    } 
};
  
// Load options into AJAX form
$('form').ajaxForm(options);

// Use jQuery UI to build date pickers
$(document).ready(function(){
	$("#start_date").datepicker();
	$("#end_date").datepicker();
});
