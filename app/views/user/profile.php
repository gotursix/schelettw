<?php


?>

<?php use Core\Generators;

$this->setSiteTitle('User profile'); ?>
<?php $this->start('head'); ?>
<script src="<?= PROOT ?>js/profilePageAPIScript.js" defer></script>
<link rel="stylesheet" href="<?= PROOT ?>css/profilePage.css">
<link rel="stylesheet" href="<?= PROOT ?>css/table.css">
<?php $this->end(); ?>
<?php
$profilePhoto = Generators::getProfilePicture($this->user->photoId);


?>
<?php $this->start('body'); ?>
<div class="container content  center text-center margin-btm">
    <h1 class="text-center red">Welcome to your profile page</h1>
    <div class="info-container">
        <img class="profilePhoto" src="<?= $profilePhoto ?>" alt="profile photo">
        <div class="info_text">
            <h2><span class="red">First name: </span><?= $this->user->fname ?></h2>
            <h2><span class="red">Last name: </span><?= $this->user->lname ?></h2>
            <h2><span class="red">Username: </span><?= $this->user->username ?></h2>
        </div>
    </div>
    <form action="#" method="POST" class="choose-photo-form">
        <script>document.querySelector("form").setAttribute("action", "")</script>

        <label for="correct"> Change your character
        </label><select id="correct" name="photoId">
            <option value="1">
                Sponge Bob
            </option>
            <option value="2">
                Jhonny Bravo
            </option>
            <option value="3">
                Candace
            </option>
            <option value="4">
                Powerful girls
            </option>
        </select>
        <button type="submit" class="crud-button primary save">Save</button>
    </form>


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
