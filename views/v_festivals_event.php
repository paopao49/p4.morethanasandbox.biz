<!-- WISH LIST FLAG -->
<p>
	<?php if($current_festival['status'] == 'wishlist'): ?>
		<img alt='<?=$current_festival['festival_id']?>' class='w_wishlisted' src='/images/thumbs_up_green.gif' title='Select to remove from wishlist' height='30' width='30'>
	<?php elseif($current_festival['status'] == 'confirmed'): ?>
		<img alt='<?=$current_festival['festival_id']?>' class='w_confirmed' src='/images/thumbs_up_white.gif' title='Select to add to wishlist' height='30' width='30'>
	<?php else: ?>
		<img alt='<?=$current_festival['festival_id']?>' class='w_no_rsvp' src='/images/thumbs_up_white.gif' title='Select to add to wishlist' height='30' width='30'>
	<?php endif; ?>
</p>

<!-- CONFIRMED FLAG -->
<p>
	<?php if($current_festival['status'] == 'wishlist'): ?>
		<img alt='<?=$current_festival['festival_id']?>' class='c_wishlisted' src='/images/thumbs_up_white.gif' title='Select if you are confirmed for this festival' height='30' width='30'>
	<?php elseif($current_festival['status'] == 'confirmed'): ?>
		<img alt='<?=$current_festival['festival_id']?>' class='c_confirmed' src='/images/thumbs_up_green.gif' title='Select to remove confirmation for this festival' height='30' width='30'>
	<?php else: ?>
		<img alt='<?=$current_festival['festival_id']?>' class='c_no_rsvp' src='/images/thumbs_up_white.gif' title='Select if you are confirmed for this festival' height='30' width='30'>
	<?php endif; ?>
</p>

<a href='/festivals/plan/<?=$current_festival['festival_id']?>'>Plan</a>

<p>Title: <?=$current_festival['title']?></p>
<p>Location: <?=$current_festival['location']?></p>
<p>Dates: <?=$current_festival['start_date']?> to <?=$current_festival['end_date']?></p>
<p>Genre: <?=$current_festival['genre']?></p>
<p>Link: <a href=<?=$current_festival['link']?>> <?=$current_festival['link']?> </a></p>
<p>Cost: <?=$current_festival['cost']?></p>
<p>Desciption: <?=$current_festival['description']?></p>

<a id='edit_button' href='/festivals/post/<?=$current_festival['festival_id']?>'>Edit</a>