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
}