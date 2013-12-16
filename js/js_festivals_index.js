// Click listener for wishlist icon
$("[class^='w_']").click(function(){

	// Determine which festival was clicked on
	var fest_id = $(this).attr('alt');

	// Determine value of user in RSVP table
	var icon_type = $(this).attr('class');

	var c_selector = "[class^='c_'][alt='"+fest_id+"']";
	var w_selector = "[class^='w_'][alt='"+fest_id+"']";

	if(icon_type == 'w_wishlisted') {

		$.ajax({
			type: 'POST',
			url: '/festivals/rsvp',
			beforeSend: function(){
				$(w_selector).attr('src','/images/loading.gif');
			},
			success: function(response){
				$(w_selector).attr('src','/images/thumbs_up_white.gif');				
				$(c_selector).attr('src','/images/thumbs_up_white.gif');

				$(w_selector).attr('class','w_no_rsvp');
				$(c_selector).attr('class','c_no_rsvp');								
			},
			data: {
				festival_id: fest_id,
				status: null,
			}
		}); // End of AJAX		

	} else if(icon_type == 'w_confirmed' || icon_type == 'w_no_rsvp') {

		$.ajax({
			type: 'POST',
			url: '/festivals/rsvp',
			beforeSend: function(){
				$(w_selector).attr('src','/images/loading.gif');
			},
			success: function(response){
				$(w_selector).attr('src','/images/thumbs_up_green.gif');				
				$(c_selector).attr('src','/images/thumbs_up_white.gif');

				$(w_selector).attr('class','w_wishlisted');
				$(c_selector).attr('class','c_wishlisted');								
			},
			data: {
				festival_id: fest_id,
				status: 'wishlist',
			}
		}); // End of AJAX

	}; // End of if

}); // End of click listener

// Click listener for confirmed icon
$("[class^='c_']").click(function(){

	// Determine which festival was clicked on
	var fest_id = $(this).attr('alt');

	// Determine value of user in RSVP table
	var icon_type = $(this).attr('class');

	var c_selector = "[class^='c_'][alt='"+fest_id+"']";
	var w_selector = "[class^='w_'][alt='"+fest_id+"']";

	if(icon_type == 'c_confirmed') {

		$.ajax({
			type: 'POST',
			url: '/festivals/rsvp',
			beforeSend: function(){
				$(c_selector).attr('src','/images/loading.gif');
			},
			success: function(response){
				$(w_selector).attr('src','/images/thumbs_up_white.gif');				
				$(c_selector).attr('src','/images/thumbs_up_white.gif');

				$(w_selector).attr('class','w_no_rsvp');
				$(c_selector).attr('class','c_no_rsvp');								
			},
			data: {
				festival_id: fest_id,
				status: null,
			}
		}); // End of AJAX		

	} else if(icon_type == 'c_wishlisted' || icon_type == 'c_no_rsvp') {

		$.ajax({
			type: 'POST',
			url: '/festivals/rsvp',
			beforeSend: function(){
				$(c_selector).attr('src','/images/loading.gif');
			},
			success: function(response){
				$(w_selector).attr('src','/images/thumbs_up_white.gif');				
				$(c_selector).attr('src','/images/thumbs_up_green.gif');

				$(w_selector).attr('class','w_confirmed');
				$(c_selector).attr('class','c_confirmed');								
			},
			data: {
				festival_id: fest_id,
				status: 'confirmed',
			}
		}); // End of AJAX

	}; // End of if

}); // End of click listener

