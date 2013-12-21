// Need to implement form validator to check for all 4 required fields

// Use jQuery UI to build date pickers
$(document).ready(function(){
	$("#start_date").datepicker();
	$("#end_date").datepicker();
});

// Displays success message when user posts or saves
$('#submit_button').click(function(){
	$('#message_holder').css('display','inline');
});
