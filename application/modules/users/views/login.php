<div class="ink-grid">
		<div class="column-group">
			<div class="all-70 small-90 tiny-100 push-center  quarter-top-space">
			<h2 class="align-center">Student Login</h2>
				<?php if (validation_errors()) :?>
				<div class="ink-alert basic align-center" role="alert">
					<?php echo validation_errors();?>
				</div>
			<?php endif;?>
			</div>
		</div>
	</div>

	<div class="ink-grid">
		<div class="column-group">
			<div class="all-33 small-100 tiny-100 push-center">
				<?php echo form_open('users/submit', 'class="ink-form"')?>
					<div class="control-group">
						<label>Batch</label>
						<div class="control">
							<?php echo form_input('batch', ''); ?>
						</div>
					</div>
					<div class="control-group">
						<label>Program</label>
						<div class="control">
							<?php
                            //$this->load->module('progs');
                            //$q = $this->progs->_custom_query('SELECT * FROM progs');
                            $options = array();
                            foreach ($q->result() as $r) {
                                $options[$r->prog_code] = $r->prog_name;
                            }
                            echo form_dropdown('prog_code', $options);
                            ?>
						</div>
					</div>
					<div class="control-group">
						<label>Numeric Roll</label>
						<div class="control">
							<?php echo form_input('roll', ''); ?>
						</div>
					</div>
					
					<div class="control-group">
						<label for="password">Password</label>
						<div class="control">
							<?php echo form_password('password', ''); ?>
						</div>
					</div>
					<?php echo form_submit('submit', 'Login', 'class="ink-button red no-margin"');?>
				<?php echo form_close();?>
				<div class="vertical-padding">
					<?php echo anchor('users/forgot_password', 'Forgot Password'); ?><br>
					<?php //echo anchor('users/register', 'Register a New Account'); ?><br>
				</div>
			</div>
		</div>
		</div>