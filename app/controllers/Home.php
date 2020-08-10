<?php

    class Home extends Controller {

        public function __construct($controller, $action)
        {
            parent::__construct($controller, $action);
        }

        public function indexAction() {
            $this->view->render('home/index');
            //die('Welcome to the home controller. This is the index action.');
        }
    }