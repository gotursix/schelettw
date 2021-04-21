<?php

namespace Core;

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
                $active = ($val == $currentPage) ? 'active' : '';
                $finalMenu .= '<li><a class="nav-links ' . $colour . '"' . $active . ' href="' . $val . '">' . $key . '</a></li>';
            }
        }
        if (Users::currentUser()) {
            $finalMenu .= '<li><a href="#" class="nav-links">Welcome,' . Users::currentUser()->fname . '</a></li>';
        }
        $finalMenu .= '</ul>';
        return $finalMenu;
    }

    public static function generateTable($scores) {
        $rank = 1;
        $finalTable = "";
        foreach ($scores as $score) {
            $finalTable .= "<tr>";
            foreach ($score as $key => $value) {
                if ($key == "id") {
                    $finalTable .= '<td data-label="Rank">#' . $rank . '</td>';
                    $rank++;
                } else {
                    $finalTable .= '<td data-label="' . $key . '">' . $value . '</td>';
                }
            }
            $finalTable .= "</tr>";
        }
        return $finalTable;
    }

    public static function generateTableAll($easy, $medium, $hard) {
        return self::generateTable($easy) . self::generateTable($medium) . self::generateTable($hard);
    }

    public static function generateImage($obj) {
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
        $random = rand(0, count($parsed->results) > PHOTOS_COUNT ? PHOTOS_COUNT - 1 : count($parsed->results) - 1);
        return $parsed->results[$random]->urls->regular;
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
}