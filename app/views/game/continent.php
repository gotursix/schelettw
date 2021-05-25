<?php

use Core\FH;
use Core\H;
use Core\Session;

?>

<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?= PROOT ?>css/map.css">
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container">
    <h1 class="text-center text red">John would like to travel to a continent, please choose one</h1>

    <div class="map">
        <a href="<?= PROOT ?>game/story/america"
           class="continent america">America</a>
        <a href="<?= PROOT ?>game/story/europe"
           class="continent europe">Europe</a>
        <a href="<?= PROOT ?>game/story/asia"
           class="continent asia">Asia</a>
        <a href="<?= PROOT ?>game/story/africa"
           class="continent africa">Africa</a>
        <a href="<?= PROOT ?>game/story/australia"
           class="continent australia">Australia</a>
    </div>


    <!-- 
    <p> Map goes scrr</p>
     <img src="https://scontent.fotp7-2.fna.fbcdn.net/v/t1.15752-9/190287445_1193184951112518_5464832445047594616_n.png?_nc_cat=108&ccb=1-3&_nc_sid=ae9488&_nc_ohc=G_eU437OJq8AX8HBTI2&_nc_ht=scontent.fotp7-2.fna&oh=7d78fe1e015308e54c49181cf24c655f&oe=60CF1C20"
         style="max-height: 300px">
    <div class="container-buttons-diff" id="diff-buttons">
        <a href="<?= PROOT ?>game/story/america"
           class="difficulty-button difficulty-button-fromDifficulty button-easy">America</a>
        <a href="<?= PROOT ?>game/story/europe"
           class="difficulty-button difficulty-button-fromDifficulty button-medium">Europe</a>
        <a href="<?= PROOT ?>game/story/asia"
           class="difficulty-button difficulty-button-fromDifficulty button-easy">Asia</a>
        <a href="<?= PROOT ?>game/story/africa"
           class="difficulty-button difficulty-button-fromDifficulty button-medium">Africa</a>
        <a href="<?= PROOT ?>game/story/australia"
           class="difficulty-button difficulty-button-fromDifficulty button-easy">Australia</a>
    </div>
    -->
</div>

<?php $this->end(); ?>
