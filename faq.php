<?php
$title = "FAQ";
require_once ("./includes/header.php");
$faq = [
	[
		"title" => "What is Intelbondtrade Investment Company",
		"subtitle" => "Intelbondtrade is an investment company that offers a range of investment opportunities tailored to meet diverse financial goals. We specialize in providing flexible investment solutions designed to adapt to changing market conditions and individual investor needs."
	],
	[
		"title" => "What types of investments does Intelbondtrade offer?",
		"subtitle" => "Intelbondtrade offers a variety of investment options including mutual funds, exchange-traded funds (ETFs), individual stocks, bonds, and alternative investments such as real estate investment trusts (REITs) and private equity funds."
	],
	[
		"title" => "How can I invest with Intelbondtrade?",
		"subtitle" => "Investing with Intelbondtrade is easy. Simply create an account , invest and earn"
	],
	[
		"title" => "What sets Intelbondtrade apart from other investment firms?",
		"subtitle" => "Intelbondtrade stands out for its commitment to flexibility, innovation, and personalized service. We understand that every investor is unique, which is why we offer a wide range of investment options and tailor our strategies to meet individual goals and risk tolerances."
	],
	[
		"title" => "What is Intelbondtrade's approach to risk management?",
		"subtitle" => "At Intelbondtrade, we believe in a prudent approach to risk management that focuses on diversification, asset allocation, and rigorous due diligence. Our team of experienced investment professionals continuously monitors market conditions and adjusts our strategies to mitigate risks and seize opportunities."
	]
];
?>

<!-- Start of FAQ section
	============================================= -->
<section id="in-faq-feed" class="in-faq-feed-section">
	<div class="container">
		<div class="in-faq-feed-content">
			<div class="row">
				<div class="col-lg-6">
					<div class="in-faq-feed-accordion">
						<div class="in-why-choose-faq">
							<div class="accordion" id="accordionExample2">
								<?php
								for ($i = 0; $i < count($faq); $i++) {
									if ($i % 2 == 0) {
										?>
										<div class="accordion-item headline-2 pera-content wow fadeInUp" data-wow-delay="200ms"
											data-wow-duration="1500ms">
											<h2 class="accordion-header" id="headingOne<?= $i; ?>">
												<button class="accordion-button <?= $i != 0 ? 'collapsed' : ''; ?>"
													type="button" data-bs-toggle="collapse"
													data-bs-target="#collapseOne<?= $i; ?>" aria-expanded="true"
													aria-controls="collapseOne">
													<?= $faq[$i]["title"]; ?>
												</button>
											</h2>
											<div id="collapseOne<?= $i; ?>"
												class="accordion-collapse collapse <?= $i == 0 ? 'show' : ''; ?>"
												aria-labelledby="headingOne<?= $i; ?>" data-bs-parent="#accordionExample2">
												<div class="accordion-body">
													<?= $faq[$i]["subtitle"]; ?>
												</div>
											</div>
										</div>
										<?php
									}
								}
								?>

							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="in-faq-feed-accordion">
						<div class="in-why-choose-faq">
							<div class="accordion" id="accordionExample3">
								<?php
								for ($i = 0; $i < count($faq); $i++) {
									if ($i % 2 == 1) {
										?>
										<div class="accordion-item headline-2 pera-content wow fadeInUp" data-wow-delay="200ms"
											data-wow-duration="1500ms">
											<h2 class="accordion-header" id="headingOne<?= $i; ?>">
												<button class="accordion-button <?= $i != 3 ? 'collapsed' : ''; ?>"
													type="button" data-bs-toggle="collapse"
													data-bs-target="#collapseOne<?= $i; ?>" aria-expanded="true"
													aria-controls="collapseOne">
													<?= $faq[$i]["title"]; ?>
												</button>
											</h2>
											<div id="collapseOne<?= $i; ?>"
												class="accordion-collapse collapse <?= $i == 3 ? 'show' : ''; ?>"
												aria-labelledby="headingOne<?= $i; ?>" data-bs-parent="#accordionExample2">
												<div class="accordion-body">
													<?= $faq[$i]["subtitle"]; ?>
												</div>
											</div>
										</div>
										<?php
									}
								}
								?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End of FAQ section
	============================================= -->

<!-- Start of FAQ Contact section
	============================================= -->
<section id="in-faq-contact" class="in-faq-contact-section">
	<div class="container">
		<div class="in-faq-contact-content">
			<div class="row">
				<div class="col-lg-5">
					<div class="in-faq-contact-info-wrap">
						<div class="in-faq-contact-info-title headline pera-content">
							<h3>Contact Us </h3>
							<p>On the other hand we denounce righteous indignation moralized bite the HR charms of
								pleasure.
							</p>
						</div>
						<div class="in-faq-contact-info">
							<div class="info-item-area d-flex align-items-center">
								<div class="inner-icon d-flex align-items-center justify-content-center">
									<i class="fal fa-map-marker-alt"></i>
								</div>
								<div class="inner-text headline pera-content">
									<h4>Office Address, USA</h4>
									<p>1314 10th Ave #18, Seattle, WA 98101, USA</p>
								</div>
							</div>
							<div class="info-item-area d-flex align-items-center">
								<div class="inner-icon d-flex align-items-center justify-content-center">
									<i class="fal fa-envelope-open-text"></i>
								</div>
								<div class="inner-text headline pera-content">
									<h4>Mail Us</h4>
									<p>support@Intelbondtrade.com</p>
									<p>info@Intelbondtrade.com</p>
								</div>
							</div>
							<div class="info-item-area d-flex align-items-center">
								<div class="inner-icon d-flex align-items-center justify-content-center">
									<i class="fal fa-phone-plus"></i>
								</div>
								<div class="inner-text headline pera-content">
									<h4>Phone Call</h4>
									<p>(734) 697-2907</p>
									<p>(843) 971-1906</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="in-faq-contact-form-area">
						<div class="in-faq-contact-info-title headline pera-content">
							<h3>Get In Touch </h3>
							<p>On the other hand we denounce righteous indignation moralized bite the HR charms of
								pleasure.
							</p>
						</div>
						<div class="in-faq-contact-form">
							<form action="#" method="get">
								<div class="row">
									<div class="col-md-6">
										<input type="text" name="name" placeholder="Name">
									</div>
									<div class="col-md-6">
										<input type="text" name="phone" placeholder="Phone">
									</div>
									<div class="col-md-6">
										<input type="email" name="email" placeholder="Email">
									</div>
									<div class="col-md-6">
										<input type="text" name="web" placeholder="Web">
									</div>
									<div class="col-md-12">
										<textarea name="message" placeholder="Message"></textarea>
									</div>
									<div class="col-md-12">
										<button type="submit">Submit Now</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End of FAQ Contact section
	============================================= -->


<?php
require_once ("./includes/footer.php");
?>