<h2><?=$current_festival['title']?></h2>

<div id='festival_detail_wrapper'>

	<p class='festival_details'><?=$current_festival['location']?></p>

	<p class='spacer'>|</p>

	<p class='festival_details'><?=$current_festival['start_date']?> to <?=$current_festival['end_date']?></p>

	<p class='spacer'>|</p>

	<?php if(!$current_festival['link']): ?>
		<span>No link provided.</span>
	<?php else: ?>
		<p class='festival_details'><a href="<?=$current_festival['link']?>"><?=$current_festival['link']?><a></p>
	<?php endif; ?>

	<div id='empty_div'></div>

</div>

<!-- Festival ID passed for AJAX purposes and not displayed -->
<p id='passed_id'><?=$current_festival['festival_id']?></p>


<!-- Display instructions for user -->
<p id='instructions'>
    Click a field to edit.<br>
    Click "Save" when you are ready to party.
</p>

<!-- Display message upon save attempt -->
<p id='message_holder'></p>

<!-- Display loading icon if there is client/server delay -->
<div><img id='loading_icon' src='/images/loading.gif' alt='Loading...'></div>

<!-- Displays total festival cost -->
<p id='total_cost'>
	Total Cost: $<span id='cost_holder'></span>
</p>

<!--
	Festival plan table. Written out in order to get unique IDs, which enable inline editing through JavaScript
-->
<table>
	<thead>
		<tr>
			<th>Category</th>			
			<th>Task Name</th>
			<th>Cost</th>
			<th>Notes</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				Transportation
			</td>
			<td id='field_b1' class='field_cell'>
				<span id='field_b1_display'><?=$current_plan['transportation_name']?></span>
				<input id='field_b1_form' class='field_form' type='text' value='<?=$current_plan['transportation_name']?>'>
			</td>
			<td id='field_c1' class='field_cell'>
				<span class='cost_field' id='field_c1_display'><?=$current_plan['transportation_cost']?></span>
				<input id='field_c1_form' class='field_form' type='text' value='<?=$current_plan['transportation_cost']?>'>
			</td>
			<td id='field_d1' class='field_cell'>
				<span id='field_d1_display'><?=$current_plan['transportation_notes']?></span>
				<input id='field_d1_form' class='field_form' type='text' value='<?=$current_plan['transportation_notes']?>'>
			</td>
		</tr>
		<tr>
			<td>
				Accomodation
			</td>			
			<td id='field_b2' class='field_cell'>				
                <span id='field_b2_display'><?=$current_plan['accomodation_name']?></span>
                <input id='field_b2_form' class='field_form' type='text' value='<?=$current_plan['accomodation_name']?>'>				
			</td>
			<td id='field_c2' class='field_cell'>
				<span class='cost_field' id='field_c2_display'><?=$current_plan['accomodation_cost']?></span>
                <input id='field_c2_form' class='field_form' type='text' value='<?=$current_plan['accomodation_cost']?>'>								
			</td>
			<td id='field_d2' class='field_cell'>
				<span id='field_d2_display'><?=$current_plan['accomodation_notes']?></span>
                <input id='field_d2_form' class='field_form' type='text' value='<?=$current_plan['accomodation_notes']?>'>								
			</td>
		</tr>
		<tr>
			<td>
				Festival Tickets
			</td>
			<td  id='field_b3' class='field_cell'>
				<span id='field_b3_display'><?=$current_plan['tickets_name']?></span>
				<input id='field_b3_form' class='field_form' type='text' value='<?=$current_plan['tickets_name']?>'>
			</td>
			<td id='field_c3' class='field_cell'>
				<span class='cost_field' id='field_c3_display'><?=$current_plan['tickets_cost']?></span>
				<input id='field_c3_form' class='field_form' type='text' value='<?=$current_plan['tickets_cost']?>'>
			</td>
			<td id='field_d3' class='field_cell'>
				<span id='field_d3_display'><?=$current_plan['tickets_notes']?></span>
				<input id='field_d3_form' class='field_form' type='text' value='<?=$current_plan['tickets_notes']?>'>
			</td>
		</tr>
		<tr>
			<td>
				Other 1
			</td>
			<td id='field_b4' class='field_cell'>
				<span id='field_b4_display'><?=$current_plan['other_1_name']?></span>
				<input id='field_b4_form' class='field_form' type='text' value='<?=$current_plan['other_1_name']?>'>
			</td>
			<td id='field_c4' class='field_cell'>
				<span class='cost_field' id='field_c4_display'><?=$current_plan['other_1_cost']?></span>
				<input id='field_c4_form' class='field_form' type='text' value='<?=$current_plan['other_1_cost']?>'>
			</td>
			<td id='field_d4' class='field_cell'>
				<span id='field_d4_display'><?=$current_plan['other_1_notes']?></span>
				<input id='field_d4_form' class='field_form' type='text' value='<?=$current_plan['other_1_notes']?>'>
			</td>
		</tr>
		<tr>
			<td>
				Other 2
			</td>
			<td id='field_b5' class='field_cell'>
				<span id='field_b5_display'><?=$current_plan['other_2_name']?></span>
				<input id='field_b5_form' class='field_form' type='text' value='<?=$current_plan['other_2_name']?>'>
			</td>
			<td id='field_c5' class='field_cell'>
				<span class='cost_field' id='field_c5_display'><?=$current_plan['other_2_cost']?></span>
				<input id='field_c5_form' class='field_form' type='text' value='<?=$current_plan['other_2_cost']?>'>
			</td>
			<td id='field_d5' class='field_cell'>
				<span id='field_d5_display'><?=$current_plan['other_2_notes']?></span>
				<input id='field_d5_form' class='field_form' type='text' value='<?=$current_plan['other_2_notes']?>'>
			</td>
		</tr>
		<tr>
			<td>
				Other 3
			</td>
			<td id='field_b6' class='field_cell'>
				<span id='field_b6_display'><?=$current_plan['other_3_name']?></span>
				<input id='field_b6_form' class='field_form' type='text' value='<?=$current_plan['other_3_name']?>'>
			</td>
			<td id='field_c6' class='field_cell'>
				<span class='cost_field' id='field_c6_display'><?=$current_plan['other_3_cost']?></span>
				<input id='field_c6_form' class='field_form' type='text' value='<?=$current_plan['other_3_cost']?>'>
			</td>
			<td id='field_d6' class='field_cell'>
				<span id='field_d6_display'><?=$current_plan['other_3_notes']?></span>
				<input id='field_d6_form' class='field_form' type='text' value='<?=$current_plan['other_3_notes']?>'>
			</td>
		</tr>	
	</tbody>
</table>							

<p id='save_icon'>Save</p>
