<?php

use Core\FH;
use Core\H;
use Core\Session;

?>

<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('body');?>
<div class="container content  center text-center margin-btm">
    <h1 class="text-center red">Learn </h1>
    <br>
<?php
    $page_size = 5;
    $arr = FH::getFruitsAndVeggiesArrayAll();
    $number_of_result = count($arr);
    $number_of_pages = ceil ($number_of_result / $page_size);
    $first_result_index = (int) $this->page * $page_size;

    for($i = $first_result_index; $i< ($page_size + $first_result_index); $i++) {
    echo '<img src="' . FH::generateImage($arr[$i]) . '" alt="' . $arr[$i] . '" class="game-image" >';
    echo '<p>'. $arr[$i] .'</p>';
    echo '<a id="easy" href="'. PROOT.'game/learnabout/' . $arr[$i].'">learn more about: '.$arr[$i].'</a>';
    echo '<br>';
    //echo FH::generateDescription($arr[$i]);
    }
    if ((int) $this->page > 1){
        echo '<a href = "'. PROOT. 'game/learn/' . (int) $this->page -1 . '">Previews page </a>';
    }
    for($page = 1; $page<= $number_of_pages; $page++) {
        echo '<a href = "'. PROOT. 'game/learn/' . $page . '">' . $page . ' </a>';
    }
    if ((int) $this->page < $number_of_pages)
    echo '<a href = "'. PROOT. 'game/learn/' . (int) $this->page +1 . '">Next page </a>';
?>
</div>

<?php $this->end(); ?>
