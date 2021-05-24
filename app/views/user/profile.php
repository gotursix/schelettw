<?php


?>

<?php $this->setSiteTitle('Learn about ' . $this->item); ?>
<?php $this->start('head'); ?>
<script src="<?= PROOT ?>js/profilePageAPIScript.js" defer></script>
<link rel="stylesheet" href="<?=PROOT?>css/profilePage.css">
<link rel="stylesheet" href="<?= PROOT ?>css/table.css">
<?php $this->end(); ?>
<?php
$profilePhoto = "";
switch ($this->user->photoId) {
    case 0:
        $profilePhoto = PROOT . "img/default0.png";
    case 1:
        $profilePhoto = PROOT . "img/default1.png";
        break;
    case 2:
        $profilePhoto = PROOT . "img/default2.png";
        break;
        $profilePhoto = PROOT . "img/default3.png";
    case 3:
        break;
        $profilePhoto = PROOT . "img/default4.png";
    case 4:
        break;
}
?>
<?php $this->start('body'); ?>
<div class="container content  center text-center margin-btm">
    <h2><?= $this->user->fname ?></h2>
    <h2><?= $this->user->lname ?></h2>
    <img class="profilePhoto" src="<?=$profilePhoto?>" alt="profile photo">

    <table>
        <thead>
        <tr>
            <th scope="col">Rank</th>
            <th scope="col">Username</th>
            <th scope="col">Points</th>
            <th scope="col">Difficulty</th>
        </tr>
        </thead>
        <tbody id="bodyToSet">
        </tbody>
    </table>

</div>

<script>
    window.onload = function () {
        getRankingsForUser("<?=$this->user->username?>");
    };
</script>

<?php $this->end(); ?>
