// For formmating only - borrowed online:
// http://stackoverflow.com/questions/2901102/how-to-print-a-number-with-commas-as-thousands-separators-in-javascript
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// Calculate total festival cost when document loads
$(document).ready(function(){

	var costs = 0;

	$('.cost_field').each(function(){

		var current_cost = $(this).html();

		costs += parseInt(current_cost);

	});

	$('#cost_holder').html(numberWithCommas(costs));
});

// Swap table value for HTML form, to allow for inline editing
$('.field_cell').click(function(){
	var clicked_id = $(this).attr('id');

	var display_select = '#'+clicked_id+'_display';	
	var form_select = '#'+clicked_id+'_form';

	$(display_select).css('display','none');
	$(form_select).css('display','inline');

});

// Test if user entered 
function integer_test() {

	var integer_boolean = true;

	$('input[id*="_c"]').each(function(){

		var cost_value  = parseInt($(this).val());

		console.log(cost_value);		

		if(!(
			(typeof cost_value === 'number') || 
			(cost_value === null) ||
			(cost_value === '')
		)) {

			integer_boolean = false;

		}

	});

	return integer_boolean;

} 

// Click listener for save icon
$('#save_icon').click(function(){

	console.log(integer_test());

	if(integer_test()) {

		$.ajax({
			type: 'POST',
			url: '/festivals/p_plan',
			beforeSend: function(){
				$('#loading_icon').css('display','inline');
			},
			success: function(response) {
				$('#loading_icon').css('display','none');
				$('#message_holder').html(response);
				$('#message_holder')
					.css('display','inline')
					.delay(1000)
					.queue(function(){
						console.log('yay');
						//location.reload();
					}
				);
			},
			data: {

				festival_id: $('#passed_id').html(),

				transportation_name: $('#field_b1_form').val(),
				transportation_cost: $('#field_c1_form').val(),
				transportation_notes: $('#field_d1_form').val(),

				accomodation_name: $('#field_b2_form').val(),
				accomodation_cost: $('#field_c2_form').val(),
				accomodation_notes: $('#field_d2_form').val(),

				tickets_name: $('#field_b3_form').val(),
				tickets_cost: $('#field_c3_form').val(),
				tickets_notes: $('#field_d3_form').val(),

				other_1_name: $('#field_b4_form').val(),
				other_1_cost: $('#field_c4_form').val(),
				other_1_notes: $('#field_d4_form').val(),

				other_2_name: $('#field_b5_form').val(),
				other_2_cost: $('#field_c5_form').val(),
				other_2_notes: $('#field_d5_form').val(),

				other_3_name: $('#field_b6_form').val(),
				other_3_cost: $('#field_c6_form').val(),
				other_3_notes: $('#field_d6_form').val(),

			}, // End of data

		}); // End of .ajax

	} else {

		$('#message_holder').html('Please enter valid integers for festival costs.');
		$('#message_holder').css('display','inline');		

	} // End of else statement

}); // End of click listener

