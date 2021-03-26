<?php
    use Core\Session;
    use Core\Router;
    use Core\Cookie;
    use App\Models\Users;

    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT',dirname(__FILE__));

    // Load config
    require_once(ROOT . DS . 'config' . DS . 'config.php');

    function autoload($className){
        $classAry = explode('\\', $className);
        $class = array_pop($classAry);
        $subPath = strtolower(implode(DS, $classAry));
        var_dump($className);
        var_dump($classAry);
        var_dump($class);
        var_dump($subPath);


    }

    spl_autoload_register('autoload');
    session_start();

    $url =  isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')): [];

    if(!Session::exists(CURRENT_USER_SESSION_NAME) && Cookie::exists(REMEMBER_ME_COOKIE_NAME)){
        Users::loginUserFromCookie();
    }

    // Route the request
    Router::route($url);