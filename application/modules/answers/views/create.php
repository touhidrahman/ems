<h2 class="extralarge top-space align-center"><?php echo empty($tests->id) ? 'Add a new test' : 'Edit test '. $tests->testname; ?></h2>

<div class="ink-grid">
	<div class="column-group">
		<div class="all-33 small-100 tiny-100 push-center">
	   <?php echo form_open('tests/submit/'.$update_id, array('class' => 'ink-form')); ?>
                <?php
                if (validation_errors()) {
                    echo "<div class='ink-alert basic' role='alert'>";
                    echo validation_errors();
                    echo "</div>";
                }
                ?>
                <div class="control-group">
				<label>Test Name</label>
				<div class="control">
					
                    <?php echo form_input('testname', $testname, 'placeholder="e.g.: Class Test 1"');?>
                    
                </div>
			</div>
			<div class="control-group">
				<label>Test Type</label>
				<div class="control">
					
                    <?php
                    $options = array(
                        'MCQ' => 'MCQ',
                        'Written' => 'Written',
                        'Viva' => 'Viva Voce',
                        'Practical' => 'Practical'
                    );
                    echo form_dropdown('type', $options);
                    ?>
                </div>
			</div>
			
			<div class="control-group">
				<label>Subject</label>
				<div class="control">
					
                    <?php
                    $sub_code[''] = 'Select';
                    foreach ($qq->result() as $rr) {
                        $sub_code[$rr->sub_code] = $rr->sub_name .' ('. $rr->prog_code .')';
                    }
                    echo form_dropdown('sub_code', $sub_code, $sub_code['']);
                    ?>
                </div>
			</div>

			<div class="column-group gutters">
				<div class="control-group all-33">
					<label>Total Questions</label>
					<div class="control">
                        <?php echo form_input('total_ques', $total_ques);?>
                    </div>
				</div>
				<div class="control-group all-33">
					<label>Total Marks</label>
					<div class="control">
                        <?php echo form_input('total_marks', $total_marks);?>
                    </div>
				</div>
				<div class="control-group all-33">
					<label>Batch</label>
					<div class="control">
                        <?php echo form_input('batch', $batch, 'placeholder="YYYY"');?>
                    </div>
				</div>
			</div>
			<?php echo form_submit('submit', 'Submit', 'class="ink-button red no-margin"'); ?>
            <?php echo form_close();?>
			</div>

	</div>
</div>