<?php
use Core\FH;
?>
<?php $this->setSiteTitle('Rankings'); ?>
<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?= PROOT ?>css/table.css">
<?php $this->end(); ?>


<?php $this->start('body'); ?>
<div class="container content">
    <h1 class="text-center red">Rankings</h1>
    <?= FH::generateTable($this->easy)?>

    <table>
        <caption>Select difficulty</caption>

        <thead>
        <tr>
            <th scope="col">Rank</th>
            <th scope="col">Username</th>
            <th scope="col">Score</th>
            <th scope="col">Points</th>
        </tr>

        </thead>
        <tbody>
        <tr>
            <td data-label="Rank">Visa - 3412</td>
            <td data-label="Username">04/01/2016</td>
            <td data-label="Score">$1,190</td>
            <td data-label="Points">03/01/2016 - 03/31/2016</td>
        </tr>
        <tr>
            <td scope="row" data-label="Account">Visa - 6076</td>
            <td data-label="Due Date">03/01/2016</td>
            <td data-label="Amount">$2,443</td>
            <td data-label="Period">02/01/2016 - 02/29/2016</td>
        </tr>
        <tr>
            <td scope="row" data-label="Account">Corporate AMEX</td>
            <td data-label="Due Date">03/01/2016</td>
            <td data-label="Amount">$1,181</td>
            <td data-label="Period">02/01/2016 - 02/29/2016</td>
        </tr>
        <tr>
            <td scope="row" data-label="Acount">Visa - 3412</td>
            <td data-label="Due Date">02/01/2016</td>
            <td data-label="Amount">$842</td>
            <td data-label="Period">01/01/2016 - 01/31/2016</td>
        </tr>
        </tbody>


    </table>
</div>
<?php $this->end(); ?>
