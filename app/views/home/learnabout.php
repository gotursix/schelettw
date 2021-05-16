<?php

use Core\FH;
use Core\H;
use Core\Session;
use Core\Router;
?>

<?php $this->setSiteTitle('Learn about ' . $this->item); ?>
<?php $this->start('head'); ?>
<script src="<?= PROOT ?>js/learnaboutAPIScript.js" defer></script>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="container content  center text-center margin-btm">
    <div id="learnAbout-content"></div>
    <script>
        window.onload = function () {
            generatePageContentLearnAbout("<?= $this->item ?>");
        };
    </script>
</div>


<?php $this->end(); ?>
