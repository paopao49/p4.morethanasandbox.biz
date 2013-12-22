<h2>Friends</h2>

<p id='description'>
	Everyone is a friend in EZFest! <br>
	See what others are interested in attending!
</p>

<?php foreach($friends_list as $friend): ?>

	<p>
		<a href='/festivals/index/<?=$friend['user_id']?>'>
			<?=$friend['first_name']?> <?=$friend['last_name']?>
		</a>
	</p>

<?php endforeach; ?>

