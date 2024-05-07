<?php
$title = "Home";
include_once ("./includes/header.php");

?>
<style>
	body {
		/* scroll-behavior: smooth; */
	}

	.circle_img {
		width: 400px;
		height: 400px;
		overflow: hidden;
		border-radius: 50%;
		background: var(--base-color);
		position: relative;
		border: pink solid 10px;

	}

	.circle_img img {
		width: 100%;
		height: 100%;
		object-fit: cover;

	}

	#banner {
		height: 90vh;
		background: rgba(0, 188, 249, .05);
		display: flex;
		align-items: center;
	}

	@media (min-width:0px) and (max-width:766px) {
		#banner {
			height: 80vh;
		}
	}

	.animate {
		position: relative;
	}

	.animate::before {
		content: "";
		position: absolute;
		width: 100%;
		height: 100%;
		background: #fff;
		right: 0px;
		border-radius: 10px;
	}

	h1.animate::before {
		animation: animate 1s 0.9s forwards;
	}

	span.animate::before {
		animation: animate 1s 1.2s forwards;
	}

	@keyframes animate {
		to {
			width: 0%;
		}
	}
</style>
<!-- Start of Banner section
	============================================= -->
<section id="banner">
	<div class="container ">
		<div class="row py-5" style="column-gap:15%;">
			<div class="col-md-5  pt-5">
				<!-- <span class="in-text-gradiant animate">Simple and Reliable Investment Options</span> -->
				<h1 class="my-2 animate" style="font-size:2.5rem;">Investment Made <br> <span class="in-text-gradiant">
						Easy
					</span> Just For You.</h1>
				<p>Take control of your financial future with Intelbondtrade. Our innovative approach to wealth
					management
					empowers you to maximize returns while minimizing risk.
				</p>
				<div class="in-btn-1 wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1000ms"
					style="visibility: visible; animation-duration: 1000ms; animation-delay: 100ms; animation-name: fadeInUp;">
					<a href="./signup.php">Create an account </a>
				</div>
			</div>
			<div class="col-md-5 d-none d-md-block " data-wow-delay="100ms" data-wow-duration="1000ms"
				style="visibility: visible; animation-duration: 1000ms; animation-delay: 400ms; animation-name: fadeInLeft">
				<div class="circle_img ">
					<img src="https://images.pexels.com/photos/7691698/pexels-photo-7691698.jpeg">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End of Banner section
	============================================= -->

<!-- Start of About section
	============================================= -->
<section id="in-about-1" class="in-about-section-1 position-relative">
	<!-- <div class="in-about-bg position-absolute">
		<img src="assets/img/bg/ab-bg.jpg" alt="">
	</div> -->
	<div class="container">
		<div class="in-about-content-1">
			<div class="row">
				<div class="col-lg-7">
					<div class="in-about-feature-img-1 position-relative d-flex">
						<div class="in-about-feature-wrapper">
							<div class="in-about-feature-item wow fadeInUp" data-wow-delay="200ms"
								data-wow-duration="1000ms">
								<div class="inner-icon">
									<i class="flaticon-life-insurance"></i>
								</div>
								<div class="inner-text headline pera-content">
									<h3>Track Funds</h3>
									<p>Stay update on your investments conveniently
									</p>
								</div>
							</div>
							<div class="in-about-feature-item wow fadeInUp" data-wow-delay="300ms"
								data-wow-duration="1000ms">
								<div class="inner-icon">
									<i class="flaticon-life-insurance-1"></i>
								</div>
								<div class="inner-text headline pera-content">
									<h3>Receive Returns</h3>
									<p>Start receiving returns that pave the way to a prosperous future.
									</p>
								</div>
							</div>
							<div class="in-about-feature-item wow fadeInUp" data-wow-delay="400ms"
								data-wow-duration="1000ms">
								<div class="inner-icon">
									<i class="flaticon-business-and-finance"></i>
								</div>
								<div class="inner-text headline pera-content">
									<h3>Unlock Extra Value</h3>
									<p>Maximize Returns with Exclusive Bonus Opportunities
									</p>
								</div>
							</div>
						</div>

						<div class="in-about-img-1 wow fadeInLeft" data-wow-delay="550ms" data-wow-duration="1000ms"
							style="height:600px;width:517px">
							<img src="assets/pexels-karolina-grabowska-7680687.jpg" alt=""
								style="height:100%;width:100%;object-fit:cover;">
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="in-about-text-wrapper-1">
						<div class="in-section-title-1 headline wow fadeInUp" data-wow-delay="550ms"
							data-wow-duration="1000ms">
							<div class="sub-title position-relative text-uppercase">
								About Us
							</div>
							<h2>Why you should invest with us </h2>
						</div>
						<div class="in-about-text-area-1 wow fadeInUp" data-wow-delay="650ms"
							data-wow-duration="1000ms">
							We are america biggest crypto company, we specialise majorly in crypto exchange and real
							estate. We are here to provide you with innovative financial solutions through experienced
							expert guidance, diverse options, robust performance, personalized approach, and
							transparency. Choose Intelbondtrade for your investment journey.
						</div>
						<div class="in-about-counter-wrapper-1 wow fadeInUp" data-wow-delay="750ms"
							data-wow-duration="1000ms">
							<div class="row">
								<div class="col-md-6">
									<div class="in-about-counter-item-1 headline pera-content">
										<h3><span class="counter">12</span>K+</h3>
										<p>Total Investors</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="in-about-counter-item-1 headline pera-content">
										<h3>$<span class="counter">100</span>k+</h3>
										<p>Total Deposits</p>
									</div>
								</div>
							</div>
						</div>
						<div class="in-btn-1 wow fadeInUp" data-wow-delay="850ms" data-wow-duration="1000ms">
							<a href="./about.php" style="color:white;cursor:pointer;" id="gotoplans">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End of About section
	============================================= -->
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
	<div class="tradingview-widget-container__widget"></div>

	<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
		async>
			{
				"symbols": [
					{
						"proName": "FOREXCOM:SPXUSD",
						"title": "S&P 500"
					},
					{
						"proName": "FOREXCOM:NSXUSD",
						"title": "US 100"
					},
					{
						"proName": "FX_IDC:EURUSD",
						"title": "EUR to USD"
					},
					{
						"proName": "BITSTAMP:BTCUSD",
						"title": "Bitcoin"
					},
					{
						"proName": "BITSTAMP:ETHUSD",
						"title": "Ethereum"
					}
				],
					"showSymbolLogo": true,
						"isTransparent": false,
							"displayMode": "adaptive",
								"colorTheme": "dark",
									"locale": "en"
			}
		</script>
</div>
<!-- TradingView Widget END -->
<!-- Start of CTA section
	============================================= -->
<section id="in-cta" class="in-cta-section">
	<div class="jarallax  position-relative" data-background="assets/khalid-boutchich-vM01WKm5v-E-unsplash.jpg">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="in-cta-content text-center headline wow fadeInUp" data-wow-delay="100ms"
				data-wow-duration="1000ms">
				<p>Start Today!</p>
				<h2>Interested in maximizing your financial potential? </h2>
				<div class="in-cta-btn-grp d-flex">
					<a class="d-flex align-items-center justify-content-center" href="./signup.php">Get started</a>
					<a class="d-flex align-items-center justify-content-center" href="./login.php">Start Investing</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End of CTA section
	============================================= -->


<!-- Start of Why Choose section
	============================================= -->
<section id="in-why-choose-1" class="in-why-choose-section-1">
	<div class="container">
		<div class="in-why-choose-top-content d-flex justify-content-between align-items-center">
			<div class="in-section-title-1 headline wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1000ms">

				<h2> Let’s help you kickstart your investment journey. </h2>
			</div>
			<div class="in-why-choose-top-text wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms">

				Take the initial stride towards achieving financial success by beginning your journey with us. Follow
				these simple steps to kickstart your path: Sign up effortlessly, explore investment options, consult
				with experts, and take confident strides towards your financial goals with our support and guidance.
			</div>
		</div>
		<div class="in-why-choose-content-1">
			<div class="row">
				<div class="col-lg-6">
					<div class="in-why-choose-img-area-1 position-relative  wow fadeInUp" data-wow-delay="350ms"
						data-wow-duration="1000ms">
						<div class="in-why-choose-img-1 position-relative" style="height:600px;">
							<img src="assets/pexels-mizunokozuki-12903182.jpg" alt=""
								style="width:100%;height:100%;object-fit:cover;">
						</div>

						<div class="in-why-choose-circle-progress position-absolute wow fadeInRight"
							data-wow-delay="750ms" data-wow-duration="1000ms">
							<div class="counter-boxed text-center headline position-relative">
								<div class="graph-outer">
									<input type="text" class="dial" data-fgColor="#3294f0" data-bgColor="#cde6e6"
										data-width="106" data-height="106" data-linecap="round" value="85">
									<div class="inner-text count-box"><span class="count-text" data-stop="85"
											data-speed="4500"></span>%</div>
								</div>
								<h5>Profit Increase</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="in-why-choose-feature-wrapper">
						<div class="in-why-choose-feature-area">
							<div class="in-why-choose-feature-item d-flex wow fadeInUp" data-wow-delay="550ms"
								data-wow-duration="1000ms">
								<div class="inner-icon position-relative">
									<i class="flaticon-privacy-policy"></i>
								</div>
								<div class="inner-text headline pera-content">
									<h3>Choose an option</h3>
									<p>Pick from our investment options array for your selection.
									</p>
								</div>
							</div>
							<div class="in-why-choose-feature-item d-flex wow fadeInUp" data-wow-delay="650ms"
								data-wow-duration="1000ms">
								<div class="inner-icon position-relative">
									<i class="flaticon-family-insurance"></i>
								</div>
								<div class="inner-text headline pera-content">
									<h3>Open an account</h3>
									<p>
										Start your investment journey by opening an account with us.
									</p>
								</div>
							</div>
							<div class="in-why-choose-feature-item d-flex wow fadeInUp" data-wow-delay="750ms"
								data-wow-duration="1000ms">
								<div class="inner-icon position-relative">
									<i class="flaticon-insurance-1"></i>
								</div>
								<div class="inner-text headline pera-content">
									<h3>Deposit Funds</h3>
									<p>
										Add funds to your account to start investing confidently.
									</p>
								</div>
							</div>

							<div class="in-why-choose-feature-item d-flex wow fadeInUp" data-wow-delay="750ms"
								data-wow-duration="1000ms">
								<div class="inner-icon position-relative">
									<i class="flaticon-income"></i>
								</div>
								<div class="inner-text headline pera-content">
									<h3>Gain returns</h3>
									<p>
										Earn profits from your investment portfolio with lucrative returns. </p>
								</div>
							</div>
						</div>
						<div class="in-btn-1">
							<a href="contact.html">Get Started</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End of Why Choose section
	============================================= -->

<!-- Start of Get a quote section
	============================================= -->
<section id="in-benefit" class="in-benefit-section position-relative" style="padding-top:0px;">
	<div class="container">
		<div class="container">
			<div class="in-why-choose-top-content d-flex  justify-content-between align-items-center">
				<div class="in-section-title-1 headline wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1000ms">

					<h2>Accessible Investment Options</h2>
				</div>
				<div class="in-why-choose-top-text wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms">
					Discover the diverse array of investment plans offered by Intelbondtrade. From comprehensive
					portfolios
					to
					tailored strategies, we provide accessible options to suit every investor's needs and objectives.
					Explore our range today and start building your financial future with confidence.
				</div>
			</div>
		</div>
		<div class="in-benefit-content" style="padding-top:100px;">
			<div class="row" style="margin-bottom:100px;">
				<div class="col-lg-5">
					<div class="in-benefit-text">
						<div class="in-section-title-2 headline wow fadeInUp" data-wow-delay="200ms"
							data-wow-duration="1000ms"
							style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInUp;">
							<div class="sub-title text-uppercase" style="margin-bottom:30px;">
								Investment Options
							</div>
							<h3><b>Real Estate</b></h3>
						</div>
						<div class="in-about-text-area-1 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms"
							style="visibility: visible; animation-duration: 1000ms; animation-delay: 400ms; animation-name: fadeInUp;">
							Explore diverse real estate investment opportunities with Intelbondtrade. From residential
							properties to commercial ventures, our curated selection offers lucrative options for
							investors seeking stable returns. Discover lucrative deals and start building your real
							estate portfolio today with Intelbondtrade.
						</div>
						<!-- <div class="in-btn-2 position-relative wow fadeInUp" data-wow-delay="600ms"
							data-wow-duration="1000ms"
							style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInUp;">
							<a href="#">Get Started Now</a>
						</div> -->
					</div>
				</div>
				<div class="col-lg-7 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1000ms"
					style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInLeft;">
					<div class="in-benefit-img d-flex justify-content-end" style="height: 400px;">
						<img src="assets/pexels-nextvoyage-1481105.jpg" alt=""
							style="width:100%;height:100%;object-fit:cover;">
					</div>
				</div>
			</div>

			<div class="row" style="margin-bottom:100px;">
				<div class="col-lg-5">
					<div class="in-benefit-text">
						<div class="in-section-title-2 headline wow fadeInUp" data-wow-delay="200ms"
							data-wow-duration="1000ms"
							style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInUp;">
							<div class="sub-title text-uppercase" style="margin-bottom:30px;">
								Investment Options
							</div>
							<h3><b>Crypto</b></h3>
						</div>
						<div class="in-about-text-area-1 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms"
							style="visibility: visible; animation-duration: 1000ms; animation-delay: 400ms; animation-name: fadeInUp;">
							Explore diverse real estate investment opportunities with Intelbondtrade. From residential
							properties to commercial ventures, our curated selection offers lucrative options for
							investors seeking stable returns. Discover lucrative deals and start building your real
							estate portfolio today with Intelbondtrade.
						</div>
						<!-- <div class="in-btn-2 position-relative wow fadeInUp" data-wow-delay="600ms"
							data-wow-duration="1000ms"
							style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInUp;">
							<a href="#">Get Started Now</a>
						</div> -->
					</div>
				</div>
				<div class="col-lg-7 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1000ms"
					style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInLeft;">
					<div class="in-benefit-img d-flex justify-content-end" style="height: 400px;">
						<img src="assets/pexels-alesia-kozik-6778656.jpg" alt=""
							style="width:100%;height:100%;object-fit:cover;">
					</div>
				</div>
			</div>
			<div class="in-pagination text-center ul-li">
				<ul>

					<li><a href="./service.php" style="width:100%;display:flex; column-gap:10px;padding:10px;"><span>See
								More</span><i class="far fa-long-arrow-right"></i></a></li>
				</ul>
			</div>
</section>
</div>
</div>
</section>

<!-- End of Get a quote section
	============================================= -->

<!-- Start of Testimonial section
	============================================= -->
<section id="in-testimonial" class="in-testimonial-section" style="position:relative;"
	data-background="https://images.pexels.com/photos/3184419/pexels-photo-3184419.jpeg">
	<div class="background_overlay" style="position:absolute;background:rgba(0,0,0,.6);width:100%;height:100%;"></div>

	<div class="container" style="position:relative;z-index:1;">
		<div class="in-testimonial-content">
			<div class="row">
				<div class="col-lg-6">
					<div class="in-testimonial-text-area">
						<div class="in-section-title-1 headline wow fadeInUp" data-wow-delay="250ms"
							data-wow-duration="1000ms">
							<!-- <div class="sub-title position-relative text-uppercase">
								Testimonial
							</div> -->
							<h2>What Client Says
								About Intelbondtrade </h2>
						</div>
						<div class="in-testimonial-desc-text wow fadeInUp" data-wow-delay="350ms"
							data-wow-duration="1000ms">
							Intelbondtrade has consistently exceeded my expectations with their insightful advice and
							impeccable service. Their team is professional, knowledgeable, and trustworthy, making them
							my go-to choice for investment solutions.
						</div>
						<!-- <div class="in-btn-1 wow fadeInUp" data-wow-delay="450ms" data-wow-duration="1000ms">
							<a href="testimonial.html">See All Testimonials</a>
						</div> -->
					</div>
				</div>
				<div class="col-lg-6">
					<div class="in-testimonial-slider-area wow fadeInRight" data-wow-delay="450ms"
						data-wow-duration="1000ms">
						<div class="in-testimonial-slider">
							<div class="in-testimonial-item">
								<div class="inner-icon">
									<i class="fas fa-quote-left"></i>
								</div>
								<div class="inner-text">
									Intelbondtrade's personalized approach to investment management helped me achieve my
									financial goals efficiently. Their team's expertise and dedication are truly
									commendable
								</div>
								<div class="inner-author d-flex align-items-center">

									<div class="author-text headline">
										<h3>Bred Huggins</h3>
									</div>
								</div>
							</div>
							<div class="in-testimonial-item">
								<div class="inner-icon">
									<i class="fas fa-quote-left"></i>
								</div>
								<div class="inner-text">
									Intelbondtrade's proactive investment strategies have yielded impressive returns for
									me. Their transparent communication and tailored solutions make them stand out in
									the industry.
								</div>
								<div class="inner-author d-flex align-items-center">

									<div class="author-text headline">
										<h3>Emily Chen</h3>
									</div>
								</div>
							</div>

							<div class="in-testimonial-item">
								<div class="inner-icon">
									<i class="fas fa-quote-left"></i>
								</div>
								<div class="inner-text">
									Their commitment to client satisfaction sets them apart
								</div>
								<div class="inner-author d-flex align-items-center">

									<div class="author-text headline">
										<h3>Frank Leo</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End of Testimonial section
	============================================= -->

<!-- Start of Blog section
	============================================= -->
<section id="in-blog" class="in-blog-section">
	<div class="container" id="plans">
		<div class="in-why-choose-top-content d-flex justify-content-between align-items-center">
			<div class="in-section-title-1 headline wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1000ms">

				<h2>Our Pricing <br> Plan</h2>
			</div>
			<div class="in-why-choose-top-text wow fadeInUp" data-wow-delay="150ms" data-wow-duration="1000ms">
				On the other hand we denounce with righteous indignation and dislike men who are so beguiled and
				demoralized bite the finan charms of pleasure of blinded.
			</div>
		</div>
		<section id="in-price" class="in-price-section">
			<div class="container">
				<div class="in-price-content">
					<div class="row justify-content-center">
						<?php
						$query = "SELECT * FROM plans";
						$res = mysqli_query($conn, $query);
						while ($row = $res->fetch_assoc()) {
							if ($row['id'] < 4) {
								?>
								<div class="col-lg-4 col-md-6">
									<div class="in-price-inner-items text-center">
										<div class="pricing-title-price-area headline">
											<h2><?= $row['name']; ?> Plan</h2>
											<h3><?= $row['increase']; ?> %</h3>
											<span><?= $row['days']; ?> Days</span>
										</div>
										<div class="pricing-list-btn position-relative">
											<div class="pricing-list ul-li-block">
												<ul>
													<li>Minimum Deposit - $<?= $row['min_deposit']; ?></li>
													<li>Maximum Deposit - $<?= $row['max_deposit']; ?></li>
													<li>Daily Earnings Excluded</li>
													<li>Instant Withdraw</li>
													<li>Referral Commision - 10%</li>
												</ul>
											</div>
											<div class="price-btn">
												<div class="in-btn-1">
													<a href="#">Invest Now</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
							?>

							<?php
						}
						?>

					</div>
				</div>
				<div class="in-pagination text-center ul-li">
					<ul>

						<li><a href="./pricing.php"
								style="width:100%;display:flex; column-gap:10px;padding:10px;"><span>See
									More</span><i class="far fa-long-arrow-right"></i></a></li>
					</ul>
				</div>
			</div>
		</section>
	</div>
</section>
<!-- End of Blog section
	============================================= -->
<!-- TradingView Widget BEGIN -->
<div class="container" style="height:500px;">
	<div class="tradingview-widget-container">
		<div class="tradingview-widget-container__widget"></div>
		<script type="text/javascript"
			src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
				{
					"width": "100%",
						"height": "100%",
							"currencies": [
								"EUR",
								"USD",
								"JPY",
								"GBP",
								"CHF",
								"AUD",
								"CAD",
								"NZD"
							],
								"isTransparent": false,
									"colorTheme": "dark",
										"locale": "en"
				}
			</script>
	</div>

</div>
<!-- TradingView Widget END -->
<!-- Start of Sponsor section
	============================================= -->
<section id="in-sponsor" class="in-sponsor-section">
	<div class="container">
		<div class="in-sponsor-slider">
			<div class="in-sponsor-item">
				<div class="inner-img" style="">
					<img src="assets/bitcoin-btc-logo.png" height="50" width="50" alt="">
				</div>
			</div>
			<div class="in-sponsor-item">
				<div class="inner-img" style="">
					<img src="assets/ethereum-eth-logo.png" height="50" width="50" alt="">
				</div>
			</div>
			<div class="in-sponsor-item">
				<div class="inner-img" style="">
					<img src="assets/solana-sol-logo.png" height="50" width="50" alt="">
				</div>
			</div>
			<div class="in-sponsor-item">
				<div class="inner-img" style="">
					<img src="assets/tether-usdt-logo.png" height="50" width="50" alt="">
				</div>
			</div>
			<div class="in-sponsor-item">
				<div class="inner-img" style="">
					<img src="assets/xrp-xrp-logo.png" height="50" width="50" alt="">
				</div>
			</div>
			<div class="in-sponsor-item">
				<div class="inner-img" style="">
					<img src="assets/dogecoin-doge-logo.png" height="50" width="50" alt="">
				</div>
			</div>
			<div class="in-sponsor-item">
				<div class="inner-img" style="">
					<img src="assets/cardano-ada-logo.png" height="50" width="50" alt="">
				</div>
			</div>
			<div class="in-sponsor-item">
				<div class="inner-img" style="">
					<img src="assets/bnb-bnb-logo.png" height="50" width="50" alt="">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End of Sponsor section
	============================================= -->
<?php
require_once ("./includes/footer.php");
?>
<script>
	let gotoPlans = document.querySelector("#gotoplans")
	let plans = document.querySelector("#plans")
	gotoPlans.onclick = () => {
		plans.scrollIntoView({ behavior: "smooth" })
	}
</script>