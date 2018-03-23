<!-- HEAD -->
<?php include_once '_head.php'; ?>

<body class="ink-drawer">
<?php include_once '_navbar.php'; ?>


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

</body>
</html>