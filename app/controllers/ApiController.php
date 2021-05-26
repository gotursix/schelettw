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

class ApiController extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->load_model('Scores');
    }

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
                            H::response(200, "Game over", $score);
                        }
                    }
                } else
                    H::response(400, "Invalid Request", NULL);
        } else
            H::response(400, "Expected GET Request", NULL);
    }


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
                H::response(200, "Game ended", NULL);
            } else {
                H::response(404, "No current game in progress", NULL);
            }
        } else
            H::response(400, "Expected DELETE Request", NULL);
    }

    public function endStoryAction() {
        header("Content-Type:application/json");
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            if (Session::exists("continent")) {
                /* $newScore = $this->ScoresModel->findScore(H::currentUser()->id, Session::get("difficulty"));
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
                 Session::delete("current_score");*/
                Session::delete("continent");
                Session::delete("storyScore");
                Session::delete("current_storyScore");
                H::response(200, "Game ended", Session::get("continent"));
            } else {
                H::response(404, "No current game in progress", NULL);
            }
        } else
            H::response(400, "Expected DELETE Request", NULL);
    }

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

    public function questionsAction() {
        header("Content-Type:application/json");
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $questions = new Questions();
            H::response(200, "Questions:", $questions->findAll());
        } else
            H::response(400, "Expected GET Request", NULL);
    }

    public function veggiesAction() {
        header("Content-Type:application/json");
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $veggies = new Vegetables();
            H::response(200, "Fruit/Veggie:", $veggies->findAll());
        } else
            H::response(400, "Expected GET Request", NULL);
    }

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
            "Arrowroot",
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