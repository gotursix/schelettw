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

    public static function indexFromXML($xml, $lookingFor){
        $index = 0;
        foreach($xml as $element){
            if($element == $lookingFor){
                return $index;}
            $index++;
        }
        return -1;
    }

    public static function getFruitsVeggiesLevel($difficulty) {
        $xml=simplexml_load_file("config/fruitsAndVegies.xml") or die("Error: Cannot create object");

        $options = [];

        switch ($difficulty) {
            case "easy":
                $visited = array_fill(0,count($xml->easy->element),false);
                while(count($options) != 4){
                    $randomIndex = rand(0,count($xml->easy->element)-1);
                    if($visited[H::indexFromXML($xml->easy->element,$xml->easy->element[$randomIndex])] == false){
                        array_push($options,$xml->easy->element[$randomIndex]);
                        $visited[H::indexFromXML($xml->easy->element,$xml->easy->element[$randomIndex])] = true;
                    }
                }
                break;
            case "medium":
                $visited = array_fill(0,count($xml->medium->element),false);
                while(count($options) != 4){
                    $randomIndex = rand(0,count($xml->medium->element)-1);
                    if($visited[H::indexFromXML($xml->medium->element,$xml->medium->element[$randomIndex])] == false){
                        array_push($options,$xml->medium->element[$randomIndex]);
                        $visited[H::indexFromXML($xml->medium->element,$xml->medium->element[$randomIndex])] = true;
                    }
                }
                break;
            case "hard":
                $visited = array_fill(0,count($xml->hard->element),false);
                while(count($options) != 4){
                    $randomIndex = rand(0,count($xml->hard->element)-1);
                    if($visited[H::indexFromXML($xml->hard->element,$xml->hard->element[$randomIndex])] == false){
                        array_push($options,$xml->hard->element[$randomIndex]);
                        $visited[H::indexFromXML($xml->hard->element,$xml->hard->element[$randomIndex])] = true;
                    }
                }
                break;
        }
        return $options;
    }

}