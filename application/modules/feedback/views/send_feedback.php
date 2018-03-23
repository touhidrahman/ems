<div class="ink-grid double-top-space">
	<div class="column-group gutters">
		<div class="all-30">
			<h4>Your feedback will help us a lot...</h4>
			<p>Write to us whatever you think of our site and/or services. Feel
				free to write anything. Be harsh or be cool, doesn't matter. Just
				say it.</p>
		</div>
		<div class="all-70">
        <?php echo validation_errors('<p style="color:red">', '</p>');?>
            <?php echo form_open('feedback/submit/', 'class="ink-form"');?>
            <div class="control-group gutters">

				<div class="control">
					<label>Your Name (optional)</label>
                    <?php echo form_input('name', $name);?>
                </div>
				<div class="control">
					<label>Your Email</label>
                    <?php echo form_input('email', $email);?>
                </div>
				<div class="control">
					<label>Subject (Optional)</label>
                    <?php echo form_input('subject', $subject);?>
                </div>
				<div class="control">
					<label>Description</label>
                    <?php echo form_textarea('description', $description);?>
                </div>
                    <?php echo form_hidden('sent_at', date('Y-m-d H:i:s', time()));?>
			</div>
            <?php echo form_submit('submit', 'Submit', 'class="ink-button blue no-margin"'); ?>
            <?php echo form_close();?>
        </div>
	</div>
</div>
</div>