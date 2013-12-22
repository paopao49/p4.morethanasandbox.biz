<!-- This view displays three different sets of festivals:
		1. home (all festivals)
		2. self (all festivals user has provided an rsvp for)
		3. friend (all festivals a specific other user has provided an rsvp for)
-->

<!-- Subheader -->
<?php if($index_type == 'home'): ?>

	<h2>All Festivals</h2>

	<p><a id='post_button' href='/festivals/post'>Post a new festival!</a></p>

<?php elseif($index_type == 'self'): ?>

	<h2>My Festivals</h2>

<?php elseif($index_type == 'friend'): ?>

	<h2><?=$user_info['first_name']?> <?=$user_info['last_name']?></h2>

<?php endif; ?>
<!-- End of subheader -->

<!-- Festival List -->
<?php foreach($festival_list as $fest): ?>

	<!-- Festival wrapper for formatting -->
	<div class='festival_wrapper'>

		<!--
			WISH LIST/CONFIRMED FLAGS:
			User can rsvp from the home or self pages
		-->
		<?php if($index_type == 'home' or $index_type == 'self'): ?>

			<!-- Plan link available if user is looking at own festivals -->
			<?php if($index_type == 'self'): ?>

				<a class='plan_button' href='/festivals/plan/<?=$fest['festival_id']?>'>Plan</a>

			<?php endif; ?>		

			<!-- CONFIRMED FLAG -->
			<p class='flags'>

				Confirmed<br>

				<?php if($fest['status'] == 'wishlist'): ?>
					<img alt='<?=$fest['festival_id']?>' class='c_wishlisted' src='/images/thumbs_up_white.gif' title='Select if you are confirmed for this festival' height='30' width='30'>
				<?php elseif($fest['status'] == 'confirmed'): ?>
					<img alt='<?=$fest['festival_id']?>' class='c_confirmed' src='/images/thumbs_up_yellow.gif' title='Select to remove confirmation for this festival' height='30' width='30'>
				<?php else: ?>
					<img alt='<?=$fest['festival_id']?>' class='c_no_rsvp' src='/images/thumbs_up_white.gif' title='Select if you are confirmed for this festival' height='30' width='30'>
				<?php endif; ?>
				
			</p>
			<!-- End of CONFIRMED FLAG -->				

			<!-- WISH LIST FLAG -->
			<p class='flags'>

				Wishlist<br>

				<?php if($fest['status'] == 'wishlist'): ?>
					<img alt='<?=$fest['festival_id']?>' class='w_wishlisted' src='/images/heart_yellow.gif' title='Select to remove from wishlist' height='30' width='30'>
				<?php elseif($fest['status'] == 'confirmed'): ?>
					<img alt='<?=$fest['festival_id']?>' class='w_confirmed' src='/images/heart_white.gif' title='Select to add to wishlist' height='30' width='30'>
				<?php else: ?>
					<img alt='<?=$fest['festival_id']?>' class='w_no_rsvp' src='/images/heart_white.gif' title='Select to add to wishlist' height='30' width='30'>
				<?php endif; ?>
				
			</p>
			<!-- End of WISH LIST FLAG -->		

		<?php endif; ?>
		<!-- End of WISH LIST/CONFIRMED FLAGS -->	

		<p>
			<a class='festival_title' href=<?='/festivals/event/'.$fest['festival_id'];?>>
				<?=$fest['title']?>
			</a>
		</p>

		<p class='festival_location'><?=$fest['location']?></p>

		<p class='festival_dates'><?=$fest['start_date']?> to <?=$fest['end_date']?></p>

		<!-- Empty div for float clearing -->
		<div class='empty_div'></div>

	</div>
	<!-- End of festival wrapper -->

<?php endforeach; ?>
<!-- End of Festival List -->
