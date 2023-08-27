<!DOCTYPE html>
<html lang="en">
<head>
<head>
        <meta charset="utf-8">
        <title>Update</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:title" content="">
        <meta property="og:type" content="">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <link rel="icon" href="../img/profile.png" type="image/svg+xml">
        <link rel="stylesheet" href="../css/all.min.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/style.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/swiper-bundle.min.css">
        <link rel="manifest" href="site.webmanifest">
        <meta name="theme-color" content="#fafafa">
    </head>
</head>
<body>
    <div class="container user-update-container">
        <p>Information changed successfully!</p>
        <p>You will return to panel in <span id="countdown"></span></p>
        <a href="./user-panel.php">return now</a>
    </div>
    <script>
let countdownTime = 5;

const countdown = setInterval(function() {
  document.getElementById("countdown").innerHTML = `Redirecting in ${countdownTime} seconds...`;
  countdownTime--;

  if (countdownTime < 0) {
    clearInterval(countdown);
    window.location.href = "./user-panel.php";
  }
}, 1000);
</script>
</body>
</html>