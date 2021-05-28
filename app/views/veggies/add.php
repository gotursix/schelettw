<?php use Core\FH;

$this->setSiteTitle('Add Fruit or Veggie'); ?>
<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?= PROOT ?>css/admin.css">
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content center text-center">
    <h1 class="purple">Add Fruits&Veggies</h1>
    <form class="fruit-form" action="" method="POST">
        <div class="form__group">
            <?= FH::csrfInput() ?>
            <input type="text" id="name" name="name"
                   placeholder="Fruit/Veggie's name" class="form__input"/>
            <textarea type="text" id="description" name="description"
                      placeholder="Description" class="form__input resize"></textarea>


            <div class="bg-danger"><?= FH::displayErrors($this->displayErrors) ?></div>
            <button type="submit" value="Save" class="crud-button primary new margin-1">Add</button>
        </div>
    </form>
    <a href="<?= PROOT ?>admin/veggies" class="crud-button primary cancel">Cancel</a>
</div>
<?php $this->end(); ?>
