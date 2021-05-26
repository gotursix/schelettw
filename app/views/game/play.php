<?php

use Core\FH;
use Core\H;

?>
<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('head'); ?>
<!--<script src="<?= PROOT ?>js/gameScript.js" defer></script>-->
<script src="<?= PROOT ?>js/gameAPIScript.js" defer></script>
<?php $this->end(); ?>


<?php $this->start('body'); ?>

<div class="container content  center text-center margin-btm">
    <div id="game-stats">
    </div>
    <div id="game">
    </div>
</div>

<script>
    window.onload = function () {
        generateGameSession("<?=$this->difficulty?>");
    };
</script>
<?php $this->end(); ?>
