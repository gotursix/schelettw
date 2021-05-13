<?php

use Core\FH;

?>

<?php $this->setSiteTitle('Rankings'); ?>
<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?= PROOT ?>css/table.css">
<link rel="alternate" type="application/rss+xml" title="New high scores changes!"
      href="http://localhost/schelettw/rss.xml"/>

<!--  document.getElementById("bodyToSet").innerHTML = 'sth'; -->

<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="container content text-center">
    <h1 class="text-center red">Rankings
        <a href="<?= PROOT ?>rss.xml" target="_blank" ?>
            <img src="<?= PROOT ?>img/rss.png" class="rss-image" alt="Company Logo">
        </a>
    </h1>

    <h2 class="margin-1">Choose a difficulty</h2>
    <div class="margin-1">
        <a href="#easy" onclick="getRankings('easy')" class="difficulty-button button-easy">Easy</a>
        <a href="#medium" onclick="getRankings('medium')" class="difficulty-button button-medium">Medium</a>
        <a href="#hard" onclick="getRankings('hard')" class="difficulty-button button-hard">Hard</a>
    </div>
    <?= FH::updateRSS("gabi", 500, "easy", date("F j, Y, g:i a")) ?>

    <table>
        <thead>
        <tr>
            <th scope="col">Rank</th>
            <th scope="col">Username</th>
            <th scope="col">Points</th>
            <th scope="col">Difficulty</th>
        </tr>
        </thead>
        <tbody id="bodyToSet">
        </tbody>
    </table>
</div>

<script>
    window.onload = function () {
        getRankingsForAll();
    };
</script>

<?php $this->end(); ?>
