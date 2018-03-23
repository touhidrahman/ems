<?php if (isset($this->session->flashdata('notify'))) : ?>
<div class="ink-alert basic" role="alert">
	<?php echo $this->session->flashdata('notify'); ?>
</div>
<?php endif; ?>