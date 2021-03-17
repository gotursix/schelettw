<?php

class Router {
    public static function Route($url) {
        //Controller
        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
        $controller_name = $controller;
        array_shift($url);

        //Action
        $action = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action' : 'indexAction';
        $action_name = $controller;
        array_shift($url);

        //ACL check (acces)
        $grantAcces = self::hasAccess($controller_name, $action_name);
        if(!$grantAcces){
            $controller_name = $controller = ACCESS_RESTRICTED;
            $action = 'indexAction';
        }

        //Params
        $queryParams = $url;
        if (class_exists($controller_name)) {
            $dispatch = new $controller($controller_name, $action);
            if (method_exists($controller, $action)) {
                call_user_func_array([$dispatch, $action], $queryParams);
            } else {
                die('That method does not exist in the controller \"' . $controller_name . '\"');
            }
        } else {
            die("404: Page not found!");
        }


    }

    public static function hasAccess($controller_name, $action_name='index'){
        $acl_file = file_get_contents(ROOT . DS . 'app' . DS . 'acl.json');
        $acl = json_decode($acl_file, true);
        $current_user_acls = ["Guest"];
        $grantAccess = false;

        if(Session::exists(CURRENT_USER_SESSION_NAME)){
            $current_user_acls[] = "LoggedIn";
            foreach (currentUser() -> acls() as $a){
                $current_user_acls[] = $a;
            }
        }

        //dnd($current_user_acls);
    }
}