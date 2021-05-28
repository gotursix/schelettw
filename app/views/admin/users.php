<?php

use Core\Generators;

$this->setSiteTitle('Ban or unban users'); ?>
<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?= PROOT ?>css/table.css">
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content center text-center">
    <h1 class="purple margin-1">Users</h1>
    <table>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody id="bodyToSet">
        <?= Generators::generateUsersTable($this->users); ?>
        </tbody>
        <a href="<?= PROOT ?>admin" class="crud-button primary cancel margin-1">Cancel</a>

    </table>

</div>


<?php $this->end(); ?>
