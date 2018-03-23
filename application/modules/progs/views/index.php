<h2 class="extralarge top-space align-center">Programs List</h2>

<div class="ink-grid">
	<div class="column-group">
		<div class="all-33 small-100 tiny-100 push-center">
		<table class="ink-table">
		  <th><td>Program Code</td><td>Program Name</td><td>Action</td></th>
		  <?php 
		  foreach ($all_progs->result() as $prog):
		  ?>
		  <tr>
		      <td><?php echo $prog->prog_code; ?></td>
		      <td><?php echo $prog->prog_name; ?></td>
		      <td><?php echo anchor('progs/delete/'.$prog->prog_code, 'Delete');?></td>
		  </tr>
		  <?php endforeach;?>
		  <?php echo form_open('progs/create_prog', array('class' => 'ink-form')); ?>
		  <tr>
		      <td><?php echo form_input('prog_code', '', 'placeholder="Add another"'); ?></td>
		      <td><?php echo form_input('prog_name', '', 'placeholder="Enter Name"'); ?></td>
		      <td><?php echo form_submit('submit', 'Save', 'class="ink-button red"');?></td>
		  </tr>
		  <?php echo form_close(); ?>
		</table>
		</div>
	</div>
</div>