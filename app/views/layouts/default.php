<!doctype html>
<html lang="en">
<head>
    <title><?=$this->siteTitle();?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=PROOT?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=PROOT?>css/custom.css">
    <!-- Bootstrap JS + JQuery -->
    <script src="<?=PROOT?>js/bootstrap.min.js"></script>
    <script src="<?=PROOT?>js/JQuery-3.5.1.min.js"></script>

    <?= $this->content('head');?>
</head>
<body>

    <?= $this->content('body');?>

</body>
</html>