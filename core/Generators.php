<?php

namespace Core;


use App\Models\Users;

class Generators {

    public static function generateToken() {
        $token = base64_encode(openssl_random_pseudo_bytes(32));
        Session::set('csrf_token', $token);
        return $token;
    }

    public static function generateImageHelper($obj, $quality) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.unsplash.com/search/photos?query=' . $obj .
                '&client_id=' . CLIENT_ID . '&orientation=landscape&count=' . PHOTOS_COUNT . "'",
            CURLOPT_RETURNTRANSFER => true
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

    public static function generateDescription($obj) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&redirects=1&titles=" . $obj,
            CURLOPT_RETURNTRANSFER => true,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $parsed = json_decode($response);
        return get_object_vars($parsed->query->pages)[array_keys(get_object_vars($parsed->query->pages))[0]]->extract;
    }

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
            $finalMenu .= '<li><a href="' . PROOT . 'user/profile"   class="nav-links">Welcome,' . Users::currentUser()->fname . '</a></li>';
        }
        $finalMenu .= '</ul>';
        return $finalMenu;
    }

    public static function generateUsersTable($users) {
        $finalTable = "";
        foreach ($users as $user)
            if ($user != Users::currentUser()) {
                if ($user->banned == 0)
                    $status = "ban";
                else $status = "unban";
                $finalTable .= "<tr>";
                $finalTable .= '<td data-label="Id.">' . $user->id . '</td>';
                $finalTable .= '<td data-label="Username">' . $user->username . '</td>';
                $finalTable .= '<td data-label="Action">' . '<a href="' . PROOT . 'admin/bannedStatus/' . $user->id . '" onClick="return ' . "confirm('Are you sure you want to " . $status . " user ? ');" . '" class="button">' . ucfirst($status) . ' </a>';
                $finalTable .= "</td><tr>";
            }
        return $finalTable;
    }
}