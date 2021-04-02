<?php
use Core\FH;
use Core\H;
?>

<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('head'); ?>
<script src="<?= PROOT ?>js/instructionScript.js" defer></script>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content text-center">
    <h1 class="text-center red">Welcome to the best fruits game!</h1>

    <div class="container-buttons" id="diff-buttons">
        <a id="easy" href="#" class="difficulty-button-instruction difficulty-button button-easy" >Easy</a>
        <a id="medium" href="#" class="difficulty-button-instruction difficulty-button button-medium" >Medium</a>
        <a id="hard" href="#" class="difficulty-button-instruction difficulty-button button-hard" >Hard</a>
    </div>
    <?php
        $url = FH::generateImage('watermelon');
    ?>

    <img src="<?=FH::generateImage('watermelon') ?>" alt="watermelone" class="game-image"><br>
    <button data-modal-target="#modal" id="wrong-answer1" class="buttonPurple" >Pumpkin</button>
    <button data-modal-target="#modal" id="wrong-answer2" class="buttonPurple" >Kiwi</button><br>
    <button data-modal-target="#modal" id="correct-answer" class="buttonPurple">Watermelone</button>
    <button data-modal-target="#modal" id="wrong-answer3" class="buttonPurple">Cucumbern</button>

    <div data-remove="remove" class="modal" id="modal">
        <div class="modal-header">
            <div class="title">Please select a difficulty!</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
    </div>
    <div id="overlay"></div>

</div>

<?php $this->end(); ?>
