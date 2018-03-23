<h2 class="extralarge top-space align-center">Add Test Questions</h2>

<div class="ink-grid">
	<div class="column-group">
		<div class="all-100 small-100 tiny-100 push-center">
			<table class="ink-table q-table">
			<?php echo form_open('questions/submit_all/'.$this->uri->segment(3), 'class="ink-form"'); //segment 3 = test id			?>
			<?php for ($i=1; $i<=$total_ques; $i++):?>
			     <?php echo form_hidden('test_id', $this->uri->segment(3));?>
			     <?php echo form_hidden('total_ques', $total_ques);?>
			     <tr>
			         <td class="q-table"><?php echo 'Question '.$i; ?></td>
			         <td class="q-table"><?php 
			         $tb = array(
			             'name'        => 'ques_title'.$i,
			             'value'       => '',
			             'rows'        => '5',
			             'cols'        => '60',
			         );
			             echo form_textarea($tb); ?></td>
			         <td class="q-table"><div class="control">
			             <?php echo form_input('ans1'.$i, '', 'placeholder="Answer 1"'); echo br(1); ?>
			             <?php echo form_input('ans2'.$i, '', 'placeholder="Answer 2"'); echo br(1); ?>
			             <?php echo form_input('ans3'.$i, '', 'placeholder="Answer 3"'); echo br(1); ?>
			             <?php echo form_input('ans4'.$i, '', 'placeholder="Answer 4"'); ?></div>
			         </td>
			         <td class="q-table"><?php echo form_input('true_ans'.$i, '', 'placeholder="True answer no (1/2/3/4)"'); ?></td>
			     </tr>
			<?php endfor; ?>
				<tr>
			         <td class="q-table"></td>
			         <td class="q-table"></td>
			         <td class="q-table"></td>
			         <td class="q-table"><?php echo form_submit('submit', 'Submit', 'class="ink-button green"'); ?></td>
			    </tr>
			<?php echo form_close();  ?>
			</table>
		</div>
	</div>
</div>