<?php

function dnd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function posted_values($post){
    $clean_ary = [];
    foreach($post as $key => $value){
        $clean_ary[$key] = sanitize($value);
    }
    return $clean_ary;
}