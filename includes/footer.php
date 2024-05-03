<!-- Start of Footer section
	============================================= -->
<?php
$pages = ["login", "sign up", "forgot password"];
$showHeader = true;
foreach ($pages as $page) {
	if ($page == strtolower($title)) {
		$showHeader = false;
	}
}
if ($showHeader) {
	?>
	<footer id="in-footer" class="in-footer-section" data-background="./assets/pexels-anna-nekrashevich-6801872.jpg"
		style="position:relative;">
		<div
			style="top:0%;left:0%;position:absolute;height:100%;width:100%;background:rgba(0,0,0,.7); backdrop-filter: blur(3px);">
		</div>
		<div class="container" style="position:relative;z-index:1;">
			<div class="in-footer-widget-wrapper">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="in-footer-widget">
							<div class="logo-widget">
								<div class="brand-logo">
									<a href="" style="padding:0px;margin:0px;">
										<h3 style="color:#555;">intelbond<span class='in-text-gradiant'>trade</span></h3>

									</a>
								</div>
								<div class="footer-text">
									Investing in Intelbondtrade offers more than just financial gains; it's a journey
									towards
									prosperity and security.
								</div>

							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="in-footer-widget">
							<div class="contact-widget headline">
								<h3 class="widget-title">Contact info</h3>
								<div class="contact-info">
									<div class="info-item d-flex align-items-center">
										<a style="display:flex;align-items:center;">
											<div class="inner-icon d-flex align-items-center justify-content-center">
												<i class="fal fa-map-marker-alt"></i>
											</div>
											<div class="inner-text">
												456 Elm Street, Springfield, IL 67890, USA
											</div>
										</a>
									</div>

									<div class="info-item d-flex align-items-center">
										<a href="mailto:support@blordgroup.com" style="display:flex;align-items:center;">
											<div class="inner-icon d-flex align-items-center justify-content-center">
												<i class="fal fa-envelope-open-text"></i>
											</div>
											<div class="inner-text">
												support@Intelbondtrade.com
											</div>
										</a>
									</div>

									<!-- <div class="info-item d-flex align-items-center">
									<div class="inner-icon d-flex align-items-center justify-content-center">
										<i class="fal fa-phone-plus"></i>
									</div>
									<div class="inner-text">
										Mon – Sat: 8 am – 5 pm,
										Sunday: CLOSED
									</div>
								</div> -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="in-footer-widget">
							<div class="menu-widget headline ul-li-block">
								<h3 class="widget-title">Our Company</h3>
								<ul>
									<li><a href="./about.php">About</a></li>
									<li><a href="./service.php">Investment Options</a></li>
									<li><a href="./pricing.php">Pricing Plans</a></li>


								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="in-footer-widget">
							<div class="menu-widget headline ul-li-block">
								<h3 class="widget-title">Quick Links</h3>
								<ul>
									<li><a href="./faq.php">FAQ</a></li>
									<li><a href="./termsandconditions.php">Terms and Conditions </a></li>
									<li><a href="./privacy.php">Privacy Statement </a></li>
									<li><a href="./login.php">Login </a></li>
									<li><a href="./signup.php">Sign up</a></li>


								</ul>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="in-footer-copyright-area d-flex justify-content-end">
				<div class="in-footer-copyright-text">
					<div class="inner-text d-flex justify-content-end">
						Copyright ©
						<?= date("Y"); ?> Intelbondtrade
					</div>
				</div>
			</div>
		</div>

	</footer>
	<div id="payment-alert" class="in-pagination text-center ul-li ">

	</div>
	<style>
		#payment-alert {
			position: fixed;
			width: fit-content;
			display: none;
			justify-content: center;
			align-items: center;
			padding: 20px;
			top: 80%;
			left: 5%;
			z-index: 10;
			border: 1px solid var(--main-color);
			color: black;
			background-color: white;
			height: 70px;
			font-size: 13px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .15);
		}

		@media (max-width:320px) {
			#payment-alert {
				right: 5%;
			}
		}
	</style>
	<script>
		const countries = [
			"London",
			"Albania",
			"Algeria",
			"Andorra",
			"Angola",
			"the US",
			"Argentina",
			"Armenia",
			"Australia",
			"Austria",
			"Azerbaijan",
			"the UK",
			"Germany"
		];
		let paymentAlert = document.querySelector("#payment-alert");
		let country = document.querySelector("#country");
		let money = document.querySelector("#money");
		let minutes = 7;

		setInterval(() => {
			paymentAlert.style.display = "flex";
			if (Math.floor(Math.random() * 10) <= 5) {
				paymentAlert.innerHTML = `Someone from ${countries[Math.floor(Math.random() * countries.length)]} deposited $${Math.floor(Math.random() * 8000).toLocaleString()}`;
			} else {
				paymentAlert.innerHTML = `Someone from ${countries[Math.floor(Math.random() * countries.length)]} withdrew $${Math.floor(Math.random() * 8000).toLocaleString()}`;

			}
			setTimeout(() => {
				paymentAlert.style.display = "none";
			}, 5000)
		}, 3600 * minutes);
	</script>
	<?php
}
?>
<!-- End of Footer section
	============================================= -->



<!-- For Js Library -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/appear.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/knob.js"></script>
<script src="assets/js/jquery.filterizr.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/rbtools.min.js"></script>
<script src="assets/js/rs6.min.js"></script>
<script src="assets/js/jarallax.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/tilt.jquery.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/jquery.marquee.min.js"></script>
<script src="assets/js/roundslider.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/script.js"></script>

<script type="text/javascript">
	function googleTranslateElementInit() {
		new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
	}
</script>

<script type="text/javascript"
	src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>