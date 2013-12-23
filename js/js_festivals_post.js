// check for valid dates
// check for all mandatory fields filled in

// Setting up options for AJAX form
var options = { 
    type: 'post',
    url: '/festivals/p_post',
    success: function(response) {
    	$('#message_holder').html(response);
		$('#message_holder')
			.css('display','inline')
			.delay(1000)
			.queue(function(next){
		    	if((response == 'Successful post! Redirecting to home page...') || (response == 'Changes successful! Redirecting to home page...')) {
						window.location.replace('/festivals/index');
				};
				next();
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
