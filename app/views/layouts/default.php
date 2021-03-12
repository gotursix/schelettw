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
    <!-- JS -->
    <script src="<?= PROOT ?>js/custom.js"></script>
    <?= $this->content('head'); ?>
</head>
<body>

<div class="nav-wrapper">
    <div class="grad-bar"></div>
    <nav class="navbar">
        <img src="<?= PROOT ?>img/logo.png" alt="Company Logo">
        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <ul class="nav no-search">
            <li class="nav-item"><a href="#">Home</a></li>
            <li class="nav-item"><a href="#">Rankings</a></li>

        </ul>
    </nav>
</div>
<?= $this->content('body'); ?>
</body>
</html>