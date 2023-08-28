<?php
$title = 'User Info Update';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include './head.php' ?>
    <body>
        <div class="container user-update-container">
            <p>Information changed successfully!</p>
            <p>You will return to panel in
                <span id="countdown"></span></p>
            <a href="./user-panel.php">return now</a>
        </div>
        <script>
            let countdownTime = 5;

            const countdown = setInterval(function () {
                document
                    .getElementById("countdown")
                    .innerHTML = `Redirecting in ${countdownTime} seconds...`;
                countdownTime--;

                if (countdownTime < 0) {
                    clearInterval(countdown);
                    window.location.href = "./user-panel.php";
                }
            }, 1000);
        </script>
    </body>
</html>