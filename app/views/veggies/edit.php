<?php use Core\FH;

$this->setSiteTitle('Edit Fruit/Veggie'); ?>
<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?= PROOT ?>css/admin.css">
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content center text-center">
    <h1 class="purple">Edit Fruit/Veggie</h1>
    <form class="fruit-form" action="" method="POST">
        <?= FH::csrfInput() ?>
        <div class="form__group">
        <input type="text" id="name" name="name" value="<?= $this->veggie->name ?>"
               placeholder="Name" class="form__input"/>
        <textarea type="text" id="description" name="description" value="<?= $this->veggie->description ?>"
                  placeholder="Description" class="form__input resize"></textarea>

        <div class="bg-danger"><?= FH::displayErrors($this->displayErrors) ?></div>
        <button type="submit" value="Save" class="crud-button primary save margin-1">Save</button>
        </div>
    </form>
    <a href="<?= PROOT ?>admin/veggies" class="crud-button primary cancel">Cancel</a>
</div>
<?php $this->end(); ?>
