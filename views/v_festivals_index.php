<?php if($index_type == 'home'): ?>

	<h2>All Festivals</h2>

	<p><a href='/festivals/post'>Post a new festival!</a></p>

<?php elseif($index_type == 'self'): ?>

	<h2>My Festivals</h2>

<?php elseif($index_type == 'friend'): ?>

	<h2><?=$user_info['first_name']?> <?=$user_info['last_name']?></h2>

<?php endif; ?>

<?php foreach($festival_list as $fest): ?>

	<p>
		<a href=<?='/festivals/event/'.$fest['festival_id'];?>>
			<?=$fest['title']?>
		</a>
	</p>

	<p><?=$fest['location']?></p>

	<p><?=$fest['start_date']?></p>

	<p><?=$fest['end_date']?></p>

	<?php if($index_type == 'home' or $index_type == 'self'): ?>

		<!-- WISH LIST FLAG -->
		<p>
			<?php if($fest['status'] == 'wishlist'): ?>
				<img alt='<?=$fest['festival_id']?>' class='w_wishlisted' src='/images/thumbs_up_green.gif' title='Select to remove from wishlist' height='30' width='30'>
			<?php elseif($fest['status'] == 'confirmed'): ?>
				<img alt='<?=$fest['festival_id']?>' class='w_confirmed' src='/images/thumbs_up_white.gif' title='Select to add to wishlist' height='30' width='30'>
			<?php else: ?>
				<img alt='<?=$fest['festival_id']?>' class='w_no_rsvp' src='/images/thumbs_up_white.gif' title='Select to add to wishlist' height='30' width='30'>
			<?php endif; ?>
		</p>

		<!-- CONFIRMED FLAG -->
		<p>
			<?php if($fest['status'] == 'wishlist'): ?>
				<img alt='<?=$fest['festival_id']?>' class='c_wishlisted' src='/images/thumbs_up_white.gif' title='Select if you are confirmed for this festival' height='30' width='30'>
			<?php elseif($fest['status'] == 'confirmed'): ?>
				<img alt='<?=$fest['festival_id']?>' class='c_confirmed' src='/images/thumbs_up_green.gif' title='Select to remove confirmation for this festival' height='30' width='30'>
			<?php else: ?>
				<img alt='<?=$fest['festival_id']?>' class='c_no_rsvp' src='/images/thumbs_up_white.gif' title='Select if you are confirmed for this festival' height='30' width='30'>
			<?php endif; ?>
		</p>

	<?php endif; ?>

<?php endforeach; ?>
