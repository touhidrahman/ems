<div class="ink-grid">
		<div class="column-group">
			<div class="all-70 small-90 tiny-100 push-center  quarter-top-space">
			<h2 class="align-center">Controller Login</h2>
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
				<?php echo form_open('controllers/submit', 'class="ink-form"')?>
					<div class="control-group">
						<label>Batch</label>
						<div class="control">
							<?php echo form_input('batch', ''); ?>
						</div>
					</div>
					<div class="control-group">
						<label>Subject</label>
						<div class="control">
							<?php
                            //$this->load->module('progs');
                            //$q = $this->progs->_custom_query('SELECT * FROM progs');
                            $options = array();
                            foreach ($q->result() as $r) {
                                $options[$r->sub_code] = $r->sub_name ." (". $r->prog_code .")";
                            }
                            echo form_dropdown('sub_code', $options);
                            ?>
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
					<?php echo anchor('controllers/forgot_password', 'Forgot Password'); ?><br>
					<?php //echo anchor('users/register', 'Register a New Account'); ?><br>
				</div>
			</div>
		</div>
		</div>