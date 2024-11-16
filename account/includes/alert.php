<?php
if (isset($_GET["insufficient"])) {
    switch ($_GET["insufficient"]) {
        case "true":
            ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Insufficient Funds',
                    text: `Please deposit more to withdraw`,
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
            <?php
            break;
    }


}
if (isset($_GET["withdraw"])) {
    switch ($_GET["withdraw"]) {
        case "s":
            ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Withdrawal Request Successful',
                    text: `You would be funded within the next 24 hours`,
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        <?php
    }
}

if (isset($_GET["reinvest"])) {
    switch ($_GET["reinvest"]) {
        case "s":
            ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Reinvest  Successful',
                    text: `Your reinvestment was successful.`,
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
            <?php
            break;

        case "f":
            ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Reinvest  Failed',
                    text: `Something went wrong, try again.`,
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
            <?php
            break;

        case "bf":
            ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Reinvest  Failed',
                    text: `Invested amount  greater than balance`,
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
            <?php
            break;




    }

}
?>