<?php
use Core\FH;
?>
<!doctype html>
<html lang="en">
<head>
    <title><?= $this->getSiteTitle(); ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= PROOT ?>css/custom.css">
    <link rel="stylesheet" href="<?= PROOT ?>css/nav-bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= PROOT ?>fonts/Roboto.css">
    <!-- JS -->
    <script src="<?= PROOT ?>js/rankingsAPIscript.js" defer></script>
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
        <?= FH::generateMenu()?>
    </nav>
</div>

<?= $this->content('body'); ?>

<footer class="footer text-center">
    <ul id="githubList">
        <li class="margins-githubList"><a id="documentationLink1" href="https://github.com/gotursix">Grigorean Valentin</a></li>
        <li class="margins-githubList"><a id="documentationLink2" href="https://github.com/ser13ban">Șerban Mihai</a></li>
        <li class="margins-githubList"><a id="documentationLink3" href="https://github.com/teodorovicigavril">Teodorovici Gavril</a></li>
    </ul>
    <a class="padding-footer" id="documentationLink" href="<?=PROOT?>home/documentation">Documentation</a>
    <small class="padding-footer">&copy; Copyright <script>document.write(new Date().getFullYear())</script>, Vanilla Team </small>
</footer>

<script>
    let mainNav = document.getElementById("js-menu");
    let navBarToggle = document.getElementById("js-navbar-toggle");
    navBarToggle.addEventListener("click", function () {
        mainNav.classList.toggle("active");
    });
</script>
</body>
</html>