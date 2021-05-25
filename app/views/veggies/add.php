<?php use Core\FH;

$this->setSiteTitle('Add Fruit or Veggie'); ?>
<?php $this->start('body'); ?>
<div class="container content center text-center">
    <h1>Add Fruits&Veggies</h1>
    <form class="login-form" action="" method="POST">
        <?= FH::csrfInput() ?>
        <input type="text" id="name" name="name"
               placeholder="Fruit/Veggie's name"/>
        <input type="text" id="description" name="description"
               placeholder="Description"/>
        <br><br>

        <div class="bg-danger"><?= FH::displayErrors($this->displayErrors) ?></div>
        <button type="submit" value="Save">Add</button>
    </form>
    <a href="<?= PROOT ?>admin/veggies" class="button">Cancel</a>
</div>
<?php $this->end(); ?>
