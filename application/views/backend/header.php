<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>AES Gener</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-fonts.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/aesg/animate.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/aesg/style.css" />

		<!-- ace settings handler -->
		<script src="<?php echo base_url() ?>assets/js/vendor/vue.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ace-extra.js"></script>
		


	</head>


	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="<?php echo base_url('Bienvenida') ?>" class="navbar-brand">	
						<small style="font-size: 32px;">
						<i class="fa fa-bolt"></i>
						<!-- <img src="<?php echo base_url() ?>assets/images/logo.png" width="50%" heigth="40%"> -->
						AES Gener
						</small>		
					</a>

				</div>