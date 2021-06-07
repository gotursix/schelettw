<?php


namespace App\Controllers;


use App\Models\Scores;
use App\Models\Users;
use Core\Controller;
use Core\FH;
use Core\H;
use Core\Router;
use Core\Session;

class GameController extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->load_model('Scores');
        $this->view->setLayout('default');
    }

    public function indexAction() {
        if ($difficulty = Session::get("difficulty")) {
            Router::redirect("game/play/" . $difficulty);
        } else {
            Router::redirect("game/difficulty");
        }
    }

    public function gamesAction() {
        //H::dnd($_SESSION);
        if (H::currentUser()) {
            $this->view->render('game/games');
        } else $this->view->render('home/index');

    }

    public function comingAction() {
        $this->view->render('game/coming');
    }

    public function continentAction() {
        $this->view->setLayout('map');
        $this->view->render('map/continent');
    }

    public function rankingsAction() {
        $this->view->render('game/rankings');
    }

    public function difficultyAction() {
        if (Session::exists("difficulty")) {
            Router::redirect("game/play/" . Session::get("difficulty"));
        }
        $this->view->render('game/difficulty');
    }

    public function gameoverAction($score) {
        $this->view->score = $score;
        $this->view->render('game/gameover');
    }

    public function playAction($difficulty) {
        if (in_array($difficulty, DIFFICULTIES)) {
            if (!Session::exists("difficulty")) {
                Session::set("difficulty", $difficulty);
                Session::set("lives", LIVES);
            } else if (Session::get("difficulty") != $difficulty) {
                Router::redirect("game/play/" . Session::get("difficulty"));
            }

            if (!Session::exists("score")) {
                Session::set("score", 0);
            }
            if (!Session::exists("current_score")) {
                Session::set("current_score", 0);
            } else if (Session::get("current_score") != 0) {
                Session::set("current_score", 0);
            }
            $this->view->difficulty = $difficulty;
            $this->view->render('game/play');
        } else {
            Router::redirect("restricted/pageNotFound");
        }
    }

    public function storyAction($continent) {
        if (in_array($continent, CONTINENTS)) {
            if (!Session::exists("continent")) {
                Session::set("continent", $continent);
            } else if (Session::get("continent") != $continent) {
                Router::redirect("game/story/" . Session::get("continent"));
            }
            if (!Session::exists("storyScore")) {
                Session::set("storyScore", 0);
            }
            if (!Session::exists("current_storyScore")) {
                Session::set("current_storyScore", 0);
            } else if (Session::get("current_storyScore") != 0) {
                Session::set("current_storyScore", 0);
            }
            $this->view->continent = $continent;
            $this->view->user = Users::currentUser();
            $this->view->render('game/story');
        } else {
            Router::redirect("restricted/pageNotFound");
        }
    }
}