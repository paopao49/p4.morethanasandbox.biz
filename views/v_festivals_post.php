<!--
	Using standard PHP syntax to write HTML tags because of the need for variables.
	If $festival is a given variable, page is used to edit an existing festival.
	If $festival is not a given variable, page is used to post a new festival.
-->

<?php

	$title = null;
	$start_date = null;
	$end_date = null;
	$location = null;
	$genre = null;
	$link = null;
	$cost = null;
	$description = null;
	$submit_button = 'Post Festival';
	$festival_id = null;
	$message = '
		Post a new festival!<br>
		Fields marked by * are mandatory.<br>'
	;

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
		$message = '
			Edit festival details.<br>
			Fields marked by * are mandatory.<br>'
		;		

	}

	echo '
		<form method="POST" action="/festivals/p_post">'.$message.'

		<input id="id_holder" name="festival_id" value='.$festival_id.'>

		*Title <input size='.strlen($title).' type="text" name="title" value="'.$title.'"><br>

		*Start Date <input id="start_date" size='.strlen($start_date).' type="text" name="start_date" value="'.$start_date.'"><br>

		*End Date <input id="end_date" size='.strlen($end_date).' type="text" name="end_date" value="'.$end_date.'"><br>

		*Location <input size='.strlen($location).' type="text" name="location" value="'.$location.'"><br>

		Genre <input size='.strlen($genre).' type="text" name="genre" value="'.$genre.'"><br>

		Link <input size='.strlen($link).' type="text" name="link" value="'.$link.'"><br>

		Cost <input size='.strlen($cost).' type="text" name="cost" value="'.$cost.'"><br>

		Description <input size='.strlen($description).' type="text" name="description" value="'.$description.'"><br>

		<input id="submit_button" type="submit" value="'.$submit_button.'">
	</form>

	<br>
	<p id="message_holder">Changes made. Redirecting to home page...</p>
	';

?>
