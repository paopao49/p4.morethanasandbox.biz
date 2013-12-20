$('.field_cell').click(function(){
	var clicked_id = $(this).attr('id');

	var display_select = '#'+clicked_id+'_display';	
	var form_select = '#'+clicked_id+'_form';

	$(display_select).css('display','none');
	$(form_select).css('display','inline');

});

$('#save_icon').click(function(){
	$.ajax({
		type: 'POST',
		url: '/festivals/p_plan',
		beforeSend: function(){
			$('#loading_icon').css('display','inline');
		},
		success: function(response){
			$('#loading_icon').css('display','none');
			$('#message_holder').html(response);
			$('#message_holder')
				.css('display','inline')
				.delay(1500)
				.queue(function(next){
					$(this).css('display','none')					
					next();
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

}); // End of click listener

