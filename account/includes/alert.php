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


} else if (isset($_GET["withdraw"])) {
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
?>