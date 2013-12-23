<!--
	Using standard PHP syntax to write HTML tags because of the need for variables.
	If $festival is a given variable, page is used to edit an existing festival.
	If $festival is not a given variable, page is used to post a new festival.
-->

<?php

	$title = '';
	$start_date = '';
	$end_date = '';
	$location = '';
	$genre = '';
	$link = '';
	$cost = '';
	$description = '';
	$submit_button = 'Post Festival';
	$festival_id = '""';

	$title_size = '20';
	$start_date_size = '20';
	$end_date_size = '20';
	$location_size = '20';
	$genre_size = '20';
	$link_size = '20';
	$cost_size = '20';
	$description_size = '20';

	$header = 'Post a new festival!';
	$instructions = 'Fields marked by * are mandatory.';	

	if(isset($festival)) {

		$title = $festival['title'];
		$start_date = $festival['start_date'];
		$end_date = $festival['end_date'];
		$location = $festival['location'];
		$genre = $festival['genre'];
		$link = $festival['link'];
		$cost = $festival['cost'];
		$description = $festival['description'];
		$submit_button = 'Save Edits';
		$festival_id = $festival['festival_id'];

		$title_size = strlen($title);
		$start_date_size = strlen($start_date);
		$end_date_size = strlen($end_date);
		$location_size = strlen($location);
		$genre_size = strlen($genre);
		$link_size = strlen($link);
		$cost_size = strlen($cost);
		$description_size = strlen($description);		

		$header = 'Edit festival details.';

	}

	echo '

		<h2>'.$header.'</h2>

		<p id="instructions">'.$instructions.'</p>

		<p id="message_holder"></p>	

		<form>

			<input id="id_holder" name="festival_id" value='.$festival_id.'>

			*Title <input size='.$title_size.' type="text" name="title" value="'.$title.'"><br>

			*Start Date <input id="start_date" size='.$start_date_size.' type="text" name="start_date" value="'.$start_date.'"><br>

			*End Date <input id="end_date" size='.$end_date_size.' type="text" name="end_date" value="'.$end_date.'"><br>

			*Location <input size='.$location_size.' type="text" name="location" value="'.$location.'"><br>

			Genre <input size='.$genre_size.' type="text" name="genre" value="'.$genre.'"><br>

			Link <input size='.$link_size.' type="text" name="link" value="'.$link.'"><br>

			Cost <input size='.$cost_size.' type="text" name="cost" value="'.$cost.'"><br>

			Description <input size='.$description_size.' type="text" name="description" value="'.$description.'"><br>

			<input id="submit_button" type="submit" value="'.$submit_button.'">

		</form>

		<br>	
	';

?>
