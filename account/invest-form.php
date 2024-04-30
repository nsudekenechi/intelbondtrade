<?php
$title = "Invest";
require_once ("./includes/header.php");


?>
<!-- content @s -->
<div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><a href="./invest.php" class="back-to"><em
                                    class="icon ni ni-arrow-left"></em><span>Back to plan</span></a></div>
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Ready to get started?</h2>
                        </div>
                    </div>
                </div><!-- nk-block-head -->
                <div class="nk-block invest-block">
                    <form action="./handlers/add.php" class="invest-form" method="POST">
                        <div class="row g-gs">
                            <div class="col-lg-7">
                                <div class="invest-field form-group">
                                    <input type="hidden" value="silver" name="iv-plan" id="invest-choose-plan">
                                    <div class="dropdown invest-cc-dropdown">
                                        <a href="#" class="invest-cc-chosen dropdown-indicator"
                                            data-bs-toggle="dropdown">
                                            <div class="coin-item">
                                                <div class="coin-icon">
                                                    <em class="icon ni ni-offer-fill"></em>
                                                </div>
                                                <?php
                                                $id = $_GET["plan"];
                                                $query2 = "SELECT * FROM plans WHERE id = $id";
                                                $res2 = mysqli_query($conn, $query2);
                                                $row = $res2->fetch_assoc();

                                                ?>
                                                <div class="coin-info">
                                                    <span class="coin-name">
                                                        <?= $row['name']; ?> Plan
                                                    </span>
                                                    <span class="coin-text">Invest for
                                                        <?= $row['days']; ?> days and get daily
                                                        profit
                                                        <?= $row['increase']; ?>%
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-auto dropdown-menu-mxh">
                                            <ul class="invest-cc-list">
                                                <?php
                                                $id = $_GET["plan"];
                                                $query2 = "SELECT * FROM plans WHERE id != $id";
                                                $res2 = mysqli_query($conn, $query2);
                                                while ($row = $res2->fetch_assoc()) {
                                                    ?>
                                                    <li class="invest-cc-item selected">
                                                        <a href="#" class="invest-cc-opt" data-plan="silver">
                                                            <div class="coin-item">
                                                                <div class="coin-icon">
                                                                    <em class="icon ni ni-offer-fill"></em>
                                                                </div>
                                                                <div class="coin-info">
                                                                    <span class="coin-name">
                                                                        <?= $row['name']; ?> Plan
                                                                    </span>
                                                                    <span class="coin-text">Invest for
                                                                        <?= $row['days']; ?> days
                                                                        and get daily profit
                                                                        <?= $row['increase']; ?> %
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }

                                                ?>


                                            </ul>
                                        </div>
                                    </div><!-- .dropdown -->
                                </div><!-- .invest-field -->
                                <div class="invest-field form-group">
                                    <?php
                                    $id = $_GET["plan"];
                                    $query2 = "SELECT * FROM plans WHERE id = $id";
                                    $res2 = mysqli_query($conn, $query2);
                                    $row = $res2->fetch_assoc();
                                    ?>
                                    <div class="form-label-group">
                                        <label class="form-label">Choose Quick Amount to Invest</label>
                                    </div>
                                    <div class="invest-amount-group g-2">
                                        <?php
                                        for ($i = 1; $i <= 6; $i++) {
                                            if ($i == 1) {
                                                $amount = $row['min_deposit'];
                                            } else if ($i < 6) {
                                                $increment = ($row['max_deposit'] - $row['min_deposit']) / 6;
                                                $amount += $increment;
                                            } else {
                                                $increment = ($row['max_deposit'] - $row['min_deposit']) / 6;
                                                $amount = $row['max_deposit'] - $increment;
                                            }
                                            ?>
                                            <div class="invest-amount-item">
                                                <input type="radio" class="invest-amount-control" name="iv-amount"
                                                    id="iv-amount-<?= $i; ?>">
                                                <label class="invest-amount-label" for="iv-amount-<?= $i; ?>"><span
                                                        class="wallet_sign">$</span>
                                                    <span class="wallet_amount">
                                                        <?= intval($amount) ?>
                                                    </span>
                                                </label>
                                            </div>
                                            <?php
                                        }
                                        ?>


                                    </div>
                                </div><!-- .invest-field -->
                                <div class="invest-field form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Or Enter Your Amount</label>
                                    </div>
                                    <div class="form-control-group">
                                        <div class="form-info amountCurr">USD</div>
                                        <input type="number" class="form-control form-control-amount form-control-lg"
                                            id="custom-amount" placeholder="<?= $row['min_deposit'] ?>.00" required
                                            min="<?= $row['min_deposit'] ?>" max="<?= $row['max_deposit'] ?>"
                                            name="amount">
                                        <input type="text" hidden name="plan" value='<?= $_GET['plan']; ?>'>
                                        <input type="text" hidden name="days" value='<?= $row['days']; ?>'>
                                        <input type="text" hidden name="increase" value='<?= $row['increase']; ?>'>
                                    </div>
                                    <div class="form-note pt-2">Note: Minimum invest
                                        <span id='minAmount'>
                                            <?= number_format($row['min_deposit']); ?>
                                        </span> <span class='amountCurr'>USD</span> and upto
                                        <span id='maxAmount'>
                                            <?= number_format($row['max_deposit']); ?>
                                        </span>
                                        <span class='amountCurr'>USD</span>
                                    </div>
                                </div><!-- .invest-field -->
                                <div class="invest-field form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Choose Payment Method</label>
                                    </div>
                                    <input type="hidden" value="wallet" name="iv-wallet" id="invest-choose-wallet">
                                    <div class="dropdown invest-cc-dropdown">
                                        <?php
                                        $query = "SELECT * FROM wallet LIMIT 1";
                                        $res = mysqli_query($conn, $query);
                                        $row = $res->fetch_assoc();
                                        ?>
                                        <input type="text" hidden id="selectedWallet" name="selectedWallet"
                                            value="<?= $row['id']; ?>">

                                        <a class="invest-cc-chosen dropdown-indicator" data-bs-toggle="dropdown"
                                            id="payment">
                                            <div class="coin-item">
                                                <div class="coin-icon">
                                                    <span style="font-size:2rem;">

                                                    </span>
                                                </div>
                                                <div class="coin-info">
                                                    <span class="coin-name text-uppercase">
                                                        <?= $row['wallet_name']; ?>
                                                    </span>
                                                    <span class="coin-text">
                                                        <?= $row['wallet_code']; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-auto dropdown-menu-mxh">
                                            <ul class="invest-cc-list">
                                                <?php
                                                $query = "SELECT * FROM wallet";
                                                $res = mysqli_query($conn, $query);
                                                while ($row = $res->fetch_assoc()) {
                                                    ?>
                                                    <li class="invest-cc-item" data-id="<?= $row['id']; ?>">
                                                        <a class="invest-cc-opt" data-plan="silver">
                                                            <div class="coin-item">
                                                                <div class="coin-icon">
                                                                    <span style="font-size:2rem;">

                                                                    </span>
                                                                </div>
                                                                <div class="coin-info">
                                                                    <span class="coin-name text-uppercase">
                                                                        <?= $row['wallet_name']; ?>
                                                                    </span>
                                                                    <span class="coin-text">
                                                                        <?= $row['wallet_code']; ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>

                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                                <!-- .invest-cc-item -->

                                            </ul>
                                        </div>
                                    </div><!-- .dropdown -->
                                </div><!-- .invest-field -->
                                <div class="invest-field form-group">
                                    <div class="custom-control custom-control-xs custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox" required>
                                        <label class="custom-control-label" for="checkbox">I agree the <a href="#">terms
                                                and &amp; conditions.</a></label>
                                    </div>
                                </div><!-- .invest-field -->
                            </div><!-- .col -->
                            <div class="col-xl-4 col-lg-5 offset-xl-1">
                                <div class="card card-bordered ms-lg-4 ms-xl-0">
                                    <div class="nk-iv-wg4">
                                        <div class="nk-iv-wg4-sub">
                                            <h6 class="nk-iv-wg4-title title">Your Investment Details</h6>
                                            <ul class="nk-iv-wg4-overview g-2">
                                                <?php
                                                $id = $_GET["plan"];
                                                $query2 = "SELECT * FROM plans WHERE id = $id";
                                                $res2 = mysqli_query($conn, $query2);
                                                $row = $res2->fetch_assoc();
                                                ?>
                                                <li>
                                                    <div class="sub-text">Name of scheme</div>
                                                    <div class="lead-text">
                                                        <?= $row['name']; ?> Plan
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Term of the scheme</div>
                                                    <div class="lead-text">
                                                        <span id="days">
                                                            <?= $row['days']; ?>
                                                        </span>days
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Daily profit</div>
                                                    <div class="lead-text"><span class="wallet_sign">$</span><span
                                                            id="dailyProfit">0.00</span></div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Daily profit %</div>
                                                    <div class="lead-text">
                                                        <span id="increase">
                                                            <?= $row['increase']; ?>
                                                        </span> %
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Total net profit</div>
                                                    <div class="lead-text"><span class="wallet_sign">$</span><span
                                                            id="profit">0.00</span></div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Amount</div>
                                                    <div class="lead-text"><span class="wallet_sign">$</span><span
                                                            id="total">0.00</span></div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Term start at</div>
                                                    <div class="lead-text">
                                                        <?= date('d-M-Y'); ?> <small></small>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Term end at</div>
                                                    <div class="lead-text">
                                                        <?= date('d-M-Y', strtotime($row['days'] . "days")); ?>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- .nk-iv-wg4-sub -->
                                        <div class="nk-iv-wg4-sub">
                                            <ul class="nk-iv-wg4-list">
                                                <li>
                                                    <div class="sub-text">Payment Method</div>
                                                    <?php
                                                    $query = "SELECT wallet_name FROM wallet LIMIT 1";
                                                    $res = mysqli_query($conn, $query);

                                                    ?>
                                                    <div class="lead-text text-uppercase" id="paymentMethod">
                                                        <?= $res->fetch_column(); ?>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- .nk-iv-wg4-sub -->
                                        <!-- <div class="nk-iv-wg4-sub">
                                            <ul class="nk-iv-wg4-list">
                                                <li>
                                                    <div class="sub-text">Amount to invest</div>
                                                    <div class="lead-text">$ 250.00</div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Conversion Fee <span>(0.5%)</span>
                                                    </div>
                                                    <div class="lead-text">$ 1.25</div>
                                                </li>
                                            </ul>
                                        </div>-->
                                        <div class="nk-iv-wg4-sub">
                                            <ul class="nk-iv-wg4-list">
                                                <li>
                                                    <div class="lead-text">Total Return</div>
                                                    <div class="caption-text text-primary"><span
                                                            class="wallet_sign">$</span>
                                                        <span id="return">0.00</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- .nk-iv-wg4-sub -->
                                        <div class="nk-iv-wg4-sub text-center bg-lighter">


                                            <button class="btn btn-lg btn-primary ttu" name="deposit"
                                                data-bs-toggle="modal" data-bs-target="#modalTabs">Create
                                                deposit</button>
                                        </div>
                                        <!-- .nk-iv-wg4-sub -->
                                    </div><!-- .nk-iv-wg4 -->
                                </div><!-- .card -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </form>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
    <button class="btn btn-lg btn-primary ttu" name="" data-bs-toggle="modal" data-bs-target="#modalTabs" id="button"
        hidden>Create
        deposit</button>

    <button class="btn btn-lg btn-primary ttu" name="" data-bs-toggle="modal" data-bs-target="#modalAlert"
        id="modalAlertButton" hidden>Create
        deposit</button>
</div>

</div>
<!-- content @e -->
<div class="modal fade" tabindex="-1" id="modalAlert">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross"></em></a>
            <div class="modal-body modal-body-lg text-center">
                <div class="nk-modal">
                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                    <h4 class="nk-modal-title">Congratulations!</h4>
                    <div class="nk-modal-text">
                        <div class="caption-text">Once we verify your payment, your account would be funded
                        </div>

                    </div>
                    <div class="nk-modal-action">
                        <a href="#" class="btn btn-lg btn-mw btn-primary" data-bs-dismiss="modal">OK</a>
                    </div>
                </div>
            </div><!-- .modal-body -->
            <div class="modal-footer bg-lighter">
                <div class="text-center w-100">
                    <p>Earn up to 10% profit for each friend your refer! </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_GET["deposit"])) {
    $id = $_GET["deposit"];
    $query = "SELECT deposits.amount, wallet.wallet_address,wallet.wallet_rate, wallet.wallet_qrcode, wallet.wallet_code,wallet.wallet_symbol FROM deposits JOIN wallet ON deposits.wallet = wallet.id WHERE deposits.id = '$id'";
    $res = mysqli_query($conn, $query);
    $row = $res->fetch_assoc();
    ?>
    <div class="modal fade " tabindex="-1" role="dialog" id="modalTabs">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">

                    <form action="./handlers/add.php" method="POST" enctype="multipart/form-data">
                        <input type="text" hidden id="deposit_id" value="<?= $id; ?>" name="deposit_id">
                        <input type="text" hidden id="deposit_id" value="<?= $_GET["plan"]; ?>" name="plan">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabItem1">
                                <div class="justify-center">
                                    <h3>


                                        <?= number_format($row['amount'] * $row['wallet_rate'], intval($row['amount'] * $row['wallet_rate'], ) == 0 ? 5 : 2) . ' ' . $row['wallet_code']; ?>
                                    </h3>
                                </div>
                                <div class="justify-center">
                                    <p>
                                        Deposit amount to wallet or scan QR code, then send us a picture of the payment
                                        proof. Thank you</p>

                                </div>
                                <div class="justify-center my-3">
                                    <img src="./images/walletQrcode/<?= $row['wallet_qrcode']; ?>" alt="" height="200">
                                </div>
                                <div class="justify-center mb-3">
                                    <div class="nk-refwg-url  w-50">
                                        <div class="form-control-wrap">

                                            <input type="text" class="form-control copy-text " id="refUrl"
                                                value="<?= $row['wallet_address']; ?>" readonly="">
                                            <div class="form-clip clipboard-init" data-clipboard-target="#refUrl"
                                                data-success="Copied" data-text="Copy Link"><em
                                                    class="clipboard-icon icon ni ni-copy"></em> <span
                                                    class="clipboard-text">Copy Address</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="justify-center ">
                                    <div class="form-control-wrap w-50">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input" id="customFile" required
                                                name="paymentProof" accept=".png,.jpg">
                                            <label class="form-file-label" for="customFile">Enter Payment Proof</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="justify-center mt-3">
                            <button class="btn btn-lg btn-primary ttu w-25 center" id="done"
                                name="verify_deposit">Done</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        const button = document.querySelector("#modalTabs  button");
        const file = document.querySelector("#modalTabs input[type='file']")
        let submitting = false;
        button.onclick = (e) => {
            if (file.files.length > 0) {
                // Preventing user from submitting form when form is already being submitted
                if (!submitting) {
                    submitting = true;
                    button.innerHTML = `<span class="spinner-border spinner-border-sm ml-2" role="status" aria-hidden="true"></span>`
                } else {
                    e.preventDefault()
                }
            }
        }
    </script>
    <?php
}
?>
<?php
require_once ("./includes/footer.php");
?>

<script>
    let paymentMethods = document.querySelectorAll(".invest-cc-item");
    let activePaymentMethods = document.querySelector("#payment")
    let amount = document.querySelector("#custom-amount"); //amount user inputs
    let wallet_amount = document.querySelectorAll(".wallet_amount"); //selecting quick amounts
    let increase = Number(document.querySelector("#increase").innerHTML) / 100;
    let dailyProfit = document.querySelector("#dailyProfit")
    let days = Number(document.querySelector("#days").innerHTML);
    let totalNetProfit = document.querySelector("#profit");
    let total = document.querySelector("#total");
    let returnAmount = document.querySelector("#return")
    let paymentMethod = document.querySelector("#paymentMethod");
    let selectedWallet = document.querySelector("#selectedWallet")
    wallet_amount.forEach(item => {
        item.parentElement.parentElement.onclick = () => {
            amount.value = Number(item.innerHTML.trim()).toFixed(2)
            updateInvestmentDetails()

        }
    })

    // Changing values and symbols when user changes payment method
    paymentMethods.forEach(item => {
        item.onclick = () => {
            activePaymentMethods.querySelector(".coin-item").innerHTML = item.querySelector(".coin-item").innerHTML;
            paymentMethod.innerHTML = item.querySelector(".coin-name").innerHTML.trim();    // changing payment method text
            selectedWallet.value = item.dataset.id;
        }
    })

    // Updating investment details when user starts typing amount
    amount.onkeyup = () => {
        updateInvestmentDetails()
    }

    // Displaying payment modal when address has deposit
    if (location.search.includes("deposit")) {
        let button = document.querySelector("#button")
        let deposit_id = document.querySelector("#deposit_id").value;
        button.click()
    }
    if (location.search.includes("plan") && location.search.includes("verified")) {
        let verified = location.search.split("verified=")[1];
        if (verified == "s") {
            let button = document.querySelector("#modalAlertButton")
            button.click()
        }
    }

    function updateInvestmentDetails() {
        // Specifying that decimal place should be 2 if wllet is USDT or BEP20
        let profit = amount.value * increase;
        dailyProfit.innerHTML = profit.toFixed(2);
        totalNetProfit.innerHTML = (profit * days).toFixed(2);
        total.innerHTML = Number(amount.value).toFixed(2);
        returnAmount.innerHTML = (Number(amount.value) + Number(totalNetProfit.innerHTML)).toFixed(2);
    }







</script>