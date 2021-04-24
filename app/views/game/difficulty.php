<?php

use Core\FH;
use Core\H;
use Core\Session;

?>

<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content  center text-center margin-btm">
    <h1 class="text-center red">Please set the difficulty</h1>
    <br>
    <div class="container-buttons-diff" id="diff-buttons">
        <a id="easy" href="<?= PROOT ?>game/play/easy"
           class="difficulty-button difficulty-button-fromDifficulty button-easy">Easy</a>
        <a id="medium" href="<?= PROOT ?>game/play/medium"
           class="difficulty-button difficulty-button-fromDifficulty button-medium">Medium</a>
        <a id="hard" href="<?= PROOT ?>game/play/hard"
           class="difficulty-button difficulty-button-fromDifficulty button-hard">Hard</a>
    </div>
</div>

<?php $this->end(); ?>
