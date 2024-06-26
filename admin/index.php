<?php
require_once ("../db/db_connect.php");
require_once ("../vendor/autoload.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function that allows admin send withdrawal success email to user
function sendEmail($to, $subject, $emailFile, $search, $replace)
{

    $mail = new PHPMailer(true);

    try {
        $senderemail = "nsudekenechi2@gmail.com";
        $senderpassword = "bobfqerepcurarhh";
        $senderFrom = "Intelbondtrade";
        $body = file_get_contents($emailFile);
        $body = str_replace($search, $replace, $body);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com;';
        $mail->SMTPAuth = true;
        $mail->Username = $senderemail;
        $mail->Password = $senderpassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('Intelbondtrade@support.com', $senderFrom);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->send();
        return true;

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// if (isset($_GET["verify"])) {
//     $id = $_GET["verify"];
//     if (isset($_GET["request"])) {
//         $query = "SELECT users.email, users.username  
//         FROM withdrawal 
//         JOIN users 
//         ON withdrawal.user = users.id 
//         WHERE withdrawal.id='$id' AND withdrawal.verified = false";
//         $res = mysqli_query($conn, $query);
//         if ($res->num_rows > 0) {
//             $row = $res->fetch_assoc();
//             $msg = html_entity_decode(" <p style='margin-bottom: 10px;'> Your withdrawal request have been verified successfully.</p>  <p style='margin-bottom: 10px;'>You can check your wallet</p>");
//             $send = sendEmail($row["email"], "Withdrawal Verified", "../email.html", ["{request type}", "{name}", "{body}", "{date}"], ["Withdrawal", $row["username"], $msg, date("Y")]);
//             if ($send) {
//                 $query = "UPDATE withdrawal SET verified = true WHERE id = '$id'";
//                 $res = mysqli_query($conn, $query);
//             }
//         }


//     } else {
//         $query = "SELECT deposits.amount, deposits.user  FROM deposits JOIN users ON deposits.user=users.id WHERE deposits.id = '$id'";
//         $res = mysqli_query($conn, $query);
//         $row = $res->fetch_assoc();
//         $amount = $row['amount'];
//         $user = $row['user'];
//         // Updating users account
//         $query = "UPDATE users SET balance = balance + $amount, invested = invested + $amount WHERE id='$user'";
//         $res = mysqli_query($conn, $query);
//         // Verifying deposit
//         $query = "UPDATE deposits SET verified = true WHERE id = '$id'";
//         $res = mysqli_query($conn, $query);
//         // Checking if user was reffered so we add 10% to the user who referred him
//         $query = "SELECT  user FROM referrals WHERE ref_user='$user' AND ref_earned  = 0";
//         $res = mysqli_query($conn, $query);

//         if ($res->num_rows > 0) {
//             $profit = $amount * (10 / 100);
//             $referrer = $res->fetch_column();
//             $query = "UPDATE users SET balance = balance + $profit WHERE id='$referrer'";
//             $res = mysqli_query($conn, $query);

//             $query = "UPDATE referrals  SET ref_earned = $profit WHERE ref_user='$user'";
//             $res = mysqli_query($conn, $query);
//         }
//     }

//     if ($res) {
//         header("Location: ./index.php");
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../account/assets/css/dashlite.css?ver=3.2.2">
    <link rel="stylesheet" href="../account/assets/css/theme.css?ver=3.2.2">
    <style>
        .modal-content img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .proof_image {
            position: absolute;
            left: 0%;
            top: 0%;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, .3);
            z-index: 10;
            display: none;
        }

        .proof_image img {
            width: 80%;
            height: 80%;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST["verify"])) {
        ?>
        <script>alert(1)</script>
        <?php
    }
    ?>
    <div class="container py-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#tabItem5"><em
                        class="icon ni ni-user"></em><span>Deposit Requests</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tabItem6"><em
                        class="icon ni ni-lock-alt"></em><span>Withdrawal Requests</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tabItem7"><em class="icon ni ni-users"></em>
                    <span>Referrals</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tabItem8"><em class="icon ni ni-users"></em>
                    <span>Suspend User</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tabItem5">
                <div class="table-responsive">
                    <table class="datatable-init table">
                        <thead>
                            <tr>
                                <th>Proof Payment</th>
                                <th></th>

                                <th>Fullname</th>
                                <th>Date</th>
                                <th>Amount</th>

                                <th>Status</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT deposits.id,users.fullname, deposits.start_date, deposits.amount, deposits.verified, deposits.payment_proof, wallet.wallet_symbol, wallet.wallet_rate 
                                 FROM deposits 
                                 JOIN users ON deposits.user=users.id
                                JOIN wallet ON deposits.wallet = wallet.id
                                WHERE deposits.payment_proof != ''  ORDER BY deposits.id DESC ";
                            $res = mysqli_query($conn, $query);
                            while ($row = $res->fetch_assoc()) {
                                ?>
                                <tr class="tr">
                                    <td>

                                        <span class="view_proof_image" data-view="<?= $row['id']; ?>">View</span>
                                        <div class="proof_image" id="img<?= $row['id']; ?>">
                                            <img src="../account/images/paymentProof/<?= $row['payment_proof']; ?>" alt=""
                                                class="">
                                        </div>



                                    </td>
                                    <td>
                                        <?php
                                        if ($row['verified']) {
                                            ?>
                                            <a class="btn btn-sm btn-success">Verified</a>
                                            <?php
                                        } else {
                                            ?>
                                            <input type="text" name="deposit" value="<?= $row["id"]; ?>" hidden>
                                            <button class="btn btn-sm btn-primary verify_deposit"
                                                name="verify_deposit">Verify</button>
                                            <?php
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <span class="f_name"> <?= $row['fullname']; ?></span>
                                    </td>
                                    <td>
                                        <?= $row['start_date']; ?>
                                    </td>
                                    <td>
                                        <?= number_format($row['amount'] * $row['wallet_rate'], intval($row['amount'] * $row['wallet_rate'], ) == 0 ? 5 : 2); ?>
                                    </td>

                                    <td>
                                        <?php
                                        if ($row['verified']) {
                                            ?>
                                            <span class="badge badge-dot bg-success ">Complete</span>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="badge badge-dot bg-warning status">Pending</span>
                                            <?php
                                        }
                                        ?>
                                    </td>



                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="tab-pane" id="tabItem6">
                <div class="table-responsive">
                    <table class="datatable-init table">
                        <thead>
                            <th>Fullname</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Wallet Type</th>
                            <th> Wallet Address</th>

                            <th></th>
                        </thead>

                        <tbody>
                            <?php
                            $query = "SELECT  withdrawal.id,withdrawal.wallet_address, withdrawal.amount, withdrawal.date, withdrawal.verified,
                             users.fullname, wallet.wallet_name, 
                             wallet.wallet_symbol, wallet.wallet_rate
                              FROM withdrawal 
                              JOIN users ON users.id = withdrawal.user 
                              JOIN wallet ON wallet.id = withdrawal.wallet_type
                               ORDER BY id DESC";
                            $res = mysqli_query($conn, $query);
                            while ($row = $res->fetch_assoc()) {
                                $rand = rand(0, 100000);
                                ?>
                                <tr>
                                    <td>
                                        <?= $row['fullname']; ?>

                                    </td>
                                    <td>
                                        <?= $row["date"]; ?>
                                    </td>
                                    <td>
                                        <?= number_format($row['amount'] * $row['wallet_rate'], intval($row['amount'] * $row['wallet_rate'], ) == 0 ? 5 : 2); ?>
                                    </td>
                                    <td>
                                        <?= $row["wallet_name"]; ?>
                                    </td>

                                    <td>

                                        <div class="dropdown">
                                            <div class="nk-refwg-url ">
                                                <div class="form-control-wrap">

                                                    <input type="text" class="form-control copy-text " id="refUrl<?= $rand ?>"
                                                        value="<?= $row['wallet_address']; ?>" readonly="">
                                                    <div class="form-clip clipboard-init"
                                                        data-clipboard-target="#refUrl<?= $rand ?>" data-success="Copied"
                                                        data-text="Copy Link"><em
                                                            class="clipboard-icon icon ni ni-copy"></em> <span
                                                            class="clipboard-text">Copy Address</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="tb-odr-btns  d-md-inline">
                                            <?php
                                            if ($row['verified']) {
                                                ?>
                                                <a class="btn btn-sm btn-success">Verified</a>
                                                <?php
                                            } else {
                                                ?>
                                                <input type="text" name="withdraw" value="<?= $row["id"]; ?>" hidden>
                                                <button class="btn btn-sm btn-primary verify_deposit"
                                                    name="verify_withdraw">Verify</button>
                                                <?php
                                            }
                                            ?>

                                        </div>

                                    </td>

                                </tr>
                                <?php
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane" id="tabItem7">
                <div class="table-responsive">
                    <table class="datatable-init table">
                        <thead>
                            <tr>
                                <th>Referral</th>
                                <th>Referred User</th>
                                <th>Date</th>
                                <th>Amount Earned</th>
                                <th>Amount Deposited</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT users.username, referredUser.username as ref_user, referredUser.id as refUserId,  referrals.date,  referrals.ref_earned
                        FROM referrals JOIN users ON referrals.user = users.id
                        JOIN users AS referredUser ON referrals.ref_user = referredUser.id
                        ";
                            $res = mysqli_query($conn, $query);
                            while ($row = $res->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?= $row['username']; ?></td>
                                    <td><?= $row['ref_user']; ?></td>
                                    <td><?= $row['date']; ?></td>
                                    <td>$<?= number_format($row['ref_earned'], 2); ?></td>
                                    <td>
                                        <?php
                                        $refUserId = $row['refUserId'];
                                        $q = "SELECT amount FROM deposits WHERE user= '$refUserId' LIMIT 1";
                                        $qres = mysqli_query($conn, $q);
                                        $amountDeposited = $qres->fetch_column();

                                        ?>
                                        $<?= number_format($amountDeposited, 2); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane" id="tabItem8">
                <div class="table-responsive">
                    <table class="datatable-init table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT id,username,fullname, email,suspend FROM users WHERE admin=false";
                            $res = mysqli_query($conn, $query);
                            while ($row = $res->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?= $row['username']; ?></td>
                                    <td><?= $row['fullname']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td>

                                        <input type="text" name="user" value="<?= $row["id"]; ?>" hidden>
                                        <?php
                                        if (!$row["suspend"]) {
                                            ?>
                                            <button class="btn btn-sm btn-danger verify_deposit" name="suspend_user">
                                                Suspend
                                            </button>
                                            <?php
                                        } else {
                                            ?>
                                            <button class="btn btn-sm btn-primary verify_deposit" name="suspend_user">
                                                Unsuspend
                                            </button>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <script src="../account/assets/js/bundle.js?ver=3.2.2"></script>
    <script src="../account/assets/js/scripts.js?ver=3.2.2"></script>
    <!-- <script src="../account/js/libs/datatable-btns.js?ver=3.2.2"></script> -->
    <script>
        // viewing proof image
        let views = document.querySelectorAll(".view_proof_image")
        let imgs = document.querySelectorAll(".proof_image")
        views.forEach(view => {
            view.onclick = () => {
                document.querySelector(`#img${view.dataset.view}`).style.display = "flex";
            }
        })
        imgs.forEach(img => {
            img.onclick = () => {
                img.style.display = "none"
            }
        })
        let tableRows = document.querySelectorAll("tr");
        tableRows.forEach(row => {
            let submitting = false;
            let btn =row.querySelector(".verify_deposit");
            let span =row.querySelector(".badge")
             if(btn){
                 btn.onclick = (e) => {
                // Storing innerHTML of suspend user button, to know whether to display suspend or unsuspend when user clicks on button
                let suspendUserContent = "";
                if (btn.name == "suspend_user") {
                    suspendUserContent = btn.innerHTML;
                }

                if (submitting) {
                    e.preventDefault();
                }
                btn.innerHTML = `<span class="spinner-border spinner-border-sm ml-2" role="status"  aria-hidden="true"></span>`
                submitting = true;
                fetch(`./handler.php?${btn.name}=${btn.previousElementSibling.value}`).then(res => res.text()).then(data => {
                    if (data) {
                        // Verifying deposit
                        if (btn.name == "verify_deposit") {
                            btn.innerHTML = "Verified";
                            btn.classList.replace("btn-primary", "btn-success")
                            if(span){
                                span.innerHTML = "Complete";
                            span.classList.replace("bg-warning", "bg-success");
                            }
                        } else if (btn.name == "verify_withdraw") {
                            btn.innerHTML = "Verified";
                            btn.classList.replace("btn-primary", "btn-success")
                        } else if (btn.name == "suspend_user") {
                            if (suspendUserContent.trim() == "Suspend") {
                                btn.innerHTML = "Unsuspend";
                                btn.classList.replace("btn-danger", "btn-primary")
                            } else {
                                btn.innerHTML = "Suspend";
                                btn.classList.replace("btn-primary", "btn-danger")
                            }
                        }

                    }
                })




            }
        }
       
        })
    </script>
</body>

</html>