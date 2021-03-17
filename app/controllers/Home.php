<?php

class Home extends Controller {

    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }

    public function indexAction() {
        $this->view->render('home/index');
    }

    public function rankingsAction() {
        $this->view->render('home/rankings');
    }

    public function instructionsAction() {
        $this->view->render('home/instructions');
    }
}