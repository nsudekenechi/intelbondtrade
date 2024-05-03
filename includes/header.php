<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Intelbondtrade -
		<?= $title; ?>
	</title>
	<meta name="description"
		content="IntelBondTrade: Your gateway to informed investing. Discover expert insights, explore diverse investment opportunities, and optimize your portfolio for success. Start trading smarter with IntelBondTrade today!">
	<meta name="keywords"
		content="Investment strategies, Portfolio management, Stock trading, Bond investments, Financial analysis, Market trends, Wealth management, Risk assessment, Asset allocation, Investment opportunities">
	<meta name="author" content="Kenechi Nsude">
	<link rel="shortcut icon" href="includes/favicon.png" type="image/x-icon">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/video.min.css">
	<link rel="stylesheet" href="assets/css/slick-theme.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<link rel="stylesheet" href="assets/css/rs6.css">
	<link rel="stylesheet" href="assets/css/global.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
	<!-- Smartsupp Live Chat script -->
	<script type="text/javascript">
		var _smartsupp = _smartsupp || {};
		_smartsupp.key = '446613c523a222c885741f9c801382cb8c6a37d4';
		window.smartsupp || (function (d) {
			var s, c, o = smartsupp = function () { o._.push(arguments) }; o._ = [];
			s = d.getElementsByTagName('script')[0]; c = d.createElement('script');
			c.type = 'text/javascript'; c.charset = 'utf-8'; c.async = true;
			c.src = 'https://www.smartsuppchat.com/loader.js?'; s.parentNode.insertBefore(c, s);
		})(document);
	</script>
	<!-- <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript> -->
</head>

<body>
	<!-- <div id="preloader"></div> -->
	<div class="up">
		<a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
	</div>
	<?php
	require_once ("./db/db_connect.php");
	if (isset($_GET["ref"])) {
		session_start();
		$_SESSION["ref"] = $_GET["ref"];
	}
	$pages = ["login", "sign up", "forgot password"];
	$showHeader = true;
	foreach ($pages as $page) {
		if ($page == strtolower($title)) {
			$showHeader = false;
		}
	}
	if ($showHeader) {
		?>
		<!-- Start of header section
	============================================= -->
		<header id="in-header" class="in-header-section header-style-one">

			<div class="in-header-main-menu-wrapper">
				<div class="container">
					<div class="in-header-main-menu-content d-flex align-items-center justify-content-between">
						<div class="sticky-logo">
							<a href="./" style="display:block;position:relative;">
								<h1>intelbond<span class='in-text-gradiant'>trade</span></h1>
							</a>
						</div>
						<nav class="in-main-navigation-area clearfix ul-li">
							<ul id="main-nav" class="nav navbar-nav clearfix">
								<li class="dropdown in-megamenu">
									<a href="./index.php">Home</a>

								</li>
								<li><a target="" href="about.php">About Us</a></li>

								<li><a target="" href="pricing.php">Pricing</a></li>
								<li><a target="" href="service.php">Services</a></li>
								<li><a target="" href="faq.php">FAQ</a></li>

							</ul>
						</nav>
						<div class="in-header-search-cta-btn d-flex align-items-center">

							<div class="in-header-cta-btn">

								<a href="./login.php" style="background:#015fea;color:white">Login</a>

							</div>
						</div>
					</div>
					<div class="mobile_menu position-relative">
						<div class="mobile_menu_button open_mobile_menu">
							<i class="fal fa-bars" style="color:#0163ea;"></i>
						</div>
						<div class="mobile_menu_wrap">
							<div class="mobile_menu_overlay open_mobile_menu"></div>
							<div class="mobile_menu_content">
								<div class="mobile_menu_close open_mobile_menu">
									<i class="fal fa-times"></i>
								</div>
								<div class="m-brand-logo">
									<a href="./" style="display:block;position:relative;">
										<h1>intelbond<span class='in-text-gradiant'>trade</span></h1>
									</a>
								</div>

								<nav class="mobile-main-navigation  clearfix ul-li">
									<ul id="m-main-nav" class="nav navbar-nav clearfix">

										<li class="dropdown in-megamenu">
											<a href="./index.php">Home</a>

										</li>
										<li><a target="" href="about.php">About Us</a></li>

										<li><a target="" href="pricing.php">Pricing</a></li>
										<li><a target="" href="service.php">Services</a></li>
										<li><a target="" href="faq.php">FAQ</a></li>
									</ul>
								</nav>
							</div>
						</div>
						<!-- /Mobile-Menu -->
					</div>
					<div id="google_translate_element"></div>
				</div>
			</div>



		</header>
		<!-- search filed -->
		<div class="search-body">
			<div class="search-form">
				<form action="#" class="search-form-area">
					<input class="search-input" type="search" placeholder="Search Here">
					<button type="submit" class="search-btn1">
						<i class="fas fa-search"></i>
					</button>
				</form>
				<div class="outer-close text-center search-btn">
					<i class="fas fa-times"></i>
				</div>
			</div>
		</div>
		<!-- End of header section
	============================================= -->
		<?php
	}
	?>