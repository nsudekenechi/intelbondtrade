<?php
$title = "Pricing";
require_once("./includes/header.php");
$pricings = [
	[
		"name" => "Basic Plan",
		"min" => "30",
		"max" => "1999",
		"Time" => "3 days",
		"increase" => 10,
		"features" => [
			"referral commission" => 20,
		],
	],
	[
		"name" => "Standard Plan",
		"min" => "2000",
		"max" => "4999",
		"Time" => "15 Days",
		"increase" => 25,
		"features" => [
			"referral commission" => 20,
		],
	],
	[
		"name" => "Premium Plan",
		"min" => "5000",
		"max" => "9999",
		"Time" => "30 Days",
		"increase" => 45,
		"features" => [
			"referral commission" => 20,
		],
	],
	[
		"name" => "Vip Plan",
		"min" => "10000",
		"max" => "Unlimited",
		"Time" => "60 days",
		"increase" => 65,
		"features" => [
			"referral commission" => 20,
		],
	]
];
?>

<!-- Start of Price section
	============================================= -->
<section id="in-price" class="in-price-section">
	<div class="container">
		<div class="in-price-content">
			<div class="row justify-content-center" style="row-gap: 50px;">
				<?php
				foreach ($pricings as $pricing) {
					?>
					<div class="col-lg-4 col-md-6">
						<div class="in-price-inner-items text-center">
							<div class="pricing-title-price-area headline">
								<h2>
									<?= $pricing["name"]; ?>
								</h2>
								<h3>
									<?= $pricing['increase']; ?>%
								</h3>
								<span>
									<?= $pricing['Time']; ?>
								</span>
							</div>
							<div class="pricing-list-btn position-relative">
								<div class="pricing-list ul-li-block">
									<ul>
										<li>Minimum Deposit - $<?= $pricing['min']; ?>
										</li>
										<li>Maximum Deposit -
											<?= $pricing["max"] != "Unlimited" ? "$":""; ?><?= $pricing['max']; ?>
										</li>
										<li>Instant Withdraw</li>
										<li>
											Daily Plan
											<?= $pricing["name"] == "Basic Plan" ? "Excluded" : ""; ?>
										</li>
										<?php
										for ($i = 0; $i < count($pricing["features"]); $i++) {
											?>
											<li>Referral Commission-
												<?= $pricing["features"]["referral commission"]; ?>%
											</li>

											<?php
										}
										?>

									</ul>
								</div>
								<div class="price-btn">
									<div class="in-btn-1">
										<a href="#">Choose Plan</a>
									</div>
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
<!-- End of Price section
	============================================= -->


<?php
require_once("./includes/footer.php");
?>