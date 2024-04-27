<?php
$title = "About Us";
include_once ("./includes/header.php");
$members = [
	[
		"name" => "John Smith",
		"role" => "Chairman",
		"text" => "John Smith brings unparalleled leadership to our board. His strategic insights and keen understanding of market trends have been instrumental in shaping our long-term vision. ",
		"img" => "https://images.pexels.com/photos/2182970/pexels-photo-2182970.jpeg"
	],

	[
		"name" => "Jessica Ramirez",
		"role" => "CEO",
		"text" => "As the CEO , Emily spearheads our operations with a blend of innovation and strategic acumen. With a background in technology and finance, Emily ensures that our platform remains at the forefront of the digital investment landscape.",
		"img" => "https://images.pexels.com/photos/1181686/pexels-photo-1181686.jpeg"
	],

	[
		"name" => "Emily Chen",
		"role" => "General Accountant",
		"text" => "Emily's extensive background in finance and accounting lends invaluable expertise to our board. With a focus on fiscal responsibility and risk management, she plays a pivotal role in driving our financial strategies forward. ",
		"img" => "https://images.pexels.com/photos/1181424/pexels-photo-1181424.jpeg"
	],

	[
		"name" => "David Patel",
		"role" => "Chief Technology Officer",
		"text" => "He leads our technological initiatives with a forward-thinking approach and a passion for innovation. With expertise in software development and cybersecurity, David ensures that our platform remains secure, efficient, and user-friendly.  ",
		"img" => "https://images.pexels.com/photos/532220/pexels-photo-532220.jpeg"
	],
	[
		"name" => "Karen Johnson",
		"role" => "Marketing Manager",
		"text" => "Karen Johnson drives our marketing strategies with creativity and precision. With a background in digital marketing and brand management, Karen ensures that our message resonates with our target audience, driving growth and engagement. ",
		"img" => "https://images.pexels.com/photos/3756679/pexels-photo-3756679.jpeg"
	]
];

$clients = [
	[
		"name" => "Tony Hart",
		"text" => "Intelbondtrade's insightful guidance transformed my investment strategy. With their support, I've achieved remarkable growth in my portfolio. ",
		"img" => "person (1)"
	],
	[
		"name" => "Isabella Martinez",
		"text" => "Choosing Intelbondtrade was a game-changer for me. Their dedication to understanding my financial goals and crafting tailored solutions has been remarkable.",
		"img" => "person (2)"
	],
	[
		"name" => "Benjamin Williams",
		"text" => "Intelbondtrade's proactive approach and attention to detail have impressed me. They've helped me navigate complex investment decisions with confidence. ",
		"img" => "person (3)"
	],
	[
		"name" => "Mason Esther",
		"text" => "Intelbondtrade's expertise shines through in every interaction. Their team is responsive, professional, and committed to delivering results. ",
		"img" => "person (4)"

	],
	[
		"name" => "Amanda Lian",
		"text" => "I'm incredibly grateful for Intelbondtrade's support and expertise, their transparent communication and strategic insights. ",
		"img" => "person (5)"

	]
];
$sponsorsImages = ["united-capital-plc--600-removebg-preview.png", "logo-removebg-preview.png", "kisspng-standard-bank-finance-financial-services-funding-5b1432787767a9.9873562815280502964891-removebg-preview.png", "chapel_hill_denham_cover-removebg-preview.png", "arm_logo_2362x1233-removebg-preview.png", "OrW7FabG_400x400-removebg-preview (1).png", "download-removebg-preview.png"];
?>



<!-- Start of About section
	============================================= -->
<section id="in-about-1" class="in-about-section-1 about-page-about position-relative">

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
									<h3>Our vision</h3>
									<p>Pioneering prosperity through strategic investments and innovation.
									</p>
								</div>
							</div>
							<div class="in-about-feature-item wow fadeInUp" data-wow-delay="300ms"
								data-wow-duration="1000ms">
								<div class="inner-icon">
									<i class="flaticon-life-insurance-1"></i>
								</div>
								<div class="inner-text headline pera-content">
									<h3>Our mission</h3>
									<p>Empowering growth through strategic investments and sustainable practices.
									</p>
								</div>
							</div>
							<div class="in-about-feature-item wow fadeInUp" data-wow-delay="400ms"
								data-wow-duration="1000ms">
								<div class="inner-icon">
									<i class="flaticon-business-and-finance"></i>
								</div>
								<div class="inner-text headline pera-content">
									<h3>Core Values</h3>
									<p>"Innovation, Integrity, Collaboration, Excellence, Sustainability.
									</p>
								</div>
							</div>
						</div>
						<div class="in-about-img-1 wow fadeInLeft" data-wow-delay="550ms" data-wow-duration="1000ms"
							style="height:600px;">
							<img src="assets/pexels-mario-cuadros-2887582.jpg" alt=""
								style="height:100%;width:100%;object-fit:cover;">
						</div>
					</div>
				</div>
				<div class="col-lg-5 py-5 px-4 py-md-0 px-md-0">
					<div class="in-about-text-wrapper-1">
						<div class="in-section-title-2 headline wow fadeInUp" data-wow-delay="550ms"
							data-wow-duration="1000ms">
							<div class="sub-title position-relative text-uppercase">
								About Us
							</div>
							<h2>Discover the Future with Intelbondtrade</h2>
						</div>
						<div class="in-about-text-area-1 wow fadeInUp" data-wow-delay="650ms"
							data-wow-duration="1000ms">
							We're a pioneering investment firm committed to driving growth, innovation, and sustainable
							wealth creation for our clients and partners worldwide.

							At Intelbondtrade, we redefine investment by merging cutting-edge strategies with unwavering
							integrity. Our mission is to empower clients with innovative solutions, driving sustainable
							growth and financial prosperity. With a global perspective and client-centric approach, we
							navigate markets to deliver exceptional results, setting new standards in the investment
							industry.
						</div>



						<div>

						</div>

						<div class="in-btn-2 position-relative wow fadeInUp" data-wow-delay="600ms"
							data-wow-duration="1000ms">
							<a href="#">Get Started Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End of About section
	============================================= -->


<!-- Start of Team slider section
	============================================= -->
<section id="in-team-slider" class="in-team-slider-section"
	data-background="assets/pexels-christina-morillo-1181360.jpg" style="position:relative;">
	<div
		style="left:0px; top:0px;width:100%;height:100%;;position:absolute;background:rgba(0,0,0,.7);backdrop-filter:blur(3px);">
	</div>
	<div class="container" style="position:relative;z-index:1;">
		<div class="in-section-title-2 text-center pera-content headline wow fadeInUp" data-wow-delay="0ms"
			data-wow-duration="1000ms">
			<div class="sub-title position-relative text-uppercase">
				Board Members
			</div>
			<h2 style="color:white;">Meet Our Experts</h2>
			<p style="color:white;">On the other hand we denounce with righteous indignation and dislike men who are so
				beguiled and demoralized.
			</p>
		</div>
		<div class="in-team-slider-two-column">
			<div class="in-team-slider-2">
				<?php
				foreach ($members as $member) {
					?>
					<div class="in-slider-item">
						<div class="in-team-item position-relative">
							<div class="in-team-img-text d-flex align-items-center">
								<div class="in-team-img" style="width:500px;">
									<img src="<?= $member["img"]; ?>" alt=""
										style="width:100%;height:100%;object-fit:cover;">
								</div>
								<div class="in-team-text headline">
									<h3>
										<?= $member["name"]; ?>
									</h3>
									<span>
										<?= $member["role"]; ?>
									</span>
									<small style="display:block;margin-top:30px;">
										<?= $member["text"]; ?>
									</small>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>


			</div>
		</div>
	</div>
</section>
<!-- End of Team slider section
	============================================= -->

<!-- Start of testimonial section
	============================================= -->
<section id="in-testimonial-3" class="in-testimonial-section-3">
	<div class="container">
		<div class="in-section-title-3  text-center headline pera-content">
			<div class="sub-title position-relative text-uppercase">
				<span> Testimonials </span>
			</div>
			<h2>Explore Clients Review</h2>
			<p>Intelbondtrade has exceeded my expectations in every aspect of investment management. Their expertise,
				reliability, and personalized approach have greatly enhanced my financial portfolio. I highly recommend
				their services to anyone seeking top-tier investment solutions.<b> - A satisfied Investor</b>
			</p>
		</div>
		<div class="in-testimonial-content-3">
			<div class="in-testimonial-slider-3">
				<?php
				foreach ($clients as $client) {
					?>
					<div class="in-slider-item">
						<div class="in-testimonial-item-3">
							<div class="quote-icon">
								<i class="fas fa-quote-left"></i>
							</div>
							<div class="inner-text" style="height:150px;">
								<?= $client['text']; ?>
							</div>
							<div class="inner-author d-flex align-items-center gap-3">
								<div style="height:50px; width:50px; ">
									<img src="assets/<?= $client['img']; ?>.jpg" alt=""
										style="height:100%; width:100%; border-radius:100%; object-fit:cover;">
								</div>
								<div class="author-meta headline">
									<h3>
										<?= $client['name']; ?>
									</h3>
									<span>Investor</span>
								</div>

							</div>
						</div>
					</div>
					<?php
				}
				?>



			</div>
		</div>
	</div>
</section>
<!-- End of Testimonial section
	============================================= -->

<!-- Start of Sponsor section
	============================================= -->
<section id="in-about-1" class="in-about-section-1 about-page-about position-relative">

	<div class="container">
		<div class="in-about-content-1">

			<div class="">
				<div class="in-about-text-wrapper-1 py-5 px-4 py-md-0 px-md-0">
					<div class="in-section-title-2 headline wow fadeInUp" data-wow-delay="550ms"
						data-wow-duration="1000ms">
						<div class="sub-title position-relative text-uppercase">
							Our Partners
						</div>
						<h2>Meet Our Esteemed Partners</h2>
					</div>
					<div class="in-about-text-area-1 wow fadeInUp" data-wow-delay="650ms" data-wow-duration="1000ms">
						At Intelbondtrade, we believe in the power of collaboration to achieve remarkable success. Our
						journey towards excellence is marked by the invaluable partnerships we've forged along the way.
						We take pride in aligning ourselves with industry leaders and visionaries who share our
						commitment to innovation and growth.

						Our esteemed partners represent a diverse spectrum of expertise, spanning across sectors such as
						finance, technology, real estate, and beyond. Together, we navigate the ever-evolving landscape
						of investment opportunities, blazing trails and pioneering new frontiers.

						With each partnership, we cultivate synergies that drive mutual success and create lasting
						impact. From strategic alliances to joint ventures, our collaborative efforts are propelled by
						trust, integrity, and a shared vision for the future.

						Join us as we continue to build bridges, break barriers, and redefine what's possible. Together,
						we're not just partners – we're trailblazers, shaping the landscape of tomorrow's investments.
					</div>



					<div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="in-sponsor" class="in-sponsor-section-2">
	<div class="container">
		<div class="in-sponsor-slider" style="display:flex;align-items:center;">
			<?php
			foreach ($sponsorsImages as $image) {
				?>
				<div class="in-sponsor-item">
					<div class="inner-img" style="height:100px;width:100px;">
						<img src="assets/<?= $image; ?>" alt="" style="width:100%;height:100%;object-fit:contain;">
					</div>
				</div>
				<?php
			}
			?>


		</div>
	</div>
</section>
<!-- End of Sponsor section
	============================================= -->

<?php
include_once ("./includes/footer.php");
?>