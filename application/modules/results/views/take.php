<h2 class="extralarge top-space align-center"><?php echo $prog_code." ".$batch ." > ". $sub_code ." > ". $testname; ?></h2>

<div class="ink-grid">
	<div class="column-group">
		<div class="all-60 small-100 tiny-100 push-center">
			<table class="ink-table q-table">
			<?php echo form_open('tests/take/'.$test_id, 'class="ink-form"');
			$counter = $this->session->userdata('counter');
			?>
			<?php foreach ($ques->result() as $q):?>
			     <?php echo form_hidden('ques_id', $q->id);?>
				<tr><td class="q-table" colspan="2"><strong><?php echo 'Question '. $counter .' of '. $total_ques; ?></strong></td></tr>
				<tr><td class="q-table" colspan="2"><?php echo $q->ques_title; ?></td></tr>
				<tr><td class="q-table" align="right"><?php echo form_radio('user_ans', '1')?></td><td class="q-table" ><?php echo $q->ans1; ?></td></tr>
				<tr><td class="q-table" align="right"><?php echo form_radio('user_ans', '2')?></td><td class="q-table" ><?php echo $q->ans2; ?></td></tr>
				<tr><td class="q-table" align="right"><?php echo form_radio('user_ans', '3')?></td><td class="q-table" ><?php echo $q->ans3; ?></td></tr>
				<tr><td class="q-table" align="right"><?php echo form_radio('user_ans', '4')?></td><td class="q-table" ><?php echo $q->ans4; ?></td></tr>
				<tr><td></td><td class="q-table" ><?php echo form_submit('submit', 'Submit & Next', 'class="ink-button green"'); ?></td></tr>
				
			<?php endforeach; echo form_close();  ?>
			</table>
		</div>
	</div>
</div>