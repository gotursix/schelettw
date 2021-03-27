<?php

namespace App\Controllers;

use App\Models\Scores;
use App\Models\Users;
use Core\Controller;
use Core\H;
use Core\Router;


class HomeController extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->load_model('Scores');
        $this->view->setLayout('default');
    }

    public function gameAction() {
        if(Users::currentUser()){
            $this->view->render('home/game');
        }else{
            Router::redirect("register/login");
        }
    }

    public function indexAction() {
        if(!Users::currentUser()){
            $this->view->render('home/index');
        }else{
            Router::redirect("home/game");
        }
    }


    public function rankingsAction() {
        $easyScoresModel = new Scores();
        $this->view->easy = $easyScoresModel->findByDifficulty('easy');
        $this->view->medium = $easyScoresModel->findByDifficulty('medium');
        $this->view->hard = $easyScoresModel->findByDifficulty('hard');
        $this->view->render('home/rankings');
    }

    public function instructionsAction() {
        $this->view->render('home/instructions');
    }
}