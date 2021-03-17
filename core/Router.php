<?php

class Router {
    public static function Route($url) {
        //Controller
        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
        $controller_name = $controller;
        array_shift($url);

        //Action
        $action = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action' : 'indexAction';
        $action_name = (isset($url[0]) && $url[0] != '') ? $url[0] : 'index';
        array_shift($url);

        //ACL check (acces)
        $grantAcces = self::hasAccess($controller_name, $action_name);
        if (!$grantAcces) {
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

    public static function reddirect($location) {
        header('Location: ' . PROOT . $location);

        if (!headers_sent()) {
            header('Location: ' . PROOT . $location);
            exit();
        } else {
            echo '<script type="javascript">';
            echo 'window.location.href="' . PROOT . $location . '"';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url=' . $location . '"/>';
            echo '</noscript>';
            exit();
        }

    }

    public static function hasAccess($controller_name, $action_name = 'index') {
        $acl_file = file_get_contents(ROOT . DS . 'app' . DS . 'acl.json');
        $acl = json_decode($acl_file, true);
        $current_user_acls = ["Guest"];
        $grantAccess = false;

        if (Session::exists(CURRENT_USER_SESSION_NAME)) {
            $current_user_acls[] = "LoggedIn";
            foreach (Users::currentUser()->acls() as $a) {
                $current_user_acls[] = $a;
            }
        }

        foreach ($current_user_acls as $level) {
            if (array_key_exists($level, $acl) && array_key_exists($controller_name, $acl[$level])) {
                if (in_array($action_name, $acl[$level][$controller_name]) || in_array('*', $acl[$level][$controller_name])) {
                    $grantAccess = true;
                    break;
                }
            }
        }

        //check for denied
        foreach ($current_user_acls as $level) {
            $denied = $acl[$level]['denied'];
            if (!empty($denied) && array_key_exists($controller_name, $denied) && in_array($action_name, $denied[$controller_name])) {
                $grantAccess = false;
                break;
            }
        }

        return $grantAccess;
    }

    public static function getMenu($menu){
        $menuArray = [];
        $menuFile = file_get_contents(ROOT. DS . 'app' . DS . $menu . '.json');
        $acl = json_decode($menuFile, true);
        foreach ($acl as $key => $val){
            if(is_array($val)){
                $sub = [];
                foreach ($val as $k => $v){
                    if($k == 'separator' && !empty($sub)){
                        $sub[$k] = '';
                        continue;
                    }else if($finalVal = self::get_link($v)){
                        $sub[$k] = $finalVal;
                    }
                }
                if (!empty($sub)){
                    $menuArray[$key] = $sub;
                }
            } else{
                if ($finalVal = self::get_link($val)){
                    $menuArray[$key] = $finalVal;
                }
            }
        }
        return $menuArray;
    }

    private static function get_link($val){
        //check if it is external link
        if (preg_match('/https?:\/\//',$val) == 1){
            return $val;
        }else{
            $uArr = explode(DS, $val);
            $controller_name = ucwords($uArr[0]);
            $action_name = (isset($uArr[1])) ? $uArr[1] : '';
            if (self::hasAccess($controller_name, $action_name)){
                return PROOT . $val;
            }
            return false;
        }

    }
}