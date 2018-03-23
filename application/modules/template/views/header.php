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
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css');?>">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">


<title>BIM Results</title>


<meta name="description" content="Bangladesh Institute of Management Examination Management System">
<meta name="author" content="Touhidur Rahman">

<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico');?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/img/touch-icon.57.png');?>">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/img/touch-icon.72.png');?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/img/touch-icon.114.png');?>">
<link rel="apple-touch-startup-image" href="<?php echo base_url('assets/img/splash.320x460.png');?>" media="screen and (min-device-width: 200px) and (max-device-width: 320px) and (orientation:portrait)">
<link rel="apple-touch-startup-image" href="<?php echo base_url('assets/img/splash.768x1004.png');?>" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
<link rel="apple-tousplash.1024x748.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">

<!-- Load Documentation site CSS -->

<!--[if lt IE 9 ]>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/ink-ie.min.css');?>" type="text/css" media="screen" title="no title" charset="utf-8">
    <![endif]-->

<script type="text/javascript" src="<?php echo base_url('assets/js/ink-all.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/autoload.js');?>"></script>
</head>
<body class="ink-drawer">

<header class="header-area">

<div class="ink-grid">
    <div class="column-group">
        <div class="all-20">
        <a href="<?php echo site_url('home', 'Home'); ?>"> <img src="<?php echo base_url('assets/img/bim_logo.png');?>" class="push-right" alt="BIM Logo"></a>
        </div>
        <div class="all-70 left-space half-top-space">
        <h1 style="color: #fff;">Bangladesh Institute of Management</h1>
        <h2 style="color: #fff;">Online Academic Examination Management System</h2>
        </div>
    </div>
</div>
<div class="ink-grid">
    <div class="column-group">
        <div class="all-100">
            <nav class="ink-navigation xlarge-push-right large-push-right">
		<ul class="menu horizontal red">
			<li><a href="<?php echo site_url('home', 'Home'); ?>">Home</a></li>
			<li><a href="<?php echo site_url('users/login', 'Login'); ?>">Login</a></li>
			<li><a href="<?php echo site_url('users/logout', 'Logout'); ?>">Logout</a></li>
		</ul>
	</nav>
</header>