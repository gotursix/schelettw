<?php

namespace Core;

use App\Models\Item;
use App\Models\Scores;
use Core\Session;
use App\Models\Users;
use Core\H;

class FH {
    public static function sanitize($dirty) {
        return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
    }

    public static function postedValues($post) {
        $clean_ary = [];
        foreach ($post as $key => $value) {
            $clean_ary[$key] = self::sanitize($value);
        }
        return $clean_ary;
    }

    public static function displayErrors($errors) {
        $hasErrors = (!empty($errors)) ? ' has-errors' : '';
        $html = '<div class="form-errors"><ul class="bg-danger' . $hasErrors . '">';
        foreach ($errors as $field => $error) {
            $html .= '<li class="text-danger">' . $error . '</li>';
        }
        $html .= '</ul></div>';
        return $html;
    }

    //TODO: fix bug when play is current page
    public static function generateMenu() {
        $menu = Router::getMenu('menu_acl');
        $currentPage = H::currentPage();
        $finalMenu = '<ul class="main-nav" id="js-menu">';
        foreach ($menu as $key => $val) {
            $active = '';
            if (!is_array($val)) {
                $colour = ($val == $currentPage) ? 'current-page' : '';
                $finalMenu .= '<li><a class="nav-links ' . $colour . '"' . ' href="' . $val . '">' . $key . '</a></li>';
            }
        }
        if (Users::currentUser()) {
            $finalMenu .= '<li><a href="#" class="nav-links">Welcome,' . Users::currentUser()->fname . '</a></li>';
        }
        $finalMenu .= '</ul>';
        return $finalMenu;
    }

    public static function generateImageHelper($obj, $quality) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.unsplash.com/search/photos?query=' . $obj .
                '&client_id=' . CLIENT_ID . '&orientation=landscape&count=' . PHOTOS_COUNT . "'",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: ugid=d56e3f1f00d5a584b5e854b8def8fc0e5390600'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $parsed = json_decode($response);
        if (!$parsed || count($parsed->results) == 0)
            return null;

        $random = rand(0, count($parsed->results));
        if ($random == -1 || $random > PHOTOS_COUNT - 1) {
            $random = count($parsed->results) - 1;
        }
        if ($quality == "regular")
            return $parsed->results[$random]->urls->regular;
        else return $parsed->results[$random]->urls->small;
    }

    public static function generateGameImage($obj, $quality) {
        if (FH::generateImageHelper($obj, $quality) != null)
            return '<img src="' . FH::generateImageHelper($obj, $quality) . '" alt=" . $obj . " class="game-image"><br><br>';
        else
            Router::redirect("game/play/" . Session::get("difficulty"));
        return '';
    }

    public static function generateDescription($obj) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&redirects=1&titles=" . $obj,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $parsed = json_decode($response);
        return get_object_vars($parsed->query->pages)[array_keys(get_object_vars($parsed->query->pages))[0]]->extract;
    }


    public static function generateToken() {
        $token = base64_encode(openssl_random_pseudo_bytes(32));
        Session::set('csrf_token', $token);
        return $token;
    }

    public static function checkToken($token) {
        return (Session::exists('csrf_token') && Session::get('csrf_token') == $token);
    }

    public static function csrfInput() {
        return '<input type="hidden" name="csrf_token" id="csrf_token" value="' . self::generateToken() . '">';
    }

    public static function indexFromXML($xml, $lookingFor) {
        $index = 0;
        foreach ($xml as $element) {
            if ($element == $lookingFor) {
                return $index;
            }
            $index++;
        }
        return -1;
    }

    public static function getFruitsVeggiesLevel($difficulty) {
        $xml = simplexml_load_file("config/fruitsAndVeggies.xml") or die("Error: Cannot create object");
        $options = [];
        switch ($difficulty) {
            case "easy":
                $visited = array_fill(0, count($xml->easy->element), false);
                while (count($options) != 4) {
                    $randomIndex = rand(0, count($xml->easy->element) - 1);
                    if ($visited[self::indexFromXML($xml->easy->element, $xml->easy->element[$randomIndex])] == false) {
                        array_push($options, $xml->easy->element[$randomIndex]);
                        $visited[self::indexFromXML($xml->easy->element, $xml->easy->element[$randomIndex])] = true;
                    }
                }
                break;
            case "medium":
                $visited = array_fill(0, count($xml->medium->element), false);
                while (count($options) != 4) {
                    $randomIndex = rand(0, count($xml->medium->element) - 1);
                    if ($visited[self::indexFromXML($xml->medium->element, $xml->medium->element[$randomIndex])] == false) {
                        array_push($options, $xml->medium->element[$randomIndex]);
                        $visited[self::indexFromXML($xml->medium->element, $xml->medium->element[$randomIndex])] = true;
                    }
                }
                break;
            case "hard":
                $visited = array_fill(0, count($xml->hard->element), false);
                while (count($options) != 4) {
                    $randomIndex = rand(0, count($xml->hard->element) - 1);
                    if ($visited[self::indexFromXML($xml->hard->element, $xml->hard->element[$randomIndex])] == false) {
                        array_push($options, $xml->hard->element[$randomIndex]);
                        $visited[self::indexFromXML($xml->hard->element, $xml->hard->element[$randomIndex])] = true;
                    }
                }
                break;
        }
        return $options;
    }

    public static function getFruitsAndVeggiesArrayAll() {
        // xml file path
        $path = "config/fruitsAndVeggies.xml";
        $xmlfile = file_get_contents($path);
        $new = simplexml_load_string($xmlfile);
        $con = json_encode($new);
        $newArr = json_decode($con, true);
        $finalArr = array();
        foreach ($newArr['easy']["element"] as $value) {
            array_push($finalArr, $value);
        }
        foreach ($newArr['medium']["element"] as $value) {
            if (!in_array($value, $finalArr)) {
                array_push($finalArr, $value);
            }
        }
        foreach ($newArr['hard']["element"] as $value) {
            if (!in_array($value, $finalArr)) {
                array_push($finalArr, $value);
            }
        }
        return array_unique($finalArr, SORT_STRING);
    }

    public static function getFruitDifficulty($fruit) {
        $path = "config/fruitsAndVeggies.xml";

        $xmlfile = file_get_contents($path);

        $new = simplexml_load_string($xmlfile);

        $con = json_encode($new);

        $newArr = json_decode($con, true);

        $difficulty = "";
        if (in_array($fruit, $newArr["hard"]["element"]))
            $difficulty = "hard";

        if (in_array($fruit, $newArr["medium"]["element"]))
            $difficulty = "medium";

        if (in_array($fruit, $newArr["easy"]["element"]))
            $difficulty = "easy";

        return $difficulty;
    }

    public static function updateRSS($username, $score, $difficulty, $date) {
        $items = file_get_contents(ITEMS_PATH);
        $items = json_decode($items);
        $item = new Item();
        $item->name = $username;
        $item->score = $score;
        $item->difficulty = $difficulty;
        $item->date = $date;

        $scoreModel = new Scores();
        if ($score >= $scoreModel->getMinimumScore($difficulty)) {
            if (count($items) >= 10) {
                array_pop($items);
            }
            array_unshift($items, $item);
            $items = json_encode($items);
            file_put_contents(ITEMS_PATH, $items);
            self::updateFeed();
        }
    }

    public static function updateFeed() {
        $web_url = "http://localhost:8080" . PROOT . "game/rankings";
        $str = "<?xml version='1.0'?>";
        $str .= "<rss version='2.0'>";
        $str .= "<channel>";
        $str .= "<title>New high scores changes!</title>";
        $str .= "<description>Find here the top 10 new high scores!</description>";
        $str .= "<link>$web_url</link>";
        $items = file_get_contents(ITEMS_PATH);
        $items = json_decode($items);
        foreach ($items as $item) {
            $str .= "<item>";
            $str .= "<title>" . "User " . $item->name . " is now in top 10 " . "</title>";
            $str .= "<description>" . ucfirst($item->name) . " is now in top 10 on difficulty " . $item->difficulty . " with score: " . $item->score . "</description>";
            $str .= "<link>$web_url</link>";
            $str .= "<pubDate>$item->date</pubDate>";
            $str .= "</item>";
        }
        $str .= "</channel>";
        $str .= "</rss>";
        file_put_contents("rss.xml", $str);
    }

}