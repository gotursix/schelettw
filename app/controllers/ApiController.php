<?php


namespace App\Controllers;

use Core\H;

class ApiController {

    public function getAction() {
        header("Content-Type:application/json");
        $rawInput       = file_get_contents('php://input');
        $input          = json_decode($rawInput, true);
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


}