<?php
require_once './config.php';

if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    $query = "SELECT *
    FROM jobs
    LEFT OUTER JOIN job_categories ON jobs.job_id = job_categories.job_id
    LEFT OUTER JOIN categories ON job_categories.category_id = categories.category_id
    LEFT OUTER JOIN users ON jobs.poster_id = users.user_id
    WHERE jobs.job_id = $job_id;
    ";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $job = mysqli_fetch_assoc($result);
        $title = $job['job_title'];
    } else {
        $title = 'Job Not Found';
    }
} else {
    $title = 'Invalid Request';
}

$title = '';
?>

<!DOCTYPE html>
<html lang="en">
    <?php include './head.php' ?>
    <body>
        <?php include './header.php' ?>
        <div
            class="container d-flex flex-column justify-content-center align-items-center"
            style="height: 100vh;">
            <div class="single-job-box col-lg-10">
                <h1 class="single-job-header"><?php echo $job['job_title']; ?></h1>
                <ul>
                    <li><?php echo $job['category_name']; ?></li>
                    <li>
                        <span
                            class="contact-info"
                            data-contact="<?php echo $job['job_contact_info']; ?>">
                            <?php echo $job['job_contact_info']; ?>
                        </span>
                    </li>
                    <li><?php echo $job['username']; ?></li>
                    <li><?php echo $job['job_description']; ?></li>
                    <li><?php echo $job['job_address']; ?></li>
                </ul>
                <a href="./jobs.php" class="job-box-link">Back to Jobs List</a>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const contactInfoElements = document.querySelectorAll(".contact-info");

                contactInfoElements.forEach(element => {
                    element.addEventListener("click", function () {
                        const contactInfo = this.getAttribute("data-contact");

                        if (isValidEmail(contactInfo)) {
                            window.location.href = "mailto:" + contactInfo;
                        } else if (isValidPhoneNumber(contactInfo)) {
                            window.location.href = "tel:" + contactInfo;
                        } else {
                            alert("Invalid contact information.");
                        }
                    });
                });

                function isValidEmail(email) {
                    const emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}$/;
                    return emailPattern.test(email);
                }

                function isValidPhoneNumber(phoneNumber) {
                    const phonePattern = /^\d{10}$/; // Adjust the pattern based on your phone number format
                    return phonePattern.test(phoneNumber);
                }
            });
        </script>

        <?php include './footer.php' ?>
    </body>
</html>