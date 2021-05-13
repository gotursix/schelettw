<?php


namespace App\Controllers;

use App\Models\Scores;
use Core\H;

class ApiController {

    public function getAction() {
        header("Content-Type:application/json");
        $rawInput = file_get_contents('php://input');
        $input = json_decode($rawInput, true);
        if (!empty($input['name'])) {
            $name = $input['name'];
            $price = $input['price'];
            if (!$price) {
                H::response(200, "Product Not Found", NULL);
            } else {
                H::response(200, "Product Found", $price);
            }
        } else {
            H::response(400, "Invalid Request", NULL);
        }
    }


    public function rankingsAction($difficulty = "all", $count = 0) {
        header("Content-Type:application/json");
        $scoresModel = new Scores();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (in_array($difficulty, DIFFICULTIES)) {
                if ($count != 0 && is_numeric($count)) {
                    $arr = $scoresModel->findByDifficultyTop($difficulty, $count);
                    H::response(200, "Wants to see only", json_encode($arr));
                } else {
                    $arr = $scoresModel->findByDifficulty($difficulty);
                    H::response(200, "Wants to see all", json_encode($arr));
                }
            } else {
                if ($difficulty == "all") {
                    if ($count != 0 && is_numeric($count)) {
                        $arr = $scoresModel->findAllDifficultyTop($count);
                        H::response(200, "Wants to see all difficulties", json_encode($arr));
                    } else {
                        $arr = $scoresModel->findAllDifficulty();
                        H::response(200, "Wants to see all difficulties", json_encode($arr));
                    }
                } else {
                    H::response(400, "Invalid Request", NULL);
                }
            }
        } else {
            H::response(400, "Expected GET Request", NULL);
        }

    }


}