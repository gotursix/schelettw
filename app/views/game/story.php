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
    <h1 class="text-center red">Here is some story for a specific continent</h1>
    <br>

    <p> generated question goes scrr</p>
    <button class="buttonQuit" onclick="quitGame()">Quit</button>

</div>

<?php $this->end(); ?>
