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
} else {
?>
<div class="ink-grid">
    <div class="column-group gutters">
        <div class="all-100 double-top-space">
            <?php echo nl2br($page_content);?>
        </div>
    </div>
</div>
<?php 
}
?>
