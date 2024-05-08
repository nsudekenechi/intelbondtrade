<?php
$title = "Withdraw";
require_once "./includes/header.php";

?>
<div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><a href="./invest.php" class="back-to"><em
                                    class="icon ni ni-arrow-left"></em><span>Back to plan</span></a></div>
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Want to withdraw funds?</h2>
                        </div>
                    </div>
                </div><!-- nk-block-head -->
                <div class="nk-block invest-block">
                    <form action="./handlers/add.php" class="invest-form" method="POST">
                        <input type="text" name="time" hidden id="time">
                        <div class="row g-gs">
                            <div class="col-lg-7">

                                <div class="invest-field form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Choose Quick Amount to Withdraw</label>
                                    </div>
                                    <div class="invest-amount-group g-2">

                                        <?php
                                        $query = "SELECT balance FROM users WHERE id='$userid'";
                                        $res = mysqli_query($conn, $query);
                                        $userBalance = $res->fetch_column();
                                        $minWithdrawal = number_format(10, 2);
                                        $increment = $userBalance / 6;
                                        $amount = 0;
                                        for ($i = 1; $i <= 6; $i++) {
                                            $amount = $i < 6 ? intval($amount + $increment) : intval($userBalance - 6);
                                            ?>
                                            <div class="invest-amount-item">
                                                <input type="radio" class="invest-amount-control" name="iv-amount"
                                                    id="iv-amount-<?= $i; ?>">
                                                <label class="invest-amount-label" for="iv-amount-<?= $i; ?>"><span
                                                        class="wallet_sign">$</span>
                                                    <span class="wallet_amount">
                                                        <?= $amount ?>
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
                                            id="custom-amount" placeholder="<?= $minWithdrawal; ?>" required=""
                                            min="<?= $minWithdrawal; ?>" max="<?= $userBalance; ?>" name="amount">

                                        <input type="text" id="userBalance" hidden value=" <?= $userBalance; ?>">
                                    </div>

                                </div>

                                <!-- .invest-field -->

                                <div class="invest-field form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Choose Payment Method</label>
                                    </div>
                                    <div class="dropdown invest-cc-dropdown">
                                        <?php
                                        $query = "SELECT * FROM wallet WHERE wallet_code = 'USDT'";
                                        $res = mysqli_query($conn, $query);
                                        $row = $res->fetch_assoc();
                                        ?>
                                        <a class="invest-cc-chosen " data-bs-toggle="dropdown" id="payment">
                                            <div class="coin-item">

                                                <div class="coin-info">
                                                    <span class="coin-name text-uppercase">
                                                        <?= $row['wallet_name']; ?>
                                                    </span>
                                                    <input type="text" hidden name="wallet_type"
                                                        value="<?= $row['id']; ?>" id="wallet_type">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-auto dropdown-menu-mxh" hidden>
                                            <ul class="invest-cc-list">
                                                <?php
                                                $query = "SELECT * FROM wallet WHERE wallet_code IN ('USDT', 'BTC', 'TRX', 'LITECOIN')";
                                                $res = mysqli_query($conn, $query);

                                                while ($row = $res->fetch_assoc()) {
                                                    ?>
                                                    <!-- <li class="invest-cc-item" data-id="<?= $row['id']; ?>">
                                                        <a class="invest-cc-opt" data-plan="silver">
                                                            <div class="coin-item">

                                                                <div class="coin-info">
                                                                    <span class="coin-name text-uppercase">
                                                                        <?= $row['wallet_name']; ?>
                                                                    </span>
                                                                    <span class="wallet_code" hidden>
                                                                        <?= $row['wallet_code']; ?></span>
                                                                    <span class="wallet_id" hidden>
                                                                        <?= $row['id']; ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>

                                                    </li> -->
                                                    <?php
                                                }
                                                ?>
                                                <!-- .invest-cc-item -->

                                            </ul>
                                        </div>
                                    </div><!-- .dropdown -->
                                </div>
                                <!-- .invest-field --><!-- .invest-field -->
                                <!-- .invest-field -->
                                <div class="invest-field form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Paste <span id="wallet_address">USDT</span> Wallet
                                            Address</label>
                                    </div>
                                    <input type="text" class="form-control form-control-amount form-control-md"
                                        name="wallet_address" required>
                                </div>



                            </div><!-- .col -->
                            <div class="col-xl-4 col-lg-5 offset-xl-1">
                                <div class="card card-bordered ms-lg-4 ms-xl-0">
                                    <div class="nk-iv-wg4">
                                        <div class="nk-iv-wg4-sub">
                                            <h6 class="nk-iv-wg4-title title"> Withdrawal Details</h6>

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
                                        </div>


                                        <div class="nk-iv-wg4-sub">
                                            <ul class="nk-iv-wg4-list">
                                                <li>
                                                    <div class="lead-text">Balance</div>
                                                    <div class="caption-text text-primary"><span class="wallet_sign">$

                                                        </span>
                                                        <span id="balance">
                                                            <?= $userBalance; ?>
                                                        </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- .nk-iv-wg4-sub -->

                                        <div class="nk-iv-wg4-sub text-center bg-lighter">



                                            <button class="btn btn-lg btn-primary ttu" name="withdrawal"
                                                data-bs-toggle="modal" data-bs-target="#modalTabs">Request
                                                Withdrawal</button>

                                        </div>

                                        <!-- .nk-iv-wg4-sub -->
                                    </div><!-- .nk-iv-wg4 -->
                                </div><!-- .card -->
                            </div>
                        </div><!-- .row -->
                    </form>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
    <button class="btn btn-lg btn-primary ttu" name="" data-bs-toggle="modal" data-bs-target="#modalAlert" id="button"
        hidden></button>

    <div class="modal fade" tabindex="-1" id="modalAlert">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                        <h4 class="nk-modal-title">Succesful!</h4>
                        <div class="nk-modal-text">
                            <div class="caption-text">Your withdrawal request have been sent sucessfully, your wallet
                                would be funded before 24 hours
                            </div>

                        </div>
                        <div class="nk-modal-action">
                            <a href="#" class="btn btn-lg btn-mw btn-primary" data-bs-dismiss="modal">OK</a>
                        </div>
                    </div>
                </div><!-- .modal-body -->
                <div class="modal-footer bg-lighter ">
                    <div class="text-center w-100">
                        <p>Earn up to 10% profit for each friend your refer! </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
require_once "./includes/footer.php";
?>

<script>
    let paymentMethods = document.querySelectorAll(".invest-cc-item");
    let activePaymentMethod = document.querySelector("#payment")
    let wallet_amount = document.querySelectorAll(".wallet_amount"); //selecting quick amounts
    let amount = document.querySelector("#custom-amount"); //amount user inputs            
    let paymentMethod = document.querySelector("#paymentMethod");
    let userBalance = parseFloat(document.querySelector("#userBalance").value);
    let balance = document.querySelector("#balance");
    let form = document.querySelector("form")
    let withdrawal = document.querySelector("button[name='withdrawal']")
    // choosing payment method
    // paymentMethods.forEach(item => {
    //     item.onclick = () => {
    //         activePaymentMethod.querySelector(".coin-item").innerHTML = item.querySelector(".coin-item").innerHTML;
    //         document.querySelector("#wallet_address").innerHTML = item.querySelector(".wallet_code").innerHTML.trim()
    //         document.querySelector("#wallet_type").value = item.querySelector(".wallet_id").innerHTML.trim()
    //         document.querySelector("#paymentMethod").innerHTML = item.querySelector(".coin-item").innerHTML;
    //     }
    // })


    wallet_amount.forEach(item => {
        item.parentElement.parentElement.onclick = () => {
            amount.value = Number(item.innerHTML.trim()).toFixed(2)
            if (amount.value < userBalance) {
                balance.innerHTML = Number(userBalance - amount.value).toFixed(2)
            }

        }
    })

    amount.onkeyup = () => {
        if (amount.value <= userBalance) {
            balance.innerHTML = Number(userBalance - amount.value).toFixed(2)
            withdrawal.disabled = false;
        } else {
            withdrawal.disabled = true
        }
    }
    let submitting = false;
    // Preventing user from clicking button twice
    withdrawal.onclick = (e) => {
        if (submitting) {
            e.preventDefault()
        }
    }
    form.onsubmit = () => {
        submitting = true;
        withdrawal.innerHTML = `<span class="spinner-border spinner-border-sm ml-2" role="status"
                                                aria-hidden="true"></span> Processing`
    }
    let time = new Date().toLocaleTimeString("en-us", { hour12: true, timeStyle: "short" });
    document.querySelector("#time").value = time;
    console.log()
</script>