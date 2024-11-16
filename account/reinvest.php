<?php
$title = "Reinvest";
require_once "./includes/header.php";
?>
<div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub">
                            <h2 class="nk-block-title fw-normal">Reinvestment</h2>
                        </div>
                        <div class="nk-block-des">
                            <p>Reinvestments are quick deposits made from your account balance to renew your contract.

                                <span class="text-primary"><em class="icon ni ni-info"></em></span>
                            </p>
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
                                        <a class="invest-cc-chosen " data-bs-toggle="dropdown">
                                            <div class="coin-item">
                                                <div class="coin-icon">
                                                    <em class="icon ni ni-sign-dollar"></em>
                                                </div>
                                                <?php
                                                $query2 = "SELECT * FROM users WHERE id = '$userid'";
                                                $res2 = mysqli_query($conn, $query2);
                                                $row = $res2->fetch_assoc();

                                                ?>
                                                <div class="coin-info">
                                                    <span class="coin-name">
                                                        Reinvest from my balance
                                                    </span>
                                                    <span class="coin-text">
                                                        <span class="wallet_sign">$</span>
                                                        <span id="user_balance" class="wallet_amount">
                                                            <?= $row['balance']; ?>
                                                        </span>
                                                        <input type="text" hidden name="balance"
                                                            value='<?= $row['balance']; ?>'>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>

                                    </div><!-- .dropdown -->
                                </div><!-- .invest-field -->

                                <div class="invest-field form-group">
                                    <?php
                                    $query2 = "SELECT * FROM plans WHERE id = 1";
                                    $res2 = mysqli_query($conn, $query2);
                                    $row = $res2->fetch_assoc();

                                    ?>
                                    <input type="hidden" value="silver" name="iv-plan" id="invest-choose-plan">
                                    <div class="dropdown invest-cc-dropdown">
                                        <a href="#" class="invest-cc-chosen dropdown-indicator selected-plan"
                                            data-bs-toggle="dropdown" data-id="<?= $row['id']; ?>">
                                            <div class="coin-item">
                                                <div class="coin-icon">
                                                    <em class="icon ni ni-offer-fill"></em>
                                                </div>

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
                                                $query2 = "SELECT * FROM plans";
                                                $res2 = mysqli_query($conn, $query2);
                                                while ($row = $res2->fetch_assoc()) {
                                                    ?>
                                                    <li class="invest-cc-item selected plans-list"
                                                        data-id="<?= $row['id']; ?>">
                                                        <a class="invest-cc-opt" data-plan="silver">
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
                                    <div class="form-label-group">
                                        <label class="form-label">Enter Amount to Reinvest</label>
                                    </div>
                                    <?php
                                    $query2 = "SELECT * FROM plans WHERE id = 1";
                                    $res2 = mysqli_query($conn, $query2);
                                    $row = $res2->fetch_assoc();
                                    ?>
                                    <div class="form-control-group">
                                        <div class="form-info amountCurr">USD</div>
                                        <input type="number" class="form-control form-control-amount form-control-lg"
                                            id="custom-amount" placeholder="<?= $row['min_deposit'] ?>.00" required
                                            min="<?= $row['min_deposit'] ?>" max="<?= $row['max_deposit'] ?>"
                                            name="amount">
                                        <input type="text" hidden name="plan" value='1' id="plan">
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

                                <button class="btn btn-lg btn-primary ttu w-100" name="reinvest" data-bs-toggle="modal"
                                    data-bs-target="#modalTabs" id="reinvest" style="text-align:center;display: flex;
    justify-content: center;">Reinvest</button>

                            </div><!-- .col -->

                        </div><!-- .row -->
                    </form>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
    <!-- <button class="btn btn-lg btn-primary ttu" name="" data-bs-toggle="modal" data-bs-target="#modalTabs" id="button"
        hidden>Create
        deposit</button>

    <button class="btn btn-lg btn-primary ttu" name="" data-bs-toggle="modal" data-bs-target="#modalAlert"
        id="modalAlertButton" hidden>Create
        deposit</button> -->
</div>
<script>
    let amountToReinvest = document.querySelector("#custom-amount");
    let userBalance = document.querySelector("#user_balance");
    const reinvestButton = document.querySelector("#reinvest");
    const plansList = document.querySelectorAll(".plans-list");
    const selectedPlan = document.querySelector(".selected-plan")
    // Preventing users from producing if amount they entered is greater than their balance
    amountToReinvest.onkeyup = (e) => {
        if (Number(amountToReinvest.value) > Number(userBalance.innerHTML)) {
            reinvestButton.disabled = true;
            amountToReinvest.style.outline = "red 1px solid"
            amountToReinvest.title = "Amount is greater than Balance"
        } else {
            reinvestButton.disabled = false;
        }

    }
    plansList.forEach(plan => {
        plan.onclick = () => {
            fetch(`./handlers/ajax.php?plans=${plan.dataset.id}`).then(e => e.json()).then(data => {
                amountToReinvest.placeholder = `${data.min_deposit}.00`
                amountToReinvest.min = `${data.min_deposit}.00`
                amountToReinvest.max = `${data.max_deposit}.00`
                document.querySelector("#minAmount").innerHTML = data.min_deposit;
                document.querySelector("#maxAmount").innerHTML = data.max_deposit;
                document.querySelector("#plan").value = data.id;

                selectedPlan.querySelector(".coin-item").innerHTML = plan.querySelector(".coin-item").innerHTML
                selectedPlan.dataset.id = data.id;

                plansList.forEach(plan => {
                    if (plan.dataset.id == data.id) {
                        plan.style.display = "none";
                    } else {
                        plan.style.display = "block";
                    }
                })

            })

        }
    })

    // hiding plan list that are already selected
    plansList.forEach(planList => {
        if (planList.dataset.id == selectedPlan.dataset.id) {
            planList.style.display = "none";
        }
    })
</script>
<?php
require_once "./includes/footer.php";
?>