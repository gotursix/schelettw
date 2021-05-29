<?php

use Core\FH;
use Core\H;
use Core\Session;

?>

<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('head'); ?>
<script src="<?= PROOT ?>js/storyAPIscript.js" defer></script>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content  center text-center margin-btm">
    <div id="game-stats">
    </div>
    <div id="game-story">
    </div>
</div>
<script>
    window.onload = function () {
        generateGameSession("<?=$this->continent?>");
    };
</script>
<?php $this->end(); ?>
