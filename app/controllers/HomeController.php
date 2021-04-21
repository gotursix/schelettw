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

    public function difficultyAction() {
        $this->view->render('home/difficulty');
    }

    //TODO: check for vulnerabilities
    public function indexAction() {
        if (!Users::currentUser()) {
            $this->view->render('home/index');
        } else {
            if ($difficulty = Session::get("difficulty")) {
                Router::redirect("home/game/" . $difficulty);
            } else {
                Router::redirect("home/difficulty");
            }
        }
    }

    //TODO: check for vulnerabilities
    public function gameAction($difficulty) {
        if (in_array($difficulty, DIFFICULTIES)) {
            if (!Session::exists("difficulty")) {
                Session::set("difficulty", $difficulty);
            } else if (Session::get("difficulty") != $difficulty) {
                Router::redirect("home/game/" . Session::get("difficulty"));
            }

            //Game logic goes here
            $fruitsVeggies = FH::getFruitsVeggiesLevel($difficulty);
            //H::dnd($fruitsVeggies);
            $this->view->difficulty = $difficulty;
            $this->view->level = $fruitsVeggies;
            $this->view->render('home/game');
        } else {
            Router::redirect("restricted/pageNotFound");
        }
    }


    public function rankingsAction() {
        $scoresModel = new Scores();
        $this->view->easy = $scoresModel->findByDifficulty('easy');
        $this->view->medium = $scoresModel->findByDifficulty('medium');
        $this->view->hard = $scoresModel->findByDifficulty('hard');
        $this->view->render('home/rankings');
    }

    public function instructionsAction() {
        $this->view->render('home/instructions');
    }

    public function documentationAction() {
        $this->view->render('home/documentation');
    }
}