<?php 
$this->load->view('template/notification');
?>

<div style="width: 800px; margin: 0 auto; margin-top: 6em; border:1px dotted #999; border-radius:5px; padding: 5px 15px 15px 15px;">
	<div>
		<h3 class="text-center">Register for an Account</h3>
	</div>
<form class="form-horizontal">
<fieldset>

<div class="ink-grid">
		<div class="column-group">
			<div class="all-33 small-100 tiny-100 push-center">
				<?php echo form_open('result/show', array('class' => "ink-form")); ?>
					<div class="control-group">
						<label>Type of User</label>
						<div class="control">
							
							<?php 
							$data = array(
							    'name' => 'year', 
							    'placeholder' => 'Batch/year eg. 2014'
							);
							echo form_input($data); 
							?>
						</div>
					</div>
					<div class="control-group">
						<label>Term/Semester</label>
						<div class="control">
							<?php 
							$data = array(
							    'name' => 'term', 
							    'placeholder' => 'Term eg. 1'
							);
							echo form_input($data); 
							?>
						</div>
					</div>
					<div class="control-group">
						<label>Program</label>
						<div class="control">
							<select name="prog">
								<option value=""> </option>
								<option value="pgdhrm">PGDHRM</option>
								<option value="pgdcs">PGDCS</option>
								<option value="pgdim">PGDIM</option>
								<option value="pgdscm">PGDSCM</option>
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label>Roll</label>
						<div class="control">
							<?php 
							$data = array(
							    'name' => 'roll', 
							    'placeholder' => 'Only numeric part eg. 015'
							);
							echo form_input($data); 
							?>
						</div>
					</div>
					<input type="submit" value="Show Result" name="submit" class="ink-button red no-margin">
				<?php echo form_close();?>
			</div>
		</div>

</fieldset>
</form>
	
		<hr>

		<input type="submit" class="btn btn-primary" name="submit" value="Register">&nbsp;&nbsp;&nbsp;
		<a href="<?php echo site_url('home'); ?>">Cancel</a>
	</form>
</div>

