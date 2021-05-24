<?php
$this->setSiteTitle('Ban or unban users'); ?>
<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?= PROOT ?>css/table.css">
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content center text-center">
    <h1>Users</h1>
    <table>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody id="bodyToSet">
        </tbody>
    </table>


</div>


<?php $this->end(); ?>
