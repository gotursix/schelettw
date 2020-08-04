<?php

    class Router {
        public static  function  Route($url)
        {
            // Controller
            $controller = (isset($url[0]) && $url[0]!= '') ? ucwords($url[0]):DEFAULT_CONTROLLER;
            $controller_name = $controller;
            array_shift($url);

            // Action
            $action = (isset($url[0]) && $url[0]!= '') ? $url[0] . 'Action' : 'indexAction';
            $action_name = $action;
            array_shift($url);

            // Params
            $queryParams = $url;

            $dispatch = new $controller($controller_name, $action);

            if(method_exists($controller,$action)){
                call_user_func_array();
            }
        }
    }