<!DOCTYPE html>
<html lang="en">

<head>
<script type="text/javascript" src="<?php echo base_url('assets/js/modernizr.js');?>"></script>
<script type="text/javascript">
	Modernizr.load({
		test : Modernizr.flexbox,
		nope : 'http://cdn.ink.sapo.pt/3.0.4/css/ink-legacy.min.css'
	});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ink-flex.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css');?>">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">


<title>BIM Online Test</title>


<meta name="description" content="Bangladesh Institute of Management Examination Management System">
<meta name="author" content="Touhidur Rahman">

<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!--[if lt IE 9 ]>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/ink-ie.min.css');?>" type="text/css" media="screen" title="no title" charset="utf-8">
    <![endif]-->
    
<body>
<h1 class="align-center red">Ongoing Test</h1>


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

</body>
</html>