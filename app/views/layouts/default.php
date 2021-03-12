<!doctype html>
<html lang="en">
<head>
    <title><?= $this->getSiteTitle(); ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= PROOT ?>css/custom.css">
    <link rel="stylesheet" href="<?= PROOT ?>css/nav-bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JS -->
    <script src="<?= PROOT ?>js/custom.js"></script>
    <?= $this->content('head'); ?>
</head>
<body>

<div class="nav-wrapper">
    <div class="grad-bar"></div>
    <nav class="navbar">
        <div class="navbar-toggle" id="js-navbar-toggle">
            <i class="fa fa-bars fix-menu"></i>
        </div>
        <a href="<?= PROOT ?>">
            <img src="<?= PROOT ?>img/logo.png" class="logo" alt="Company Logo">
        </a>
        <ul class="main-nav" id="js-menu">
            <li>
                <a href="<?= PROOT ?>" class="nav-links">Home</a>
            </li>

            <li>
                <a href="#" class="nav-links">Rankings</a>
            </li>
            <li>
                <a href="#" class="nav-links">Welcome, Steel balls</a>
            </li>
        </ul>
    </nav>

    <?= $this->content('body'); ?>

    <script>
        let mainNav = document.getElementById("js-menu");
        let navBarToggle = document.getElementById("js-navbar-toggle");
        navBarToggle.addEventListener("click", function () {
            mainNav.classList.toggle("active");
        });
    </script>
</body>
</html>