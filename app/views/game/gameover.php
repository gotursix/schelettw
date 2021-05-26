<?php

use Core\FH;
use Core\H;
use Core\Session;

?>

<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('body'); ?>
<!-- TODO: add button/design -->
<div class="container content  center text-center margin-btm">
    <h1 class="text-center red">Game over!</h1>
    <p>Your score was <?=$this->score?></p>
</div>

<?php $this->end(); ?>
