<h1>Friends</h1>
<p>Everyone is a friend in EZFest!</p>

<?php foreach($friends_list as $friend): ?>

	<p>
		<a href='/festivals/index/<?=$friend['user_id']?>'>
			<?=$friend['first_name']?> <?=$friend['last_name']?>
		</a>
	</p>

<?php endforeach; ?>

