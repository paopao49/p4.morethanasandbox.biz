// Setting up options for AJAX form
var options = { 
    type: 'post',
    url: '/reg/p_login',
    success: function(response) {
    	$('#message_holder').html(response);
    	$('#message_holder')
    		.css('display','inline')
    		.delay(1000)
			.queue(function(next){
		    	if(response == 'Login successful!') {
						window.location.replace('/festivals/index');
				};
				next();
			} 
		);   		
    } 
};
  
// Load options into AJAX form
$('form').ajaxForm(options);
