<h2 class="extralarge top-space align-center">Your Results</h2>

<div class="ink-grid">
	<div class="column-group">
		<div class="all-80 small-100 tiny-100 push-center">
			<table class="ink-table bordered">
				<tr>
				<th align="left">Subject</th>
				<th align="left">Exam Name</th>
				<th align="left">Type</th>
				<th align="left">Total Marks</th>
				<th align="left">Obtained Marks</th>
				<th align="left">Action</th>
				</tr>
		      <?php foreach ($aval_tests->result() as $atest):?>
		      <tr>
					<td><?php echo $atest->sub_code; ?></td>
					<td><?php echo $atest->testname; ?></td>
					<td><?php echo $atest->type; ?></td>
					<td><?php echo $atest->total_marks; ?></td>
					<td><?php echo $atest->marks; ?></td>
					<td><?php 

                            echo anchor('questions/review/'.$atest->id .'/'. $atest->session_id, 'Review');
					?></td>
			  </tr>
			  <?php endforeach; ?>
			</table>
		</div>
	</div>
</div>