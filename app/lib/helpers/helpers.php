<?php

function dnd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function sanitise($dirty) {
    return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
}

function posted_values($post) {
    dnd("we are in posted values");
    $clean_ary = [];
    foreach ($post as $key => $value) {
        $clean_ary[$key] = sanitize($value);
    }
    return $clean_ary;
}