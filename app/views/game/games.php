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
    <h1 class="text-center red">Please a game to play</h1>
    <br>
    <div class="container-buttons-diff" id="diff-buttons">
        <a id="easy" href="<?= PROOT ?>game/difficulty"
           class="difficulty-button difficulty-button-fromDifficulty button-easy">Games trivia</a>
        <a id="medium" href="<?= PROOT ?>game/continent"
           class="difficulty-button difficulty-button-fromDifficulty button-medium">Other name idk</a>
    </div>
</div>


<?php $this->end(); ?>
