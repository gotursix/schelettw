//Generate the content for a specific page
async function generatePageContent(page) {
    /*
$page_size = 7;
$arr = FH::getFruitsAndVeggiesArrayAll();
$number_of_result = count($arr);
$number_of_pages = ceil($number_of_result / $page_size) - 1;
$first_result_index = (int)$this->page * $page_size;
$max_items = $page_size + $first_result_index > count($arr) ? count($arr) : $page_size + $first_result_index;

for ($i = $first_result_index; $i < $max_items; $i++) {
    if (isset($arr[$i])){
        echo '<img src="' . FH::generateImageHelper($arr[$i], "small") . '" alt="' . $arr[$i] . '" class="game-image" >';
        //echo "<h1>There is no picture for this item!</h1><br><br>";
        echo '<p>' . $arr[$i] . '</p>';
        echo '<p>'. FH::getFruitDifficulty($arr[$i]) .'</p>';
        echo '<a  href="' . PROOT . 'home/learnabout/' . $arr[$i] . '">learn more about: ' . $arr[$i] . '</a>';
        echo '<br>';
    }
}

if ((int)$this->page > 0) {
    echo '<a href = "' . PROOT . 'home/learn/' . (int)$this->page - 1 . '">Previews page </a>';
}

for ($page = 1; $page <= $number_of_pages; $page++) {
    echo '<a href = "' . PROOT . 'home/learn/' . $page - 1 . '">' . $page . ' </a>';
}

if ((int)$this->page < $number_of_pages)
    echo '<a href = "' . PROOT . 'home/learn/' . (int)$this->page + 1 . '">Next page </a>';*/

    //TODO: Finish learn page + pagination
    let content = '';
    let page_size = 7;
    let response = await fetch(`http://localhost:8080/schelettw/api/fruits/all`);
    let allFruits = await response.json();
    let number_of_results = allFruits.data.length;
    let number_of_pages = Math.ceil(number_of_results / page_size) - 1;
    let first_result_index = page * page_size;
    let max_items = page_size + first_result_index > number_of_results ? number_of_results : page_size + first_result_index;
    let i = first_result_index
    for(i; i<max_items; i++){
        content += 'Img is here<br>';
        content += '<p>' + allFruits.data[i].name + '</p>';
        content += '<p>' + allFruits.data[i].difficulty + '</p>';
    }

    document.getElementById("learn-content").innerHTML = content;
}