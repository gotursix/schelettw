<?php

use Core\FH;
use Core\H;
use Core\Session;

?>

<?php $this->setSiteTitle('Learn'); ?>
<?php $this->start('head'); ?>
<script src="<?= PROOT ?>js/learnAPIScript.js" defer></script>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="container content  center text-center margin-btm">
    <h1 class="text-center red">Learn </h1>
    <br>
    <div id="learn-content"></div>
    <script>
        window.onload = function () {
            generatePageContent(<?=$this->page?>);
        };
    </script>
</div>

<?php $this->end(); ?>
