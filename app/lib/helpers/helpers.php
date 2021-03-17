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
    $clean_ary = [];
    foreach ($post as $key => $value) {
        $clean_ary[$key] = sanitise($value);
    }
    return $clean_ary;
}

function currentPage(){
    $currentPage = $_SERVER['REQUEST_URI'];
    if ($currentPage == PROOT || $currentPage == PROOT . 'home/index'){
        $currentPage = PROOT . 'home';
    }
    return $currentPage;
}

function currentUser(){
    return Users::currentUser();
}