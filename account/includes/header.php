<?php
require_once ("../db/db_connect.php");
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
}
$title;
$userid = $_SESSION["user"];

// Sending user to invest page, if he's balance is not greater than 0 and he tries to withdraw
if ($title == "Withdraw") {
    $query = "SELECT balance FROM users WHERE id='$userid'";
    $res = mysqli_query($conn, $query);
    $userBalance = $res->fetch_column();
    if ($userBalance < 1) {
        header("Location: ./invest.php?insufficient=true");
    }

}
$query = "SELECT * FROM users WHERE id='$userid'";
$res = mysqli_query($conn, $query);
$row = $res->fetch_assoc();

if ($res->num_rows <= 0) {
    header("Location: ../login.php");
}

?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <!-- <base href="../../"> -->
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>
        <?= $title; ?> | Intelbondtrade Admin
    </title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.2.2">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.2.2">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"
        integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="nk-body npc-invest bg-lighter ">

    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <div class="nk-header nk-header-fluid nk-header-fixed is-theme">
                <div class="container-xl wide-lg">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger me-sm-2 d-lg-none">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em
                                    class="icon ni ni-menu"></em></a>
                        </div>
                        <div class="nk-header-brand">
                            <a href="./" class="logo-link">

                            </a>
                        </div><!-- .nk-header-brand -->
                        <div class="nk-header-menu" data-content="headerNav">
                            <div class="nk-header-mobile">
                                <div class="nk-header-brand">
                                    <a href="./" class="logo-link">
                                        <h1 style="font-size:1.5rem ;">
                                            intelbond<span class='in-text-gradiant' style="background: linear-gradient(to right, #0163ea, #00bcf9);
;   background-clip: text; -webkit-text-fill-color: transparent;">trade</span>
                                        </h1>
                                        <!-- <img class="logo-light logo-img" src="./images/logo.png"
                                            srcset="./images/logo2x.png 2x" alt="logo">
                                        <img class="logo-dark logo-img" src="./images/logo-dark.png"
                                            srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                        <span class="nio-version">Invest</span> -->
                                    </a>
                                </div>
                                <div class="nk-menu-trigger me-n2">
                                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em
                                            class="icon ni ni-arrow-left"></em></a>
                                </div>
                            </div>
                            <!-- Menu -->
                            <ul class="nk-menu nk-menu-main">
                                <li class="nk-menu-item">
                                    <a href="./index.php" class="nk-menu-link">
                                        <span class="nk-menu-text">Overview</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="./myplan.php" class="nk-menu-link">
                                        <span class="nk-menu-text">MY Plan</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="./invest.php" class="nk-menu-link">
                                        <span class="nk-menu-text">Invest</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="./profile.php" class="nk-menu-link">
                                        <span class="nk-menu-text">Profile</span>
                                    </a>
                                </li>
                                <!-- <li class="nk-menu-item  has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-text">Pages</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/invest/welcome.html" class="nk-menu-link">
                                                <span class="nk-menu-text">Welcome / Intro</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/invest/invest-form.php" class="nk-menu-link">
                                                <span class="nk-menu-text">Investment Process</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/invest/scheme-details.html" class="nk-menu-link">
                                                <span class="nk-menu-text">Investment Details</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/invest/kyc-application.html" class="nk-menu-link">
                                                <span class="nk-menu-text">KYC - Get Started</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/invest/kyc-form.html" class="nk-menu-link">
                                                <span class="nk-menu-text">KYC - Application Form</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/index.php" class="nk-menu-link">
                                                <span class="nk-menu-text">Main Dashboard <em
                                                        class="icon ni ni-external"></em> </span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components.html" class="nk-menu-link">
                                                <span class="nk-menu-text">All Components <em
                                                        class="icon ni ni-external"></em></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li> -->
                            </ul>
                        </div><!-- .nk-header-menu -->
                        <div class="nk-header-tools">
                            <ul class="nk-quick-nav">
                                <li class="dropdown notification-dropdown">
                                    <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                        <div class="icon-status icon-status-info">
                                            <em class="icon ni ni-bell"></em>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end dropdown-menu-s1">
                                        <div class="dropdown-head">
                                            <span class="sub-title nk-dropdown-title">Notifications</span>
                                        </div>
                                        <div class="dropdown-body">
                                            <div class="nk-notification">
                                                <?php
                                                $qu = "SELECT notifications.time, notifications.message, plans.name FROM notifications 
                                                JOIN plans
                                                ON plans.id = notifications.plan
                                                WHERE user='$userid'";
                                                $rs = mysqli_query($conn, $qu);
                                                $currDate = new DateTime(date("d-M-Y h:i"));
                                                if ($rs->num_rows) {
                                                    while ($rw = $rs->fetch_assoc()) {
                                                        $notificationDate = new DateTime($rw['time']);
                                                        $diff = $notificationDate->diff($currDate);

                                                        ?>
                                                        <div class="nk-notification-item dropdown-inner">
                                                            <div class="nk-notification-icon">
                                                                <em
                                                                    class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                            </div>
                                                            <div class="nk-notification-content">
                                                                <div class="nk-notification-text">
                                                                    <?= $rw['message']; ?> for
                                                                    <?= $rw['name']; ?> plan

                                                                </div>
                                                                <div class="nk-notification-time">
                                                                    <?php
                                                                    if ($diff->m > 0) {
                                                                        echo $diff->m == 1 ? $diff->m . " month " : $diff->m . "  months ";
                                                                    } else if ($diff->d > 0) {
                                                                        echo $diff->d == 1 ? $diff->d . " day " : $diff->d . "  days ";
                                                                    } else if ($diff->h > 0) {
                                                                        echo $diff->h == 1 ? $diff->h . " hour " : $diff->h . "  hours ";
                                                                    } else if ($diff->i > 0) {
                                                                        echo $diff->i == 1 ? $diff->i . " minute " : $diff->i . "  minutes ";
                                                                    } else if ($diff->s > 0) {
                                                                        echo $diff->s == 1 ? $diff->s . " second " : $diff->s . " seconds ";
                                                                    }
                                                                    ?>
                                                                    ago
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">
                                                                There are no notifcations at the moment
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div><!-- .nk-notification -->
                                        </div><!-- .nk-dropdown-body -->
                                        <?php
                                        if ($rs->num_rows) {
                                            ?>
                                            <div class="dropdown-foot center">
                                                <a href="#" id="deleteAll">Delete All</a>
                                            </div>
                                            <script>
                                                let deleteAll = document.querySelector("#deleteAll");
                                                deleteAll.onclick = () => {
                                                    fetch("./handlers/delete.php?deleteNotifcation").then(e => e.text()).then(e => {
                                                        document.querySelectorAll(".nk-notification-item").forEach(item => {
                                                            item.remove()
                                                        })
                                                        document.querySelector(".nk-notification").innerHTML = `
                                                                                                                                                                                                                                                                                                                <div class="nk-notification-item dropdown-inner">
                                                                                                                                                                                                                                                                                                                                                <div class="nk-notification-content">
                                                                                                                                                                                                                                                                                                                                                    <div class="nk-notification-text">
                                                                                                                                                                                                                                                                                                                                                    No Notifcations
                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                `
                                                    })
                                                }
                                            </script>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </li><!-- .dropdown -->
                                <li class="dropdown language-dropdown d-none d-sm-flex me-n1">
                                    <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                        <div class="quick-icon">
                                            <img class="icon" src="./images/flags/english-sq.png" alt="">
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                                        <ul class="language-list">
                                            <li>
                                                <a href="#" class="language-item">
                                                    <img src="./images/flags/english.png" alt="" class="language-flag">
                                                    <span class="language-name">English</span>
                                                </a>
                                            </li>
                                            <!-- <li>
                                                <a href="#" class="language-item">
                                                    <img src="./images/flags/spanish.png" alt="" class="language-flag">
                                                    <span class="language-name">Español</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="language-item">
                                                    <img src="./images/flags/french.png" alt="" class="language-flag">
                                                    <span class="language-name">Français</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="language-item">
                                                    <img src="./images/flags/turkey.png" alt="" class="language-flag">
                                                    <span class="language-name">Türkçe</span>
                                                </a>
                                            </li> -->
                                        </ul>
                                    </div>
                                </li><!-- .dropdown -->
                                <li class="hide-mb-sm"><a href="./handlers/logout.php" class="nk-quick-nav-icon"><em
                                            class="icon ni ni-signout"></em></a></li>
                                <li class="dropdown user-dropdown order-sm-first">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <div class="user-toggle">
                                            <div class="user-avatar sm">
                                                <em class="icon ni ni-user-alt"></em>
                                            </div>
                                            <div class="user-info d-none d-xl-block">
                                                <div class="user-status user-status-verified">Verified</div>
                                                <div class="user-name dropdown-indicator">
                                                    <?= $row['fullname']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div
                                        class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1 is-light">
                                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                            <div class="user-card">
                                                <div class="user-avatar">

                                                    <span>
                                                        <?php
                                                        if (strstr($row['fullname'], ' ')) {
                                                            echo $row['fullname'][0] . explode(" ", $row['fullname'])[1][0];
                                                        } else {
                                                            echo $row['fullname'][0] . substr($row['fullname'], -1);
                                                        }
                                                        ?>


                                                    </span>

                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">
                                                        <?= $row['fullname']; ?>
                                                    </span>
                                                    <span class="sub-text">
                                                        <?= $row['email']; ?>
                                                    </span>
                                                </div>
                                                <div class="user-action">
                                                    <a class="btn btn-icon me-n2" href="profile-setting.php"><em
                                                            class="icon ni ni-setting"></em></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-inner user-account-info">
                                            <h6 class="overline-title-alt">Account Balance</h6>
                                            <div class="user-balance">
                                                <?= number_format($row['balance'], 2); ?> <small
                                                    class="currency currency-usd">USD</small>
                                            </div>

                                            <a href="#" class="link"><span>Withdraw Balance</span> <em
                                                    class="icon ni ni-wallet-out"></em></a>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="./profile.php"><em
                                                            class="icon ni ni-user-alt"></em><span>View
                                                            Profile</span></a></li>
                                                <li><a href="profile-setting.php"><em
                                                            class="icon ni ni-setting-alt"></em><span>Account
                                                            Setting</span></a></li>
                                                <!-- <li><a href="html/invest/profile-activity.html"><em
                                                            class="icon ni ni-activity-alt"></em><span>Login
                                                            Activity</span></a></li> -->
                                                <li><a class="dark-switch" href="#"><em
                                                            class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="./handlers/logout.php"><em
                                                            class="icon ni ni-signout"></em><span>Sign
                                                            out</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li><!-- .dropdown -->
                            </ul><!-- .nk-quick-nav -->
                        </div><!-- .nk-header-tools -->
                    </div><!-- .nk-header-wrap -->
                </div><!-- .container-fliud -->
            </div>
            <!-- main header @e -->
            <h1 hidden>
                <?= $_SESSION["user"]; ?>
            </h1>