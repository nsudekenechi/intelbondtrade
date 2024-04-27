<?php
$title = "Our Terms";
require_once ("./includes/header.php");
$rules = [
    [
        "title" => "Acceptance of Terms",
        "subtitle" => "By accessing or using the Platform, you agree to abide by these terms and conditions and all applicable laws and regulations. If you do not agree with any of these terms, you are prohibited from using or accessing this site."
    ],
    [
        "title" => "Investment Risks",
        "subtitle" => "Investing in securities involves risks, including the potential loss of principal. We do not guarantee any specific investment results and past performance is not indicative of future results. You acknowledge and accept the risks associated with investing."
    ],
    [
        "title" => "User Responsibilities",
        "subtitle" => "You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account. You agree to notify us immediately of any unauthorized use of your account."
    ],
    [
        "title" => "User Guidelines and Obligations",
        "subtitle" => "Upon registration, clients must provide accurate personal data. They are responsible for transactions and can seek technical support. The website is for investment activities only; illegal actions result in account blocking and fund confiscation.  Multiple accounts are prohibited, and abuse leads to account suspension."
    ],
    [
        "title" => "Negotiation and Court Adjudication",
        "subtitle" => "Disputes are initially resolved through negotiations between parties. If consensus cannot be reached, disputes are escalated to court proceedings for resolution."
    ],
];
?>
<section id="in-price" class="in-price-section">
    <div class="container">
        <div class="in-section-title-2 in-title-wrap text-center headline pera-content">
            <div class="sub-title text-uppercase">
                Terms and Services
            </div>
            <h2>Our Investment Program Guidelines:<br /> User Agreement</h2>
            <p>Please read the following rules carefully, the following User Agreement has the force of
                a public offer and applies to all participants of the investment program of Intelbondtrade.
            </p>
        </div>

    </div>
</section>

<div class="container">
    <div class="in-benefit-feature">
        <div class="row">
            <?php
            foreach ($rules as $index => $rule) {
                ?>
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms"
                    style="visibility: visible; animation-duration: 1000ms; animation-delay: 400ms; animation-name: fadeInUp;">
                    <div class="in-benefit-feature-item position-relative">
                        <span class="serial position-absolute">
                            <?= $index <= 9 ? "0" . $index + 1 : $index + 1; ?>
                        </span>
                        <div class="inner-icon">
                            <i class="flaticon-privacy-policy"></i>
                        </div>
                        <div class="inner-text headline">
                            <h3>
                                <?= $rule['title']; ?>
                            </h3>
                            <p class="mt-3">
                                <?= $rule['subtitle']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</div>

<?php
require_once ("./includes/footer.php");
?>