// Setting up options for AJAX form
var options = { 
    type: 'post',
    url: '/reg/p_join',
    success: function(response) {
		/*$('#message_holder')
			.css('display','inline')
			.delay(1000)
			.queue(function(){
				window.location.replace('/festivals/index');
			}
		);  */
		console.log('ysssss');
    } 
};
  
// Load options into AJAX form
$('form').ajaxForm(options);

console.log('yayya');