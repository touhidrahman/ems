<?php $this->load->view('components/marksheet_header');?>
<pre class="hide-all">
<?php echo print_r($r);?>
</pre>
	<header class="clearfix">
        <button href="/index.php"><span class="fa fa-print"></span></button>
        
		<h1 class="align-center no-margin">Bangladesh Institute of Management</h1>
		<p class="align-center no-margin">
			4, Sobhanbag, Dhaka<br>www.bim.org.bd
		</p>
		<hr>
	</header>

	<div class="ink-grid">
		<div class="column-group">
			<div class="all-100">
				<p class="no-margin extralarge uppercase align-center" style="color:#666;">MARKSHEET</p>
				<h4 class="align-center no-margin">
				<?php 
				    $prog_list = array(
				        'pgdcs' => 'Post Graduate Diploma in Computer Science',
				        'pgdhrm' => 'Post Graduate Diploma in Human Resource Management',
				        'pgdim' => 'Post Graduate Diploma in Industrial Management',
				        'pgdfm' => 'Post Graduate Diploma in Financial Management',
				    );

                echo $prog_list[$r->prog];
                echo $r->prog;
				?>
				</h4>
			</div>
		</div>
	</div>
	
	<div class="ink-grid">
		<div class="column-group">
			<div class="all-50 push-center top-space">
				<table class="ink-table bordered">
					<tr>
						<td>Name of Student</td>
						<td><?php echo $r->name?></td>
					</tr>
					<tr>
						<td>Roll No</td>
						<td><?php echo $r->yr ."-". $r ->prog . "-" . $r->roll; ?></td>
					</tr>
					<tr>
						<td>Year</td>
						<td><?php echo $r->yr; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="ink-grid">
		<div class="column-group">
			<div class="all-80 push-center">
				<table class="ink-table bordered">
					<tr>
						<td colspan="3"><p class="uppercase align-center"><strong>Term: <?php echo $r->term; ?></strong></p></td>
						<td colspan="3"><p class="uppercase align-center"><strong>Term: <?php echo $r->term; ?></strong></p></td>
					</tr>
					<tr>
						<td><em>Subject</em></td>
						<td><em>GPA</em></td>
						<td><em>Grade</em></td>
						
						<td><em>Subject</em></td>
						<td><em>GPA</em></td>
						<td><em>Grade</em></td>
					</tr>
					
					
					<tr>
						<td>Subject Name</td>
						<td>3.90</td>
						<td>A-</td>
						
						<td>Subject Name</td>
						<td>3.90</td>
						<td>A-</td>
					</tr>
					<tr>
						<td>Subject Name</td>
						<td>3.90</td>
						<td>A-</td>
						
						<td>Subject Name</td>
						<td>3.90</td>
						<td>A-</td>
					</tr>
					<tr>
						<td>Subject Name</td>
						<td>3.90</td>
						<td>A-</td>
						
						<td>Subject Name</td>
						<td>3.90</td>
						<td>A-</td>
					</tr>
					<tr>
						<td>Subject Name</td>
						<td>3.90</td>
						<td>A-</td>
						
						<td>Subject Name</td>
						<td>3.90</td>
						<td>A-</td>
					</tr>
					<tr>
						<td>Subject Name</td>
						<td>3.90</td>
						<td>A-</td>
						
						<td>Subject Name</td>
						<td>3.90</td>
						<td>A-</td>
					</tr>
					<tr>
						<td><strong>1st Term GPA</strong></td>
						<td><strong>3.90</strong></td>
						<td><strong>A-</strong></td>
						
						<td><strong>2nd Term GPA</strong></td>
						<td><strong>3.90</strong></td>
						<td><strong>A-</strong></td>
					</tr>
					<tr>
						<td colspan="6"><h4 class="align-center no-margin">CGPA : 3.90 (A)</h4></td>
					</tr>
				
					
				</table>
			</div>
		</div>
	</div>

	
<?php $this->load->view('components/marksheet_footer');?>