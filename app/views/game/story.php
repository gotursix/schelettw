<?php

use Core\FH;
use Core\Generators;
use Core\H;
use Core\Session;

?>

<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('head'); ?>
<script src="<?= PROOT ?>js/storyAPIscript.js" defer></script>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content  center text-center margin-btm">
    <?php
    $profilePhoto = Generators::getProfilePicture($this->user->photoId);
    $name = Generators::getPhotoName($this->user->photoId);
    ?>
    <div id="game-stats"></div>
    <div class="story-header">
        <img class="profilePhoto smaller-img" src="<?=$profilePhoto?>" alt="profile photo">
        <div id="headerr" class="smaller-header"></div>
    </div>
    <div id="game-story"></div>
</div>
<script>
    window.onload = function () {
        generateGameSession("<?=$this->continent?>", "<?=$name?>");
    };
</script>
<?php $this->end(); ?>
