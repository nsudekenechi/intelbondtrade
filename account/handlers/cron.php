<?php
require_once dirname(dirname(__DIR__)) . '/db/db_connect.php';
// Updating profits
$q = "SELECT deposits.id  deposit_id, deposits.start_date,deposits.end_date, plans.increase, deposits.amount,deposits.last_profit, deposits.user FROM deposits 
     JOIN plans ON deposits.plan = plans.id  WHERE  deposits.active=true AND deposits.verified = true";
$res = mysqli_query($conn, $q);
if ($res->num_rows > 0) {

    while ($r = $res->fetch_assoc()) {
        $deposit_id = $r['deposit_id'];
        $userid = $r['user'];
        $currDate = new DateTime(date('d-M-Y h:i'));
        $startDate = new DateTime(date("d-M-Y h:i", strtotime($r["start_date"] . '+24 hours')));
        $endDate = new DateTime($r["end_date"]);
        if (!$r['last_profit']) {
            if ($currDate->diff($startDate)->h <= 0) {
                updateProfit($r, $conn, $userid, $deposit_id, $currDate->format('d-M-Y h:i'));
            }
        } else {
            $profitDate = new DateTime($r['last_profit']);
            // Checking if its 24 hours based on last profit date
            if ($currDate->diff($profitDate)->h <= 0 && $currDate->format('d-M-Y') != $profitDate->format('d-M-Y')) {
                updateProfit($r, $conn, $userid, $deposit_id, $currDate->format('d-M-Y h:i'));
                // Stopping deposit if plan have expired
                if ($currDate->diff($endDate)->h <= 0) {
                    $q1 = "UPDATE deposits SET active=false WHERE id = '$deposit_id'";
                    $res1 = mysqli_query($conn, $q1);
                }
            }


        }

    }
}

function updateProfit($r, $conn, $userid, $deposit_id, $currDate)
{

    // Updaing user's balance to new profit
    $pr = $r['amount'] * ($r['increase'] / 100);
    $q1 = "UPDATE users SET balance = balance + $pr, profits = profits + $pr  WHERE id = '$userid'";
    $res1 = mysqli_query($conn, $q1);

    // Updating last's profit so that users cant get multiple profits in one day
    $q1 = "UPDATE deposits SET last_profit='$currDate' WHERE id='$deposit_id' AND active = true";
    $res1 = mysqli_query($conn, $q1);

    if ($res1) {
        echo "Done";
    }
}
