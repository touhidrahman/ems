<h2 class="extralarge top-space align-center">Add Test Questions</h2>

<div class="ink-grid">
	<div class="column-group">
		<div class="all-100 small-100 tiny-100 push-center">
			<table class="ink-table q-table">
			<?php echo form_open('questions/submit/'.$update_id, 'class="ink-form"'); //segment 3 = test id			?>
			     <?php echo form_hidden('test_id', $this->uri->segment(3));?>
			     <?php echo form_hidden('total_ques', $total_ques);?>
			     <tr>
			         <td class="q-table"><?php echo 'Question '.$i.' of '. $total_ques; ?></td>
			         <td class="q-table"><?php echo form_textarea('ques_title', $ques_title, 'cols="10" rows="3"'); ?></td>
			         <td class="q-table">
			             <?php echo form_input('ans1', $ans1); echo br(1); ?>
			             <?php echo form_input('ans2', $ans2); echo br(1); ?>
			             <?php echo form_input('ans3', $ans3); echo br(1); ?>
			             <?php echo form_input('ans4', $ans4); ?>
			         </td>
			         <td class="q-table"><?php echo form_input('true_ans', $true_ans); ?></td>
			    </tr>
				<tr>
			         <td class="q-table"></td>
			         <td class="q-table"></td>
			         <td class="q-table"></td>
			         <td class="q-table"><?php echo form_submit('submit', 'Submit', 'class="ink-button green"'); ?></td>
			    </tr>
			<?php echo form_close(); ?>
			</table>
		</div>
	</div>
</div>