<h2 id='festival_title'><?=$current_festival['title']?></h2>

<a id='edit_button' href='/festivals/post/<?=$current_festival['festival_id']?>'>Edit festival details</a>

<!-- Festival wrapper for formatting -->
<div id='festival_wrapper'>

	<!-- Subheader wrapper -->
	<div id='subheader_wrapper'>

		<!-- Plan button wrapper for formating -->
		<div id='plan_button_wrapper'>

			<!-- Plan button -->
			<a id='plan_button' href='/festivals/plan/<?=$current_festival['festival_id']?>'>Plan</a>

		</div>
		<!-- End of plan button wrapper -->

		<!-- CONFIRMED FLAG -->
		<p class='flags'>

			Confirmed<br>

			<?php if($current_festival['status'] == 'wishlist'): ?>
				<img alt='<?=$current_festival['festival_id']?>' class='c_wishlisted' src='/images/thumbs_up_white.gif' title='Select if you are confirmed for this festival' height='30' width='30'>
			<?php elseif($current_festival['status'] == 'confirmed'): ?>
				<img alt='<?=$current_festival['festival_id']?>' class='c_confirmed' src='/images/thumbs_up_yellow.gif' title='Select to remove confirmation for this festival' height='30' width='30'>
			<?php else: ?>
				<img alt='<?=$current_festival['festival_id']?>' class='c_no_rsvp' src='/images/thumbs_up_white.gif' title='Select if you are confirmed for this festival' height='30' width='30'>
			<?php endif; ?>

		</p>

		<!-- WISH LIST FLAG -->
		<p class='flags'>

			Wishlist<br>

			<?php if($current_festival['status'] == 'wishlist'): ?>
				<img alt='<?=$current_festival['festival_id']?>' class='w_wishlisted' src='/images/heart_yellow.gif' title='Select to remove from wishlist' height='30' width='30'>
			<?php elseif($current_festival['status'] == 'confirmed'): ?>
				<img alt='<?=$current_festival['festival_id']?>' class='w_confirmed' src='/images/heart_white.gif' title='Select to add to wishlist' height='30' width='30'>
			<?php else: ?>
				<img alt='<?=$current_festival['festival_id']?>' class='w_no_rsvp' src='/images/heart_white.gif' title='Select to add to wishlist' height='30' width='30'>
			<?php endif; ?>

		</p>

		<!-- Empty div for clearing -->
		<div id='empty_div'></div>

	</div>
	<!-- End of subheader wrapper -->

	<p>
		<span class='field_title'>Location<br></span>
		<?=$current_festival['location']?>
	</p>

	<p>
		<span class='field_title'>Dates<br></span>
		<?=$current_festival['start_date']?> to <?=$current_festival['end_date']?>
	</p>

	<p>
		<span class='field_title'>Genre<br></span>
		<?=$current_festival['genre']?>
	</p>

	<p>
		<span class='field_title'>Link<br></span>
		<a href=<?=$current_festival['link']?>> <?=$current_festival['link']?> </a>
	</p>

	<p>
		<span class='field_title'>Cost<br></span>
		<?=$current_festival['cost']?>
	</p>

	<p>
		<span class='field_title'>Desciption<br></span>
		<?=$current_festival['description']?>
	</p>

<!-- End of festival wrapper -->
</div>