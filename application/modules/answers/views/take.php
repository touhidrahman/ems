<h2 class="extralarge top-space align-center">Test Name</h2>

<div class="ink-grid">
	<div class="column-group">
		<div class="all-60 small-100 tiny-100 push-center">
			<table class="ink-table bordered" border="0">
			<?php echo form_open('tests/take/'.$test_id, 'class="ink-form"');?>
			<?php foreach ($ques->result() as $q):?>
			     <?php echo form_hidden('ques_id', $q->id);?>
				<tr><td colspan="2"><strong><?php echo 'Question '. $counter .' of '. $total_ques; ?></strong></td></tr>
				<tr><td colspan="2"><?php echo $q->ques_title; ?></td></tr>
				<tr><td><?php echo form_radio('user_ans', '1')?></td><td><?php echo $q->ans1; ?></td></tr>
				<tr><td><?php echo form_radio('user_ans', '2')?></td><td><?php echo $q->ans2; ?></td></tr>
				<tr><td><?php echo form_radio('user_ans', '3')?></td><td><?php echo $q->ans3; ?></td></tr>
				<tr><td><?php echo form_radio('user_ans', '4')?></td><td><?php echo $q->ans4; ?></td></tr>
				<tr><td></td><td><?php echo form_submit('submit', 'Submit & Next', 'class="ink-button green"'); ?></td></tr>
				
			<?php endforeach; echo form_close();  ?>
			</table>
		</div>
	</div>
</div>