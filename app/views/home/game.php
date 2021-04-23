<?php

use Core\FH;
use Core\H;

?>

<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('head'); ?>
<!-- TODO: Redo game js in order to set the score-->
<script src="<?= PROOT ?>js/gameScript.js" defer></script>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content  center text-center margin-btm">
    <h1 class="text-center red">What fruit or vegetable is in the image?</h1><br>
    <!-- TODO: make picture and buttons a bit wider -->
    <img src="<?= FH::generateImage($this->level[0]) ?>" alt="<?= $this->level[0] ?>" class="game-image"><br><br>
    <!-- TODO: Helper function to randomly generate the buttons order(keep in mind that I've used -->
    <!-- TODO: ucfirst() as not all the fruits/vegetables name stated with a capital we could keep it -->
    <!-- TODO: like this or fix the xml -> I'd rather go w the second one) -->

    <button  id="wrong-answer1" class="buttonPurple"><?= ucfirst($this->level[0]) ?></button>
    <button  id="wrong-answer2" class="buttonPurple"><?= ucfirst($this->level[1]) ?></button>
    <br>
    <button  id="correct-answer" class="buttonPurple"><?= ucfirst($this->level[2]) ?></button>
    <button  id="wrong-answer3" class="buttonPurple"><?= ucfirst($this->level[3]) ?></button>
    <br>
    <!-- TODO: Add quit functionality (save score and delete session difficulty) -->
    <button  id="wrong-answer3" class="buttonRed">Quit</button>



</div>

<?php $this->end(); ?>
