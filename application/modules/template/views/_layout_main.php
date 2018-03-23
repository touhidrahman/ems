<?php $this->load->view('admin/templates/header'); ?>
<?php $this->load->view('admin/templates/navbar'); ?>

<section class="admin">
	<div class="ink-grid">
		<div class="column-group horizontal-gutters">
			<div class="all-20 large-20">
				<nav class="ink-navigation">
					<ul class="menu vertical green">
						<li><?php echo anchor('username', 'My Account'); ?></li>
						<li><?php echo anchor('admin/user', 'Users'); ?></li>
						<li><?php echo anchor('admin/user/logout', 'Logout'); ?></li>
					</ul>
				</nav>
			</div>
			<div class="all-80 large-80">
				<?php $this->load->view($subview); ?>
			</div>
		</div>
	</div>
</section>

<?php $this->load->view('admin/templates/footer');?>