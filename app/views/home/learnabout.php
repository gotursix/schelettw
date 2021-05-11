<?php

use Core\FH;
use Core\H;
use Core\Session;

?>

<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('body'); ?>
<div class="container content  center text-center margin-btm">
    <h1 class="text-center red">Learn about <?=$this->item?></h1>
    <br>
    <img src="<?= FH::generateImage($this->item) ?>" alt="<?= $this->item ?>" class="game-image" >
    <br>
    <?= FH::generateDescription(lcfirst($this->item)) ?>
</div>

<?php $this->end(); ?>
