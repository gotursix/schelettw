<?php


namespace App\Controllers;

use App\Models\Fruit;
use App\Models\Scores;
use Core\FH;
use Core\H;

class ApiController {

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
                    } else {
                        H::response(200, "Wants to get all fruits from diff " . $difficulty, $arr);
                    }
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
                } else {
                    H::response(400, "Invalid Request", NULL);
                }
            }
        } else {
            H::response(400, "Expected GET Request", NULL);
        }
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
                } else {
                    H::response(400, "Invalid Request", NULL);
                }
            }
        } else {
            H::response(400, "Expected GET Request", NULL);
        }
    }

    public function photoAction($fruit, $quality = "regular") {
        if ($quality == null)
            $quality = "regular";
        header("Content-Type:application/json");
        $input = file_get_contents(FRUITS_PATH);
        $fruits = json_decode($input, true);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($f = FH::isFruitInJSON($fruits, $fruit)) {
                $data = array(
                    "name" => $f["name"],
                    "url" => htmlspecialchars(FH::generateImageHelper($fruit, $quality)),
                    "difficulty" => $f["difficulty"]
                );
                H::response(200, "Fruit is in JSON " . $quality, $data);
            } else {
                H::response(404, "Fruit not found!", NULL);
            }
        } else {
            H::response(400, "Expected GET Request", NULL);
        }
    }

    public function descriptionAction($fruit) {
        header("Content-Type:application/json");
        $input = file_get_contents(FRUITS_PATH);
        $fruits = json_decode($input, true);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($f = FH::isFruitInJSON($fruits, $fruit)) {
                $data = array(
                    "description" => FH::generateDescription($fruit)
                );
                H::response(200, "Fruit is in JSON ", $data);
            } else {
                H::response(404, "Fruit not found!", NULL);
            }
        } else {
            H::response(400, "Expected GET Request", NULL);
        }
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