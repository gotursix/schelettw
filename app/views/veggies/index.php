<?php $this->setSiteTitle('Fruit Dashboard'); ?>
<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?= PROOT ?>css/table.css">
<script src="<?= PROOT ?>js/adminAPIScript.js" defer></script>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content center text-center">
    <h1 class="red">Fruits&Veggies</h1>
    <a href="<?= PROOT ?>admin/addVeggie" class="crud-button primary new margin-1">Add fruit/veggie</a>
    <a href="<?= PROOT ?>admin" class="crud-button primary cancel">Cancel</a>
    <table>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Fruit/Veggie</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody id="bodyToSetForVeggies">
        </tbody>

    </table>




</div>

<script>
    window.onload = function () {
        getTableForFruits();
    };
</script>
<?php $this->end(); ?>
