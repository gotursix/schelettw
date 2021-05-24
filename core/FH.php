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

    public static function checkToken($token) {
        return (Session::exists('csrf_token') && Session::get('csrf_token') == $token);
    }

    public static function csrfInput() {
        return '<input type="hidden" name="csrf_token" id="csrf_token" value="' . Generators::generateToken() . '">';
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

    public static function isFruitInJSON($fruits, $fruit) {
        foreach ($fruits as $f) {
            if ($f["name"] == ucfirst($fruit))
                return $f;
        }
        return null;
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
        $web_url = "http://localhost" . PROOT . "game/rankings";
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