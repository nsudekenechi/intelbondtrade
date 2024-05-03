<?php

$title = "Home";
require_once "./includes/header.php";

?>
<!-- content @s -->
<div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-between-md g-3">
                        <div class="nk-block-head-content">
                            <div class="nk-block-head-sub"><span id="greeting"></span>!</div>
                            <div class="align-center flex-wrap pb-2 gx-4 gy-3">
                                <div>
                                    <h2 class="nk-block-title fw-normal">
                                        <?= $row['fullname']; ?>
                                    </h2>
                                </div>
                                <div><a href="./myplan.php" class="btn btn-white btn-light">My Plans <em
                                            class="icon ni ni-arrow-long-right ms-2"></em></a></div>
                            </div>
                            <div class="nk-block-des">
                                <p id="message"></p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content d-none d-md-block">
                            <div class="nk-slider nk-slider-s1">
                                <?php
                                // echo password_hash("admin123", PASSWORD_DEFAULT);
                                // Displaying amount from details table and other columns from plans table
                                $query = "SELECT  deposits.end_date,deposits.amount, plans.name, plans.increase, plans.days FROM 
                                      deposits 
                                      JOIN plans
                                      ON deposits.plan = plans.id
                                      WHERE deposits.user='$userid' AND deposits.active = true LIMIT 3";
                                $res = mysqli_query($conn, $query);
                                $currDate = new DateTime(date('d-M-Y'));
                                if ($res->num_rows > 0) {
                                    ?>
                                    <div class="slider-init" data-slick='{"dots": true, "arrows": false, "fade": true}'>
                                        <?php

                                        while ($row2 = mysqli_fetch_assoc($res)) {
                                            $endDate = new DateTime($row2['end_date']);
                                            ?>
                                            <div class="slider-item">
                                                <div class="nk-iv-wg1">
                                                    <div class="nk-iv-wg1-sub sub-text">My Active Plans</div>
                                                    <h6 class="nk-iv-wg1-info title">
                                                        <?= $row2['name']; ?> -
                                                        <?= $row2['increase']; ?>% for
                                                        <?= $row2['days']; ?> Days
                                                    </h6>

                                                    <div class="nk-iv-wg1-progress">
                                                        <div class="progress-bar bg-primary"
                                                            data-progress="<?= 100 / ($currDate->diff($endDate)->days + 1) ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .slider-item -->
                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="slider-dots"></div>

                                    <?php


                                }

                                ?>
                            </div><!-- .nk-slider -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <!-- <div class="nk-block">
                    <div class="nk-news card card-bordered">
                        <div class="card-inner">
                            <div class="nk-news-list">
                                <a class="nk-news-item" href="#">
                                    <div class="nk-news-icon">
                                        <em class="icon ni ni-card-view"></em>
                                    </div>
                                    <div class="nk-news-text">
                                        <p>Do you know the latest update of 2022? <span> A overview of our is now
                                                available on YouTube</span></p>
                                        <em class="icon ni ni-external"></em>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- .card -->
                <!-- .nk-block -->
                <div class="nk-block">
                    <div class="row gy-gs">
                        <div class="col-md-6 col-lg-4">
                            <div class="nk-wg-card is-dark card card-bordered">
                                <div class="card-inner">
                                    <div class="nk-iv-wg2">
                                        <div class="nk-iv-wg2-title">
                                            <h6 class="title">Account Balance <em class="icon ni ni-info"></em></h6>
                                        </div>
                                        <?php
                                        $query = "SELECT SUM(increase) FROM deposits
                                         INNER JOIN plans 
                                         ON deposits.plan = plans.id
                                         WHERE deposits.active = true AND deposits.last_profit IS NOT NULL

                                         ";
                                        $res = mysqli_query($conn, $query);
                                        $increase = $res->fetch_column();

                                        ?>
                                        <div class="nk-iv-wg2-text">
                                            <div class="nk-iv-wg2-amount"> $
                                                <?= number_format($row['balance'], 2); ?>
                                                <?php
                                                if ($increase > 0) {
                                                    ?>

                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-md-6 col-lg-4">
                            <div class="nk-wg-card is-s1 card card-bordered">
                                <div class="card-inner">
                                    <div class="nk-iv-wg2">
                                        <div class="nk-iv-wg2-title">
                                            <h6 class="title">Total Invested <em class="icon ni ni-info"></em></h6>
                                        </div>
                                        <?php
                                        $query = "SELECT count(amount) FROM deposits WHERE user = '$userid' AND active = true";
                                        $res = mysqli_query($conn, $query);
                                        $increase = $res->fetch_column();
                                        ?>
                                        <div class="nk-iv-wg2-text">
                                            <div class="nk-iv-wg2-amount">$
                                                <?= number_format($row['invested'], 2); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-md-12 col-lg-4">
                            <div class="nk-wg-card is-s3 card card-bordered">
                                <div class="card-inner">
                                    <div class="nk-iv-wg2">
                                        <div class="nk-iv-wg2-title">
                                            <h6 class="title">Total Profits <em class="icon ni ni-info"></em></h6>
                                        </div>
                                        <div class="nk-iv-wg2-text">
                                            <div class="nk-iv-wg2-amount">$
                                                <?= number_format($row['profits'], 2); ?>
                                                <?php
                                                $query = "SELECT profits from users WHERE id='$userid'";
                                                $res = mysqli_query($conn, $query);

                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
                <div class="nk-block">
                    <div class="row gy-gs">
                        <div class="col-md-6 col-lg-4">
                            <div class="nk-wg-card card card-bordered h-100">
                                <div class="card-inner h-100">
                                    <div class="nk-iv-wg2">
                                        <div class="nk-iv-wg2-title">
                                            <h6 class="title">Amount Withdrawn</h6>
                                        </div>
                                        <div class="nk-iv-wg2-text">
                                            <div class="nk-iv-wg2-amount ui-v2">
                                                $
                                                <?= number_format($row['withdrawn'], 2); ?>
                                            </div>
                                            <ul class="nk-iv-wg2-list">
                                                <li>
                                                    <span class="item-label">Available Funds</span>
                                                    <span class="item-value">
                                                        $
                                                        <?= number_format($row['balance'], 2); ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="item-label">Invested Funds</span>
                                                    <span class="item-value">
                                                        $
                                                        <?= number_format($row['invested'], 2); ?>
                                                    </span>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="nk-iv-wg2-cta">
                                            <a href="./withdraw.php" class="btn btn-primary btn-lg btn-block">Withdraw
                                                Funds</a>
                                            <!-- <a href="#" class="btn btn-trans btn-block">Deposit Funds</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-md-6 col-lg-4">
                            <div class="nk-wg-card card card-bordered h-100">
                                <div class="card-inner h-100">
                                    <div class="nk-iv-wg2">
                                        <div class="nk-iv-wg2-title">
                                            <h6 class="title">This Month Profit <em
                                                    class="icon ni ni-info text-primary"></em></h6>
                                            <?php
                                            $currMonth = date('M');
                                            $query = "SELECT SUM(deposits.amount * plans.increase/100) FROM deposits JOIN plans ON deposits.plan=plans.id
                                            WHERE deposits.last_profit LIKE '%$currMonth%' AND deposits.user='$userid'";
                                            $res = mysqli_query($conn, $query);
                                            $profit = $res->fetch_column();
                                            ?>
                                        </div>
                                        <div class="nk-iv-wg2-text">
                                            <div class="nk-iv-wg2-amount ui-v2">
                                                $
                                                <?= number_format($profit, 2); ?>

                                            </div>
                                            <ul class="nk-iv-wg2-list">
                                                <li>
                                                    <span class="item-label">Profits</span>
                                                    <span class="item-value">
                                                        <?= number_format($profit, 2); ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="item-label">Referrals</span>
                                                    <?php
                                                    $query = "SELECT SUM(referrals.ref_earned) FROM referrals WHERE user='$userid' AND referrals.date LIKE '%$currMonth%'";
                                                    $res = mysqli_query($conn, $query);
                                                    ?>
                                                    <span class="item-value">
                                                        <?= number_format($res->fetch_column(), 2); ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="item-label">Rewards</span>
                                                    <span class="item-value">0.00</span>
                                                </li>
                                                <li class="total">
                                                    <span class="item-label">Total Profit</span>
                                                    <span class="item-value">
                                                        <?php
                                                        $query = "SELECT SUM(referrals.ref_earned) + users.profits FROM referrals JOIN users ON users.id = referrals.user
                                                        WHERE users.id = '$userid' AND referrals.date LIKE '%$currMonth%'";
                                                        $res = mysqli_query($conn, $query);
                                                        ?>
                                                        <?= number_format($res->fetch_column(), 2); ?>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="nk-iv-wg2-cta">
                                            <a href="./invest.php" class="btn btn-primary btn-lg btn-block">Invest &
                                                Earn</a>
                                            <!-- <div class="cta-extra">Earn up to 25$ <a href="#"
                                                    class="link link-dark">Refer friend!</a></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-md-12 col-lg-4">
                            <div class="nk-wg-card card card-bordered h-100">
                                <div class="card-inner h-100">
                                    <div class="nk-iv-wg2">
                                        <div class="nk-iv-wg2-title">
                                            <h6 class="title">My Investment</h6>
                                        </div>
                                        <div class="nk-iv-wg2-text">
                                            <?php
                                            $q = "SELECT * FROM deposits WHERE user='$userid' AND active = true AND verified=true";
                                            $res = mysqli_query($conn, $q);
                                            $activePlans = mysqli_num_rows($res);
                                            ?>
                                            <div class="nk-iv-wg2-amount ui-v2">

                                                <span class="sub">
                                                    <?= $activePlans < 10 ? "0$activePlans" : $activePlans; ?>
                                                </span> Active
                                            </div>
                                            <ul class="nk-iv-wg2-list">
                                                <?php
                                                // Displaying amount from details table and other columns from plans table
                                                $query = "SELECT  deposits.amount, plans.name, plans.increase, plans.days FROM 
                                                deposits 
                                                JOIN plans
                                                ON deposits.plan = plans.id
                                                WHERE deposits.user='$userid' AND deposits.active = true  LIMIT 4";
                                                $res = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    ?>
                                                    <li>
                                                        <span class="item-label"><a href="#">
                                                                <?= $row['name']; ?>
                                                            </a> <small>-
                                                                <?= $row['increase']; ?>% for
                                                                <?= $row['days']; ?> Days
                                                            </small></span>
                                                        <span class="item-value">
                                                            $
                                                            <?= number_format($row['amount'], 2); ?>
                                                        </span>
                                                    </li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                        <div class="nk-iv-wg2-cta">
                                            <a href="./myplan.php" class="btn btn-light btn-lg btn-block">See all
                                                Investment</a>
                                            <!-- <div class="cta-extra">Check out <a href="#" class="link link-dark">Analytic
                                                    Report</a></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="nk-refwg">
                            <div class="nk-refwg-invite card-inner">
                                <div class="nk-refwg-head g-3">
                                    <div class="nk-refwg-title">
                                        <h5 class="title">Refer Us & Earn</h5>
                                        <div class="title-sub">Use the bellow link to invite your friends.</div>
                                    </div>
                                    <div class="nk-refwg-action">
                                        <a href="#" class="btn btn-primary">Invite</a>
                                    </div>
                                </div>
                                <div class="nk-refwg-url">
                                    <div class="form-control-wrap">
                                        <div class="form-clip clipboard-init" data-clipboard-target="#refUrl"
                                            data-success="Copied" data-text="Copy Link"><em
                                                class="clipboard-icon icon ni ni-copy"></em> <span
                                                class="clipboard-text">Copy Link</span></div>
                                        <div class="form-icon">
                                            <em class="icon ni ni-link-alt"></em>
                                        </div>

                                        <?php
                                        $query = "SELECT username from users WHERE id = '$userid'";
                                        $res = mysqli_query($conn, $query);
                                        ?>

                                        <input type="text" class="form-control copy-text" id="refUrl" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <input type="text" hidden id="refUser" value="<?= $res->fetch_column(); ?>">
                            <div class="nk-refwg-stats card-inner bg-lighter">
                                <div class="nk-refwg-group g-3">
                                    <div class="nk-refwg-name">
                                        <h6 class="title">My Referral <em class="icon ni ni-info"
                                                data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="Referral Informations"></em></h6>
                                    </div>
                                    <?php
                                    $query = "SELECT COUNT(id) FROM referrals WHERE user='$userid'";
                                    $res = mysqli_query($conn, $query);

                                    ?>
                                    <div class="nk-refwg-info g-3">
                                        <div class="nk-refwg-sub">
                                            <div class="title">
                                                <?= $res->fetch_column(); ?>
                                            </div>
                                            <div class="sub-text">Total Joined</div>
                                        </div>
                                        <div class="nk-refwg-sub">
                                            <?php
                                            $query = "SELECT SUM(ref_earned) FROM referrals WHERE user='$userid'";
                                            $res = mysqli_query($conn, $query);
                                            ?>
                                            <div class="title">
                                                <?= number_format($res->fetch_column(), 2); ?>
                                            </div>
                                            <div class="sub-text">Referral Earn</div>
                                        </div>
                                    </div>
                                    <div class="nk-refwg-more dropdown mt-n1 me-n1">
                                        <a href="#" class="btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em
                                                class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                            <ul class="link-list-plain sm">
                                                <li><a href="#">7 days</a></li>
                                                <li><a href="#">15 Days</a></li>
                                                <li><a href="#">30 Days</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-refwg-ck">
                                    <canvas class="chart-refer-stats" id="refBarChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
<script>
    let greeting = document.querySelector("#greeting");
    let date = new Date();
    let messages = {
        morning: [
            "Rise and shine to a day filled with investment opportunities.",
            "Let's start your day by reviewing your investment strategies.",
            "Get a head start on managing your investments with our dashboard."
        ],
        afternoon: [
            "Take a break and check in on your investment performance.",
            "Time to review your portfolio and make informed decisions.",
            "Hello there! Take a moment to fine-tune your investment plans."
        ],
        evening: ["Reflect on your day and plan for tomorrow's investment moves.", "Wind down by analyzing your investment data and setting goals", "Spend your evening wisely by optimizing your investment strategies"]
    };
    let message = document.querySelector("#message");
    if (date.getHours() < 12) {
        greeting.innerHTML = "Good Morning"
        greetUser(messages.morning)
    } else if (date.getHours() >= 12 && date.getHours() <= 15) {
        greeting.innerHTML = "Good Afternoon"
        greetUser(messages.afternoon)
    } else {
        greeting.innerHTML = "Good Evening"
        greetUser(messages.evening)

    }

    function greetUser(timeofday) {
        message.innerHTML = timeofday[Math.floor(Math.random() * timeofday.length)]
    }
    let refUrl = document.querySelector("#refUrl")
    let refUser = document.querySelector("#refUser")
    refUrl.value = `${location.origin}/?ref=${refUser.value}`

</script>
<?php
require_once "./includes/footer.php";
?>