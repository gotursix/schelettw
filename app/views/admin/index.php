<?php $this->setSiteTitle('Admin Dashboard'); ?>
<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?= PROOT ?>css/table.css">
<link rel="stylesheet" href="<?= PROOT ?>css/admin.css">
<script src="<?= PROOT ?>js/adminAPIScript.js" defer></script>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content center text-center">
    <a href="<?= PROOT ?>admin/veggies" class="buttonPurple">Add fruit description</a><br>
    <a href="<?= PROOT ?>admin/users" class="buttonRed">Ban users</a>
    <h1 class="purple question-title">Questions</h1>
    <a href="<?= PROOT ?>admin/add" class="crud-button primary new margin-1">Add question</a>
    <table>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Question</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody id="bodyToSet">
        </tbody>
    </table>


</div>

<script>
    window.onload = function () {
        getTable();
    };
</script>
<?php $this->end(); ?>
