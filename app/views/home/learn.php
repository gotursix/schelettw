<?php

use Core\FH;
use Core\H;
use Core\Session;

?>

<?php $this->setSiteTitle('Learn'); ?>
<?php $this->start('body'); ?>
<div class="container content  center text-center margin-btm">
    <h1 class="text-center red">Learn </h1>
    <br>
    <?php
    $page_size = 7;
    $arr = FH::getFruitsAndVeggiesArrayAll();
    $number_of_result = count($arr);
    $number_of_pages = ceil($number_of_result / $page_size) - 1;
    $first_result_index = (int)$this->page * $page_size;
    $max_items = $page_size + $first_result_index > count($arr) ? count($arr) : $page_size + $first_result_index;

    for ($i = $first_result_index; $i < $max_items; $i++) {
        echo '<img src="' . FH::generateImageHelper($arr[$i], "small") . '" alt="' . $arr[$i] . '" class="game-image" >';
        //echo "<h1>There is no picture for this item!</h1><br><br>";
        echo '<p>' . $arr[$i] . '</p>';
        echo '<a id="easy" href="' . PROOT . 'home/learnabout/' . $arr[$i] . '">learn more about: ' . $arr[$i] . '</a>';
        echo '<br>';
    }

    if ((int)$this->page > 0) {
        echo '<a href = "' . PROOT . 'home/learn/' . (int)$this->page - 1 . '">Previews page </a>';
    }

    for ($page = 1; $page <= $number_of_pages; $page++) {
        echo '<a href = "' . PROOT . 'home/learn/' . $page - 1 . '">' . $page . ' </a>';
    }

    if ((int)$this->page < $number_of_pages)
        echo '<a href = "' . PROOT . 'home/learn/' . (int)$this->page + 1 . '">Next page </a>';
    ?>
</div>

<?php $this->end(); ?>
