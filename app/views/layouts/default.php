<!doctype html>
<html lang="en">
<head>
    <title><?=$this->getSiteTitle();?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="<?=PROOT?>css/custom.css">
    <?= $this->content('head');?>
</head>
<body>
    <nav class="nav">
        <ul class="nav__list nav__list-left">

                <li class="nav__list--button"><a href="#">Home</a></li>
                <li class="nav__list--button"><a href="#">Rankings</a></li>
        </ul>
        <ul class="nav__list nav__list-right">
            <img
                src="img/default-user-image.png"
                alt="user image"
                class="user-nav__user-photo"
            />
            <span class="user-nav__user-name">User name</span>
        </ul>
    </nav>

    <?= $this->content('body');?>
</body>
</html>