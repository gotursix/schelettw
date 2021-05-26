<?php

namespace Core;

use App\Models\Users;

class Router {
    public static function Route($url) {
        //Controller
        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) . 'Controller' : DEFAULT_CONTROLLER . 'Controller';
        $controller_name = str_replace('Controller', '', $controller);
        array_shift($url);

        //Action
        $action = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action' : 'indexAction';
        $action_name = (isset($url[0]) && $url[0] != '') ? $url[0] : 'index';
        array_shift($url);

        //ACL check access
        $grantAccess = self::hasAccess($controller_name, $action_name);
        if (!$grantAccess) {
            $controller = ACCESS_RESTRICTED . 'Controller';
            $controller_name = ACCESS_RESTRICTED;
            $action = 'indexAction';
        }

        //Params
        $queryParams = $url;
        $cleanParams = [];
        foreach ($queryParams as $param){
            $cleanParams[] = FH::sanitize($param);
        }
        $controller = 'App\Controllers\\' . $controller;
        if (class_exists($controller)) {
            $dispatch = new $controller($controller_name, $action);
            if (method_exists($controller, $action)) {
                call_user_func_array([$dispatch, $action], $cleanParams);
            } else {
                Router::redirect("restricted/pageNotFound");
            }
        }
    }

    public static function redirect($location) {
        header('Location: ' . PROOT . $location);
    }

    public static function hasAccess($controller_name, $action_name = "index") {
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
                if (in_array("*", $acl[$level][$controller_name]) || in_array($action_name, $acl[$level][$controller_name])) {
                    $grantAccess = true;
                    break;
                }
            }
        }

        //Check for denied
        foreach ($current_user_acls as $level) {
            $denied = $acl[$level]['denied'];
            if (!empty($denied) && array_key_exists($controller_name, $denied) && in_array($action_name, $denied[$controller_name])) {
                $grantAccess = false;
                break;
            }
        }
        return $grantAccess;
    }

    public static function getMenu($menu) {
        $menuAry = [];
        $menuFile = file_get_contents(ROOT . DS . 'app' . DS . $menu . '.json');
        $acl = json_decode($menuFile, true);
        foreach ($acl as $key => $val) {
            if (is_array($val)) {
                $sub = [];

                foreach ($val as $k => $v) {
                    if ($k == 'separator' && !empty($sub)) {
                        $sub[$k] = '';
                        continue;
                    } else if ($finalVal = self::getLink($v)) {
                        $sub[$k] = $finalVal;
                    }
                }
                if (!empty($sub)) {
                    $menuAry[$key] = $sub;
                }
            } else {
                if ($finalVal = self::getLink($val)) {
                    $menuAry[$key] = $finalVal;
                }
            }
        }
        return $menuAry;
    }

    private static function getLink($val) {
        $uAry = isset($val) ? explode('/', ltrim($val, '/')) : [];
        $controller_name = ucwords($uAry[0]);
        $controller_name = rtrim($controller_name, "/");
        $action_name = (isset($uAry[1])) ? $uAry[1] : '';
        $action_name = rtrim($action_name, "/");
        if (self::hasAccess($controller_name, $action_name)) {
            return PROOT . $val;
        }
        return false;

    }
}