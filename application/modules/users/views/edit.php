<h2 class="extralarge top-space"><?php echo empty($user->id) ? 'Add a new user' : 'Edit user '. $user->name; ?></h2>

<div class="ink-grid">
	<div class="column-group gutters">
	   <?php echo form_open('admin/user/edit', array('class' => 'ink-form all-30 small-100 tiny-100')); ?>
			<fieldset>
                <?php 
                if (validation_errors()) {
                echo "<div class='ink-alert basic' role='alert'>";
                echo validation_errors(); 
                echo "</div>";
                }
                ?>
				<div class="control-group">
					<label for="name">Name</label>
					<div class="control">
					   <?php echo form_input('name', set_value('name', $user->name)); ?>
					</div>
				</div>
				
				<div class="control-group">
					<label for="email">Email</label>
					<div class="control">
						<?php echo form_input('email', set_value('email', $user->email)); ?>
					</div>
				</div>

				<div class="control-group">
					<label for="password">Password</label>
					<div class="control">
						<input type="password" id="password" name="password">
					</div>
				</div>
                
				<div class="control-group">
					<label for="password_confirm">Confirm Password</label>
					<div class="control">
						<input type="password" id="password_confirm" name="password_confirm">
					</div>
				</div>
                
				<input class="ink-button green no-margin" type="submit" name="submit" value="Save">
			</fieldset>
		<?php echo form_close(); ?>
	</div>
</div>