<?php

use Core\FH;
use Core\H;

?>

<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('head'); ?>
<!-- TODO: Redo game js in order to set the score-->
<script src="<?= PROOT ?>js/instructionScript.js" defer></script>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content  center text-center margin-btm">
    <h1 class="text-center red">What fruit or vegetable is in the image?</h1><br>
    <!-- TODO: make picture and buttons a bit wider -->
    <img src="<?= FH::generateImage($this->level[0]) ?>" alt="<?= $this->level[0] ?>" class="game-image"><br><br>
    <!-- TODO: Helper function to randomly generate the buttons order(keep in mind that I've used -->
    <!-- TODO: ucfirst() as not all the fruits/vegetables name stated with a capital we could keep it -->
    <!-- TODO: like this or fix the xml -> I'd rather go w the second one) -->

    <button data-modal-target="#modal" id="wrong-answer1" class="buttonPurple"><?= ucfirst($this->level[0]) ?></button>
    <button data-modal-target="#modal" id="wrong-answer2" class="buttonPurple"><?= ucfirst($this->level[1]) ?></button>
    <br>
    <button data-modal-target="#modal" id="correct-answer" class="buttonPurple"><?= ucfirst($this->level[2]) ?></button>
    <button data-modal-target="#modal" id="wrong-answer3" class="buttonPurple"><?= ucfirst($this->level[3]) ?></button>
    <br>
    <!-- TODO: Add quit functionality (save score and delete session difficulty) -->
    <button data-modal-target="#modal" id="wrong-answer3" class="buttonRed">Quit</button>

    <div data-remove="remove" class="modal" id="modal">
        <div class="modal-header">
            <div class="title">Please select a difficulty!</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
    </div>
    <div id="overlay"></div>

</div>

<?php $this->end(); ?>
