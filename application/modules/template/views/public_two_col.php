<!-- ARTICLE COLUMN -->
<section class="column-group gutters article">
	<div class="xlarge-70 large-70 medium-60 small-100 tiny-100">
		<?php
if (! isset($module)) {
    $module = $this->uri->segment(1);
}
if (! isset($view_file)) {
    $view_file = "";
}

if (($view_file != "") && ($module != "")) {
    $path = $module . '/' . $view_file;
    echo $this->load->view($path);
}
?>
	</div>
	
	
	<!-- SIDEBAR COLUMN -->
	<div class="xlarge-30 large-30 medium-40 small-100 tiny-100">
		
	</div>
</section>
