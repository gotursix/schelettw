<?php


namespace App\Controllers;

use App\Models\Fruit;
use app\models\Questions;
use App\Models\Scores;
use app\models\Vegetables;
use Core\Controller;
use Core\FH;
use Core\Generators;
use Core\H;
use Core\Router;
use Core\Session;

/**
 * Class ApiController
 * @package App\Controllers
 * Contains all the api endpoints used for the websire
 */
class ApiController extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->load_model('Scores');
    }


    /**
     * @param $difficulty - the game difficulty for which we want a new question
     * @return void returns a json containing a trivia game question
     */
    public function gameAction($difficulty) {
        header("Content-Type:application/json");
        $input = file_get_contents(FRUITS_PATH);
        $fruits = json_decode($input, true);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($difficulty == "session") {
                H::response(200, "There is already an active game session", Session::get("gameSession"));
            } else
                if (in_array($difficulty, DIFFICULTIES) && Session::get("difficulty") == $difficulty) {
                    if (!empty($difficulty)) {
                        if (Session::exists("lives") && Session::get("lives") > 0) {
                            if (!Session::exists("gameSession")) {
                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => API_DOMAIN . 'schelettw/api/fruits/' . $difficulty . '/4',
                                    CURLOPT_RETURNTRANSFER => true,
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl);
                                $fruits = json_decode($response);
                                $random = rand(0, 3);
                                $correct_fruit = $fruits->data[$random]->name;
                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => API_DOMAIN . 'schelettw/api/photo/' . $correct_fruit,
                                    CURLOPT_RETURNTRANSFER => true,
                                ));
                                $url = curl_exec($curl);
                                curl_close($curl);
                                $url = json_decode($url);
                                $data = array(
                                    "correct" => $correct_fruit,
                                    "url" => $url->data->url,
                                    "difficulty" => $difficulty,
                                    "fruits" => $fruits->data,
                                    "lives" => Session::get("lives"),
                                    "score" => Session::get("score")
                                );
                                Session::set("gameSession", $data);
                                H::response(200, "Here goes the data for a game session", $data);
                            } else
                                H::response(200, "There is already an active game session", Session::get("gameSession"));
                        } else {
                            $score = Session::get("score");
                            $newScore = $this->ScoresModel->findScore(H::currentUser()->id, Session::get("difficulty"));
                            if ($newScore) {
                                if (Session::get("score") > $newScore->points) {
                                    $newScore->points = Session::get("score");
                                }
                            } else {
                                $newScore = new Scores();
                                $newScore->points = Session::get("score");
                                $newScore->difficulty = Session::get("difficulty");
                                $newScore->user_id = H::currentUser()->id;
                            }
                            if ($newScore->points)
                                $newScore->save();
                            FH::updateRSS(H::currentUser()->username, $newScore->points, Session::get("difficulty"), date("F j, Y, g:i a"));
                            Session::delete("gameSession");
                            Session::delete("difficulty");
                            Session::delete("score");
                            Session::delete("current_score");
                            Session::delete("lives");
                            H::response(200, "Game over", $score);
                        }
                    }
                } else
                    H::response(400, "Invalid Request", NULL);
        } else
            H::response(400, "Expected GET Request", NULL);
    }


    /**
     * @param $difficulty - the difficulty for which we want a new trivia game
     * @return void - returns a new trivia question
     */
    public function storyAction($difficulty) {
        header("Content-Type:application/json");
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($difficulty == "session") {
                H::response(200, "There is already an active game session", Session::get("gameSession"));
            } else
                if (in_array($difficulty, DIFFICULTIES) && Session::get("difficulty") == $difficulty) {
                    if (!empty($difficulty)) {
                        if (!Session::exists("gameSession")) {
                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                                CURLOPT_URL => API_DOMAIN . 'schelettw/api/fruits/' . $difficulty . '/4',
                                CURLOPT_RETURNTRANSFER => true,
                            ));
                            $response = curl_exec($curl);
                            curl_close($curl);
                            $fruits = json_decode($response);
                            $random = rand(0, 3);
                            $correct_fruit = $fruits->data[$random]->name;

                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                                CURLOPT_URL => API_DOMAIN . 'schelettw/api/photo/' . $correct_fruit,
                                CURLOPT_RETURNTRANSFER => true,
                            ));
                            $url = curl_exec($curl);
                            curl_close($curl);
                            $url = json_decode($url);
                            $data = array(
                                "correct" => $correct_fruit,
                                "url" => $url->data->url,
                                "difficulty" => $difficulty,
                                "fruits" => $fruits->data
                            );
                            Session::set("gameSession", $data);
                            H::response(200, "Here goes the data for a game session", $data);
                        } else
                            H::response(200, "There is already an active game session", Session::get("gameSession"));
                    }
                } else
                    H::response(400, "Invalid Request", NULL);
        } else
            H::response(400, "Expected GET Request", NULL);
    }


    /**
     * @param $status - true or false depending on the button
     * @api updates the session score for the hard difficulty
     */
    public function updateAction($status) {
        header("Content-Type:application/json");
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            if (Session::exists("gameSession")) {
                if ($status == "true") {
                    Session::set("current_score", Session::get("current_score") + 12);
                    Session::set("score", Session::get("score") + Session::get("current_score"));
                    Session::delete("gameSession");
                    H::response(200, "Score ++12", true);
                } else {
                    Session::set("lives", Session::get("lives") - 1);
                    Session::set("current_score", Session::get("current_score") - 4);
                    H::response(200, "Score --4", false);
                }
            } else {
                H::response(404, "No current game in progress", NULL);
            }
        } else
            H::response(400, "Expected PUT request", NULL);
    }

    /**
     * @param $status - true or false depending on the button
     * @api updates the session score for the hard difficulty
     */
    public function nextAction($status) {
        header("Content-Type:application/json");
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            if (Session::exists("gameSession")) {
                if ($status == "true") {
                    Session::set("score", Session::get("score"));
                    Session::delete("gameSession");
                    H::response(200, "Score ++12", true);
                } else {
                    Session::set("lives", Session::get("lives") - 1);
                    Session::set("current_score", Session::get("current_score") - 4);
                    H::response(200, "Score --4", false);
                }
            } else {
                H::response(404, "No current game in progress", NULL);
            }
        } else
            H::response(400, "Expected PUT request", NULL);
    }

    /**
     * @param $fruit - fruit/veggie button we've pressed on
     * @return void returns true or false depending on the answer
     */
    public function logicAction($fruit) {
        header("Content-Type:application/json");
        $input = file_get_contents(FRUITS_PATH);
        $fruits = json_decode($input, true);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($f = FH::isFruitInJSON($fruits, $fruit) && Session::exists("gameSession")) {
                H::response(200, "Handle correct fruit", Session::get("gameSession")["correct"] == $fruit);
            } else
                H::response(404, "Fruit not found!", NULL);
        } else
            H::response(400, "Expected GET Request", NULL);
    }

    /**
     * @api ends the trivia game, updating score and deleting the session variables
     */
    public function endAction() {
        header("Content-Type:application/json");
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            if (Session::exists("gameSession")) {
                $newScore = $this->ScoresModel->findScore(H::currentUser()->id, Session::get("difficulty"));
                if ($newScore) {
                    if (Session::get("score") > $newScore->points) {
                        $newScore->points = Session::get("score");
                    }
                } else {
                    $newScore = new Scores();
                    $newScore->points = Session::get("score");
                    $newScore->difficulty = Session::get("difficulty");
                    $newScore->user_id = H::currentUser()->id;
                }
                if ($newScore->points)
                    $newScore->save();
                FH::updateRSS(H::currentUser()->username, $newScore->points, Session::get("difficulty"), date("F j, Y, g:i a"));
                Session::delete("gameSession");
                Session::delete("difficulty");
                Session::delete("score");
                Session::delete("current_score");
                Session::delete("lives");
                H::response(200, "Game ended", NULL);
            } else {
                H::response(404, "No current game in progress", NULL);
            }
        } else
            H::response(400, "Expected DELETE Request", NULL);
    }

    /**
     * @param $continent - the continent for which we want a new story
     * @return void returns a new question from the db that hasn't been answered in the current game
     */
    public function getStoryAction($continent) {
        header("Content-Type:application/json");
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $questions = new Questions();
            $questions = $questions->findAllForContinent($continent);
            //H::dnd(count($questions));
            if (count($questions) == 0) {
                H::response(202, "Coming soon!", NULL);
            } else {
                if (!Session::exists("questionIndex") && Session::exists("continent"))
                    Session::set("questionIndex", 0);
                $score = Session::exists("storyScore") ? Session::get("storyScore") : null;
                if (Session::get("questionIndex") <= count($questions) - 1) {
                    //Get photo
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => API_DOMAIN . 'schelettw/api/photo/' . $questions[Session::get("questionIndex")]->photo,
                        CURLOPT_RETURNTRANSFER => true,
                    ));
                    $url = curl_exec($curl);
                    curl_close($curl);
                    $url = json_decode($url);
                    $questions[Session::get("questionIndex")]->photo = $url->data->url;
                    $questions[Session::get("questionIndex")]->score = $score;
                    //H::dnd($questions[Session::get("questionIndex")]);
                    H::response(200, "Current question", $questions[Session::get("questionIndex")]);
                } else H::response(200, "Game over", $score);
            }
        } else
            H::response(400, "Expected DELETE Request", NULL);
    }

    /**
     * @param $answer - the question answer we've pressed on
     * @return void returns true or false depending on weather the answer is correct or not
     */
    public function storyLogicAction($answer) {
        header("Content-Type:application/json");
        $questions = new Questions();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (Session::exists("continent")) {
                $questions = $questions->findAllForContinent(Session::get("continent"));
                H::response(200, "Response", array_search($answer, (array)$questions[Session::get("questionIndex")], true) == ("answer" . $questions[Session::get("questionIndex")]->correct));
            } else H::response(404, "Story not found", NULL);
        } else H::response(400, "Expected GET Request", NULL);
    }

    /**
     * @param $status - button status that represents the status of the button we've pressed on
     * @api updates the score on the session
     */
    public function storyUpdateAction($status) {
        header("Content-Type:application/json");
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            if (Session::exists("continent")) {
                if ($status == "true") {
                    Session::set("current_storyScore", Session::get("current_storyScore") + 12);
                    Session::set("storyScore", Session::get("storyScore") + Session::get("current_storyScore"));
                    Session::set("questionIndex", Session::get("questionIndex") + 1);
                    H::response(200, "Score ++12", true);
                } else {
                    Session::set("current_storyScore", Session::get("current_storyScore") - 4);
                    H::response(200, "Score --4", false);
                }
            } else {
                H::response(404, "No current game in progress", NULL);
            }
        } else
            H::response(400, "Expected PUT request", NULL);
    }

    /**
     * @api ends the story game and saves the score(inserts a new record or update the current one), deleting the
     * game session and the session variables
     */
    public function endStoryAction() {
        header("Content-Type:application/json");
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            if (Session::exists("continent")) {
                $newScore = $this->ScoresModel->findScore(H::currentUser()->id, Session::get("continent"));
                if ($newScore != null) {
                    if (Session::get("storyScore") > $newScore->points) {
                        $newScore->points = Session::get("storyScore");
                    }
                } else {
                    $newScore = new Scores();
                    $newScore->points = Session::get("storyScore");
                    $newScore->difficulty = Session::get("continent");
                    $newScore->user_id = H::currentUser()->id;
                }
                if ($newScore->points != 0)
                    $newScore->save();
                FH::updateRSS(H::currentUser()->username, $newScore->points, Session::get("continent"), date("F j, Y, g:i a"));
                Session::delete("continent");
                Session::delete("storyScore");
                Session::delete("questionIndex");
                Session::delete("current_storyScore");
                H::response(200, "Game ended", NULL);
            } else {
                H::response(404, "No current game in progress", NULL);
            }
        } else
            H::response(400, "Expected DELETE Request", NULL);
    }

    /**
     * @param string $difficulty fruit difficulty
     * @param int $count the number of fruits
     * @return void returns the number of fruits for the specified difficulty
     */
    public function fruitsAction($difficulty = "all", $count = 0) {
        header("Content-Type:application/json");
        $input = file_get_contents(FRUITS_PATH);
        $fruits = json_decode($input, true);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (in_array($difficulty, DIFFICULTIES)) {
                if (!empty($difficulty)) {
                    $arr = [];
                    foreach ($fruits as $fruit) {
                        if ($fruit["difficulty"] == $difficulty) {
                            array_push($arr, $fruit);
                        }
                    }
                    $arr = array_unique($arr, SORT_REGULAR);
                    if ($count != 0 && is_numeric($count)) {
                        //Used by the game logic
                        shuffle($arr);
                        $arr = array_slice($arr, 0, $count);
                        H::response(200, "Wants to see only " . $count . " from " . $difficulty, $arr);
                    } else
                        H::response(200, "Wants to get all fruits from diff " . $difficulty, $arr);
                }
            } else {
                if ($difficulty == "all" || $difficulty == null) {
                    $fruits = array_unique($fruits, SORT_REGULAR);
                    if ($count != 0 && is_numeric($count)) {
                        shuffle($fruits);
                        $fruits = array_slice($fruits, 0, $count);
                        H::response(200, "Wants to see from all fruits only " . $count, $fruits);
                    } else {
                        $fruits = array_slice($fruits, 0, count($fruits));
                        H::response(200, "Wants to see all fruits", $fruits);
                    }
                } else
                    H::response(400, "Invalid Request", NULL);
            }
        } else
            H::response(400, "Expected GET Request", NULL);
    }

    /**
     * @param string $difficulty the difficulty for which we want to get the rankings
     * @param int $count the number of records to be returned
     * @return void returns the amount of records for the specified difficulty
     */
    public function rankingsAction($difficulty = "all", $count = 0) {
        header("Content-Type:application/json");
        $scoresModel = new Scores();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (in_array($difficulty, DIFFICULTIES)) {
                if ($count != 0 && is_numeric($count)) {
                    $arr = $scoresModel->findByDifficultyTop($difficulty, $count);
                    H::response(200, "Wants to see only", $arr);
                } else {
                    $arr = $scoresModel->findByDifficulty($difficulty);
                    H::response(200, "Wants to see all", $arr);
                }
            } else {
                if ($difficulty == "all" || $difficulty == null) {
                    if ($count != 0 && is_numeric($count)) {
                        $arr = $scoresModel->findAllDifficultyTop($count);
                        H::response(200, "Wants to see all difficulties", $arr);
                    } else {
                        $arr = $scoresModel->findAllDifficulty();
                        H::response(200, "Wants to see all difficulties", $arr);
                    }
                } else
                    H::response(400, "Invalid Request", NULL);
            }
        } else
            H::response(400, "Expected GET Request", NULL);
    }

    /**
     * @param $fruit - fruit to get the photo for
     * @param string $quality - regular (high quality), anything else lower quality(used for thumbnails)
     * @returns void returns the photo link taken off unsplash API
     */
    public function photoAction($fruit, $quality = "regular") {
        header("Content-Type:application/json");
        if ($quality == null)
            $quality = "regular";
        $input = file_get_contents(FRUITS_PATH);
        $fruits = json_decode($input, true);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($f = FH::isFruitInJSON($fruits, $fruit)) {
                $data = array(
                    "name" => ucfirst($f["name"]),
                    "url" => htmlspecialchars(Generators::generateImageHelper($fruit, $quality)),
                    "difficulty" => $f["difficulty"]
                );
                H::response(200, "Fruit is in JSON ", $data);
            } else
                H::response(404, "Fruit not found!", NULL);
        } else
            H::response(400, "Expected GET Request", NULL);
    }

    /**
     * @param $fruit - the fruit or the vegetable for which we want to get the description
     * @return void returns the description for a given fruit/vegetable as json response
     */
    public function descriptionAction($fruit) {
        header("Content-Type:application/json");
        $input = file_get_contents(FRUITS_PATH);
        $fruits = json_decode($input, true);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($f = FH::isFruitInJSON($fruits, $fruit)) {
                $data = array(
                    "description" => Generators::generateDescription($fruit)
                );
                H::response(200, "Fruit is in JSON ", $data);
            } else
                H::response(404, "Fruit not found!", NULL);
        } else
            H::response(400, "Expected GET Request", NULL);
    }

    /**
     * @return void returns all the questions as json response(used for the admin page)
     */
    public function questionsAction() {
        header("Content-Type:application/json");
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $questions = new Questions();
            H::response(200, "Questions:", $questions->findAll());
        } else
            H::response(400, "Expected GET Request", NULL);
    }

    /**
     * @return void returns all the fruits and vegetables as a json response(used for the learn page)
     */
    public function veggiesAction() {
        header("Content-Type:application/json");
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $veggies = new Vegetables();
            H::response(200, "Fruit/Veggie:", $veggies->findAll());
        } else
            H::response(400, "Expected GET Request", NULL);
    }

    /**
     * @param $fruit
     * @return void returns as response the fruit description found in the database as a json
     */
    public function veggieAction($fruit) {
        header("Content-Type:application/json");
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $veggie = new Vegetables();
            H::response(200, "Fruit/Veggie:", $veggie->findByName(lcfirst($fruit)));
        } else
            H::response(400, "Expected GET Request", NULL);
    }


    /*
    public function generateJSONAction() {
        $easy = array(
            "Orange",
            "apple",
            "Banana",
            "Blackberries",
            "bean",
            "Blueberry",
            "Carrot",
            "Cherry",
            "Corn",
            "Cucumber",
            "cinnamon",
            "cauliflower",
            "Grapefruit",
            "Lemon",
            "Mandarin",
            "strawberry",
            "Mushrooms",
            "Nuts",
            "Olive",
            "Onion",
            "Olives",
            "Peach",
            "Pear",
            "peas",
            "Peanut",
            "Peas",
            "Peppers",
            "Plum",
            "Pineapple",
            "Potato",
            "Pumpkin",
            "Raspberries",
            "Tomato",
            "Watermelon",
            "Kiwi",
            "Grapes",
            "Lime",
            "Coffee",
            "Nectarine",
            "kiwi"
        );
        $medium = array(
            "Avocado",
            "Asparagus",
            "Barberry",
            "Blackberries",
            "Blueberries",
            "Broccoli",
            "Cabbage",
            "Coconuts",
            "Cranberries",
            "coriander",
            "cauliflower",
            "Cashew",
            "Clementine",
            "cinnamon",
            "Dates",
            "Eggplant",
            "Garlic",
            "Ginger",
            "Jalapeno",
            "Lettuce",
            "lentil",
            "oregano",
            "Olives",
            "Raisin",
            "Raspberries",
            "rosemary",
            "Spinach",
            "Tangerines",
            "Beets",
            "Mango",
            "Mulberries",
            "Iceberg Lettuce",
            "Hazelnut",
            "Pepino",
            "peas",
            "Walnut",
            "Guacamole",
            "Grapefruit",
            "Lime",
            "leek",
            "Coffee",
            "Kale",
            "kiwi"
        );
        $hard = array(
            "Asparagus",
            "Apricots",
            "Basil",
            "Cacao",
            "coriander",
            "Cranberry",
            "Guava",
            "Kale",
            "Mango",
            "Mint",
            "Mulberries",
            "Pomelo",
            "rosemary",
            "oregano",
            "Papaya",
            "Quinoa",
            "Radish",
            "Raspberries",
            "Vanilla",
            "Zucchini",
            "Parsnips",
            "Cauliflower",
            "Wasabi",
            "Rhubarb",
            "Turnips",
            "Kaki",
            "Fig",
            "Mustard",
            "lentil",
            "leek",
            "kiwi"
        );
        $fruits = [];
        foreach ($easy as $e) {
            $fruit = new Fruit(ucfirst($e), "easy");
            array_push($fruits, $fruit);
        }
        foreach ($easy as $e) {
            $fruit = new Fruit(ucfirst($e), "easy");
            array_push($fruits, $fruit);
        }
        foreach ($medium as $m) {
            $fruit = new Fruit(ucfirst($m), "medium");
            array_push($fruits, $fruit);
        }
        foreach ($hard as $h) {
            $fruit = new Fruit(ucfirst($h), "hard");
            array_push($fruits, $fruit);
        }
        file_put_contents(FRUITS_PATH, json_encode($fruits));
    }*/
}