<?php

use Core\FH;
use Core\H;
use Core\Session;

?>

<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('body'); ?>
<div class="container content  center text-center margin-btm">
    <h1 class="text-center red">Game over!</h1>
    <p>Your score was <?=$this->score?></p>
    <a id="medium" href="<?=PROOT?>game/games" class="difficulty-button difficulty-button-fromDifficulty button-medium">Play again</a>
</div>

<?php $this->end(); ?>
