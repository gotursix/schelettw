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
    <link rel="stylesheet" href="<?= PROOT?>fonts/Roboto.css">
    <!-- JS -->
    <script src="<?= PROOT ?>js/custom.js"></script>
    <?= $this->content('head'); ?>
</head>
<body>

<?php
 $menu = Router::getMenu('menu_acl');
 $currentPage = currentPage();
?>

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
            <?php foreach ($menu as $key => $val):
                $active = ''?>
                <?php if (is_array($val)): ?>
                <?php else:
                    $active = ($val == $currentPage) ? 'active':'';
                ?>
                <li><a class="nav-links <?$active?>" href="<?=$val?>"> <?=$key?> </a></li>
                <?php endif; ?>

            <?php endforeach; ?>

            <li>
                <a href="#" class="nav-links">Rankings</a>
            </li>

            <?php if (Users::currentUser()): ?>
            <li>
                <a href="#" class="nav-links">Welcome, <?=Users::currentUser()->fname?></a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

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