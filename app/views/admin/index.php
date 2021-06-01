<?php $this->setSiteTitle('Admin Dashboard'); ?>
<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?= PROOT ?>css/table.css">
<link rel="stylesheet" href="<?= PROOT ?>css/admin.css">
<script src="<?= PROOT ?>js/adminAPIScript.js" defer></script>
<?php $this->end(); ?>
<?php $this->start('body');

if (!empty($_GET['status'])) {
    switch ($_GET['status']) {
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<div class="container content center text-center">
    <!-- Display status message -->
    <?php if(!empty($statusMsg)){ ?>
        <div class="col-xs-12">
            <div class=" <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
        </div>
    <?php } ?>
    <a href="<?= PROOT ?>admin/veggies" class="crud-button primary edit btn-width margin-1">Add fruit description</a>
    <a href="<?= PROOT ?>admin/users" class="crud-button primary delete btn-width">Ban users</a>
    <a href="<?= PROOT ?>admin/add" class="crud-button primary new margin-1 btn-width">Add question</a>
    <a class="crud-button primary warning btn-width" onclick="showExport()">Export data</a>
    <a class="crud-button primary warning btn-width margin-1" onclick="showImport(); ">Import data</a>
    <div id="export">
    <a href="<?= PROOT ?>admin/exportUsers" class="crud-button primary gray btn-width">Export users</a>
    <a href="<?= PROOT ?>admin/exportScores" class="crud-button primary gray btn-width">Export scores</a><br>
    <a href="<?= PROOT ?>admin/exportQuestions" class="crud-button primary gray btn-width">Export questions</a>
    <a href="<?= PROOT ?>admin/exportFruits" class="crud-button primary gray btn-width">Export fruits/veggies</a>
    </div>
    <div id="import">
        <a class="crud-button primary gray btn-width" onclick="chooseFile('<?=PROOT?>','importUsers'); formToggle('importFrm');">Import users</a>
        <a class="crud-button primary gray btn-width" onclick="chooseFile('<?=PROOT?>','importScores'); formToggle('importFrm');">Import scores</a><br>
        <a class="crud-button primary gray btn-width" onclick="chooseFile('<?=PROOT?>','importQuestions'); formToggle('importFrm');">Import questions</a>
        <a class="crud-button primary gray btn-width" onclick="chooseFile('<?=PROOT?>','importFruits'); formToggle('importFrm');">Import fruits/veggies</a>

        <!-- CSV file upload form -->
        <div id="choosedFile">

        </div>
    </div>
    <h1 class="purple question-title">Questions</h1>
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
