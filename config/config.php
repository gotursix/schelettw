<?php
    //DEBUG MODE CONFIG VARIABLE
    define('DEBUG', true);

    //DB CREDENTIALS CONFIG VARIABLES
    define('DB_NAME', 'webdb'); // Database name
    define('DB_USER', 'root'); //Database user
    define('DB_PASSWORD', ''); // Database password
    define('DB_HOST', '127.0.0.1'); // Database host

    //CONTROLLERS AND VIEWS CONFIG VARIABLES
    define('DEFAULT_CONTROLLER', 'Home'); // Default controller if the controller doesn't exist.
    define('DEFAULT_LAYOUT', 'default'); // If no layout is set in the controller then use the default layout.
    define('PROOT', '/schelettw/'); // Set to "/" for a live server.
    define('SITE_TITLE', 'Best website from the world'); //This will be used if no site title is set.
    define('MENU_BRAND', 'FRUITS'); //this is the brand text in the menu

    //COOKIE CONFIG VARIABLES
    define('CURRENT_USER_SESSION_NAME', 'KKKjhbKUYGkkuyvRYrurLs'); //session name for logged in user
    define('REMEMBER_ME_COOKIE_NAME', 'wldkn232QWEqVEQwfe5S'); // cookie name for logged in user remember me
    define('REMEMBER_ME_COOKIE_EXPIRY', 604800); // time in seconds for remember me cookie to live (30days)
    define("ACCESS_RESTRICTED", 'Restricted'); //controller name for the restricted redirect

    //API CONFIG VARIABLES
    define("PHOTOS_COUNT", 10);
    define("CLIENT_ID", 'kiDWWEBWwAW_ZsTTrdWPGUgE9bKT8FES0k8YsYNCa9o');
    define("API_DOMAIN", "http://localhost/");

    //GAME CONFIG VARIABLES
    define("DIFFICULTIES", ["easy", "medium", "hard"]);
    define("LIVES", 3);

    //RSS FEED VARIABLES
    define("ITEMS_PATH", ROOT . DS . "app" . DS . "items.json");

    //RSS FEED VARIABLES
    define("FRUITS_PATH", ROOT . DS . "app" . DS . "fruits.json");

    //STORY GAME
    define("CONTINENTS", ["america","europe", "asia", "australia", "africa"]);


