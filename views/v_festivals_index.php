<p><a href='/festivals/post'>Post a new festival!</a></p>

	<!-- for debugging 
	<pre>;
	<?php echo print_r($festival_list); ?>
	</pre>;
	-->

<?php foreach($festival_list as $fest): ?>

	<p>
		<a href=<?='/festivals/event/' . $fest['festival_id'];?>>
			<?=$fest['title']?>
		</a>
	</p>
	<p><?=$fest['location']?></p>
	<p><?=$fest['start_date']?></p>
	<p><?=$fest['end_date']?></p>

<?php endforeach; ?>
