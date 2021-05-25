<?php use Core\FH;

$this->setSiteTitle('Edit Fruit/Veggie'); ?>
<?php $this->start('body'); ?>
<div class="container content center text-center">
    <h1>Edit Fruit/Veggie</h1>
    <form class="login-form" action="" method="POST">
        <?= FH::csrfInput() ?>
        <input type="text" id="name" name="name" value="<?= $this->veggie->name ?>"
               placeholder="Name"/>
        <input type="text" id="description" name="description" value="<?= $this->veggie->description ?>"
               placeholder="Description"/>
        <br><br>

        <br><br>
        <div class="bg-danger"><?= FH::displayErrors($this->displayErrors) ?></div>
        <button type="submit" value="Save">Edit</button>
    </form>
    <br><br>
    <a href="<?= PROOT ?>admin" class="button">Cancel</a>
</div>
<?php $this->end(); ?>
