<?php
$title = "Services";
require_once ("./includes/header.php");
$services = [
	[
		"title" => "Real Estate",
		"subtitle" => "Explore diverse real estate investment opportunities with Intelbondtrade. From residential properties to commercial ventures, our curated selection offers lucrative options for investors seeking stable returns. Discover lucrative deals and start building your real estate portfolio today with Intelbondtrade.",
		"img" => "assets/pexels-nextvoyage-1481105.jpg"
	],
	[
		"title" => "Crypto",
		"subtitle" => "Dive into the world of cryptocurrencies with our innovative Crypto-as-a-Service offerings at XYZ Investments. We provide a comprehensive suite of services tailored to meet the needs of both novice and experienced investors alike. Our platform offers seamless access to a wide range of digital assets, including Bitcoin, Ethereum, and more, allowing you to diversify your portfolio effortlessly. With advanced security measures and expert guidance, you can trade and manage your crypto investments with confidence.",
		"img" => "https://images.pexels.com/photos/6778650/pexels-photo-6778650.jpeg"
	],
	[
		"title" => "Agriculture",
		"subtitle" => "
		Discover the transformative potential of Agriculture-as-a-Service (AaaS) with XYZ Investments. Our comprehensive suite of agricultural investment solutions empowers both seasoned agribusiness professionals and newcomers to the field. Through cutting-edge technology and sustainable farming practices, we offer opportunities to invest in diverse agricultural projects worldwide. From precision farming to vertical gardening, our portfolio spans a range of sectors, including crop cultivation, livestock management, and agroforestry.",
		"img" => "https://images.pexels.com/photos/2600290/pexels-photo-2600290.jpeg"
	],
	[
		"title" => "Oil and Gas",
		"subtitle" => "
		Take advantage of the ever-evolving energy sector with our Oil and Gas Ventures investment option. Delve into a diverse array of opportunities, including exploration, production, and refining projects spanning the globe. Whether it's tapping into new reserves, optimizing existing operations, or refining processes to meet evolving market demands, our ventures offer a comprehensive approach to capitalizing on the dynamic landscape of oil and gas. Explore the potential for growth and stability in this vital industry with our tailored investment solutions.",
		"img" => "https://images.pexels.com/photos/10396416/pexels-photo-10396416.jpeg"
	],
];
?>


<!-- Start of Service section
	============================================= -->
<section id="in-service-page-service-1" class="in-service-page-service-section-1">

	<section id="in-benefit" class="in-benefit-section position-relative py-5 md-py-0">
		<div class="container">
			<div class="container">
				<div class="in-why-choose-top-content d-flex  justify-content-between align-items-center">
					<div class="in-section-title-1 headline wow fadeInUp" data-wow-delay="100ms"
						data-wow-duration="1000ms"
						style="visibility: visible; animation-duration: 1000ms; animation-delay: 100ms; animation-name: fadeInUp;">

						<h2>
							Accessible Investment Options: Our Services</h2>
					</div>
					<div class="in-why-choose-top-text wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms"
						style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInUp;">
						Discover the multitude of investment opportunities available through Intelbondtrade's extensive
						portfolio. Our range includes a variety of accessible options designed to cater to diverse
						investor preferences and goals. Whether you're a seasoned investor or just starting out, our
						comprehensive portfolios and customized strategies ensure that there's something for everyone.
					</div>
				</div>
			</div>
			<div class="in-benefit-content" style="padding-top:100px;">
				<?php
				foreach ($services as $service) {
					?>
					<div class="row" style="margin-bottom:100px;">
						<div class="col-lg-5">
							<div class="in-benefit-text">
								<div class="in-section-title-2 headline wow fadeInUp" data-wow-delay="200ms"
									data-wow-duration="1000ms"
									style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInUp;">
									<div class="sub-title text-uppercase" style="margin-bottom:30px;">
										Investment Options
									</div>
									<h3><b>
											<?= $service['title']; ?>
										</b></h3>
								</div>
								<div class="in-about-text-area-1 wow fadeInUp" data-wow-delay="400ms"
									data-wow-duration="1000ms"
									style="visibility: visible; animation-duration: 1000ms; animation-delay: 400ms; animation-name: fadeInUp;">
									<?= $service['subtitle']; ?>
								</div>

							</div>
						</div>
						<div class="col-lg-7 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1000ms"
							style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInLeft;">
							<div class="in-benefit-img d-flex justify-content-end" style="height: 400px;">
								<img src="<?= $service['img']; ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
							</div>
						</div>
					</div>
					<?php
				}
				?>

			</div>
		</div>
	</section>
</section>
<!-- End of Service section
	============================================= -->








<?php
require_once ("./includes/footer.php");
?>