<?php

namespace Core;

use App\Models\Users;

class H {
    public static function dnd($data) {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
    }

    public static function currentPage() {
        $currentPage = $_SERVER['REQUEST_URI'];
        if ($currentPage == PROOT || $currentPage == PROOT . 'home/index') {
            $currentPage = PROOT . 'home';
        }
        return $currentPage;
    }

    public static function currentUser() {
        return Users::currentUser();
    }

    public static function getObjectProperties($obj) {
        return get_object_vars($obj);
    }

    public static function  getDifficuly(){
        if(Session::get("difficulty") == "easy")
            return 0;
        return 2;
    }
}