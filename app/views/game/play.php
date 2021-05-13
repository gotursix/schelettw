<?php

use Core\FH;
use Core\H;

?>

<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('head'); ?>
<script src="<?= PROOT ?>js/gameScript.js" defer></script>
<script>
    let dificulty = <?=H::getDifficuly()?>;
</script>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content  center text-center margin-btm">
    <h1 class="text-center red">What fruit or vegetable is in the image?</h1><br>
    
    <?= FH::generateGameImage($this->level[0],"regular") ?>

    <!-- TODO: Helper function to randomly generate the buttons order -->
    <button id="correct-answer" class="buttonPurple"><?= ucfirst($this->level[0]) ?></button>
    <button id="wrong-answer2" class="buttonPurple"><?= ucfirst($this->level[1]) ?></button>
    <br>
    <button id="wrong-answer1" class="buttonPurple"><?= ucfirst($this->level[2]) ?></button>
    <button id="wrong-answer3" class="buttonPurple"><?= ucfirst($this->level[3]) ?></button>
    <br>
    <a href="<?= PROOT ?>game/end">
        <button class="buttonQuit">Quit</button>
    </a>


</div>

<?php $this->end(); ?>
