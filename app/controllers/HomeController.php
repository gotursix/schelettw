<?php

namespace App\Controllers;

use App\Models\Scores;
use App\Models\Users;
use Core\Controller;
use Core\FH;
use Core\H;
use Core\Router;
use Core\Session;


class HomeController extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->load_model('Scores');
        $this->view->setLayout('default');
    }

    public function learnAction($pageNumber = 0) {
        $pageNumber == null || $pageNumber == 0 ? $this->view->page = 0 : $this->view->page = $pageNumber;
        $this->view->render('home/learn');
    }

    public function learnaboutAction($item) {
        /*
        if (!in_array($item, FH::getFruitsAndVeggiesArrayAll())) {
            Router::redirect("restricted/pageNotFound");
        }*/
        $this->view->item = $item;
        $this->view->render('home/learnabout');
    }

    public function indexAction() {
        if (!Users::currentUser()) {
            $this->view->render('home/index');
        } else {
            Router::redirect("game/index");
        }
    }

    public function instructionsAction() {
        $this->view->render('home/instructions');
    }

    public function documentationAction() {
        $this->view->render('home/documentation');
    }
}