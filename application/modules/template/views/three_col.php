<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- /Added by HTTrack -->
<head>
<script type="text/javascript"
	src="<?php echo base_url('assets/js/modernizr.js');?>"></script>
<script type="text/javascript">
	Modernizr.load({
		test : Modernizr.flexbox,
		nope : 'http://cdn.ink.sapo.pt/3.0.4/css/ink-legacy.min.css'
	});
</script>
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url('assets/css/ink-flex.min.css');?>">
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url('assets/css/custom.css');?>">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">


<title>পড়াইতে চাই । বাংলাদেশের বৃহত্তম শিক্ষক খোঁজার সাইট</title>


<meta name="description"
	content="Want to Teach | Largest teacher finding site of Bangladesh">
<meta name="author" content="Matrika Technologies">

<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link rel="shortcut icon"
	href="<?php echo base_url('assets/img/favicon.ico');?>">
<link rel="apple-touch-icon-precomposed"
	href="<?php echo base_url('assets/img/touch-icon.57.png');?>">
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="<?php echo base_url('assets/img/touch-icon.72.png');?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="<?php echo base_url('assets/img/touch-icon.114.png');?>">
<link rel="apple-touch-startup-image"
	href="<?php echo base_url('assets/img/splash.320x460.png');?>"
	media="screen and (min-device-width: 200px) and (max-device-width: 320px) and (orientation:portrait)">
<link rel="apple-touch-startup-image"
	href="<?php echo base_url('assets/img/splash.768x1004.png');?>"
	media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
<link rel="apple-tousplash.1024x748.png"
	media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">

<!-- Load Documentation site CSS -->

<!--[if lt IE 9 ]>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/ink-ie.min.css');?>" type="text/css" media="screen" title="no title" charset="utf-8">
    <![endif]-->

<script type="text/javascript"
	src="<?php echo base_url('assets/js/ink-all.min.js');?>"></script>
<script type="text/javascript"
	src="<?php echo base_url('assets/js/autoload.js');?>"></script>

</head>

<body>

	<div class="ink-grid">

		<!--[if lte IE 9 ]>
            <div class="ink-alert basic">
                <button class="ink-dismiss">&times;</button>
                <p><strong>You are using an outdated Internet Explorer version.</strong>
                    Please <a href="http://browsehappy.com/">upgrade to a modern browser</a> to improve your web experience.
                </p>
            </div>
            -->

		<!-- Add your site or application content here -->

		<header class="vertical-space">
			<h1>
				পড়াইতে চাই<small> বাংলাদেশের বৃহত্তম শিক্ষক খোঁজার সাইট</small>
			</h1>
			<nav class="ink-navigation">
				<ul class="menu horizontal blue">
					<li><a href="#">প্রথম পাতা</a></li>
					<li><a href="#">শিক্ষক খোঁজ</a></li>
					<li><a href="#">শিক্ষক একাউন্ট</a></li>
					<li><a href="#">অভিভাবক একাউন্ট</a></li>
				</ul>
			</nav>
		</header>



		<div class="column-group gutters">

			<!-- LEFT SIDEBAR -->
			<div class="all-20 small-100 tiny-100">
				<h3>একাউন্টে প্রবেশ</h3>
				<form class="ink-form">
					<div class="control-group">
						<label for="email">ইমেইল</label>
						<div class="control">
							<input name="email" type="text" placeholder="">
						</div>
					</div>
					<div class="control-group">
						<label for="password">পাসওয়ার্ড</label>
						<div class="control">
							<input name="password" type="password" placeholder="">
						</div>
					</div>
					<div>
						<input name="submit" type="submit"
							class="ink-button blue no-margin" value="প্রবেশ"> <br> <a href="">নতুন
							একাউন্ট তৈরী করুন</a><br> <a href="">পাসওয়ার্ড ভুলে গেছি</a>
					</div>
				</form>
			</div>
			<!-- END LEFT SIDEBAR -->




			<!-- MAIN CONTENTS -->
			<div class="all-60 small-100 tiny-100">
			<?php echo $this->load->view($module . '/' . $view_file); ?>
			</div>
			<!-- END CONTENTS -->






			<!-- RIGHT SIDEBAR -->
			<div class="all-20 small-100 tiny-100">
				<h3>শিক্ষক খোঁজ</h3>
				<form class="ink-form">
					<div class="control-group">
						<label>নাম অথবা অন্যকিছু</label>
						<div class="control">
							<input name="term" type="text" placeholder="">
						</div>
					</div>
					<div class="control-group">
						<label>জেলা</label>
						<div class="control">
							<select name="region">
								<option></option>
								<option>ঢাকা</option>
								<option>কিশোরগঞ্জ</option>
								<option>কুমিল্লা</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label>এলাকা</label>
						<div class="control">
							<select name="region">
								<option></option>
								<option>তেজগাঁও</option>
								<option>গুলশান</option>
								<option>মিরপুর</option>
							</select>
						</div>
					</div>
					<div>
						<input name="submit" type="submit"
							class="ink-button blue no-margin" value="খুঁজুন"> <br>
					</div>
				</form>
			</div>
		</div>
	</div>





	<footer class="clearfix">
		<div class="ink-grid">
			<ul class="unstyled inline half-vertical-space">
				<li><a href="#">আমাদের সম্পর্কে</a></li>
				<li><a href="#">নীতিমালা</a></li>
				<li><a href="#">যোগাযোগ</a></li>
			</ul>
			<p class="note">
				<a href="http://www.matrikatech.com">মাতৃকা টেকনোলজিস্‌</a> কর্তৃক
				ডেভেলপকৃত ও পরিচালিত
			</p>
		</div>
	</footer>
</body>

</html>
