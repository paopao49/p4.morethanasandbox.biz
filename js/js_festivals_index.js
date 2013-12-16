// Action of wishlist icon click listener depends on values of w and c
$('.wishlisted,.not_wishlisted').click(function(){

	// Determine which festival was clicked on
	var festival_id = $(this).attr('id');

	// Determine state of wishlist icon
	var w = $(this).attr('title');

	// Determine state of confirm icon
	var c = $(this).attr('title');	

	var d = $(this[])

	console.log(festival_id);

	console.log(w);

	console.log(c);

	console.log(d);

	/*
	if(w=='not_wishlisted' && c=='not_confirmed') {
		console.log('no_w|no_c');
	} else if(w=='wishlisted' &&) c=='not_confirmed') {
		console.log('w|no_c');
	} else if(w=='not_wishlisted' && c=='confirmed') {
		console.log('no_w|c');
	}
	*/

});

// Action of confirm icon click listener depends on values of w and c
$('.confirmed,.not_confirmed').click(function(){
	console.log('bbbbbbbbbb');
});
