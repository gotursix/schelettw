<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('head'); ?>
<script src="<?= PROOT ?>js/instructionScript.js" defer></script>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content">
    <h1 class="text-center red">Welcome to the best fruits game!</h1>

    <div class="container-buttons">
        <a id="easy" href="#" class="difficulty-button-instruction difficulty-button button-easy" >Easy</a>
        <a id="medium" href="#" class="difficulty-button-instruction difficulty-button button-medium" >Medium</a>
        <a id="hard" href="#" class="difficulty-button-instruction difficulty-button button-hard" >Hard</a>
    </div>
    
    <button id="wrong-answer1" class="buttonPurple" >pumpkin</button>
    <button id="wrong-answer2" class="buttonPurple" >Kiwi</button><br>
    <button id="correct-answer" class="buttonPurple">Watermelone</button>
    <button id="wrong-answer3" class="buttonPurple">Cucumbern</button>
</div>
<?php $this->end(); ?>
