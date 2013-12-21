<h2><?=$current_festival['title']?></h2>
<p><?=$current_festival['start_date']?> to <?=$current_festival['end_date']?></p>
<p><?=$current_festival['location']?></p>
<p><?=$current_festival['link']?></p>
<p id='passed_id'><?=$current_festival['festival_id']?></p>

<p>
    Click a field to edit.<br>
    Click "Save" when you are ready to party.
</p>


<table cellspacing='0'>
	<thead>
		<tr>
			<th>Category</th>			
			<th>Task Name</th>
			<th>Cost</th>
			<th>Notes</th>
		</tr>
	<thead>
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
				<span id='field_c1_display'><?=$current_plan['transportation_cost']?></span>
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
				<span id='field_c2_display'><?=$current_plan['accomodation_cost']?></span>
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
				<span id='field_c3_display'><?=$current_plan['tickets_cost']?></span>
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
				<span id='field_c4_display'><?=$current_plan['other_1_cost']?></span>
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
				<span id='field_c5_display'><?=$current_plan['other_2_cost']?></span>
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
				<span id='field_c6_display'><?=$current_plan['other_3_cost']?></span>
				<input id='field_c6_form' class='field_form' type='text' value='<?=$current_plan['other_3_cost']?>'>
			</td>
			<td id='field_d6' class='field_cell'>
				<span id='field_d6_display'><?=$current_plan['other_3_notes']?></span>
				<input id='field_d6_form' class='field_form' type='text' value='<?=$current_plan['other_3_notes']?>'>
			</td>
		</tr>	
	</tbody>
</table>								

<!-- Need FORM VALIDATION TO MAKE SURE USER IS ENTERING VALID COSTS -->
<p>Total Cost</p>

<p id='save_icon'>Save</p>
<p id='message_holder'></p>
<div><img id='loading_icon' src='/images/loading.gif'></div>
