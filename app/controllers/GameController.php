<?php


namespace App\Controllers;


use App\Models\Scores;
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
        $this->view->render('game/games');
    }

    public function continentAction() {
        $this->view->setLayout('map');
        $this->view->render('map/continent');
    }

    public function storyAction() {
        $this->view->render('game/story');
    }

    public function rankingsAction() {
        $this->view->render('game/rankings');
    }

    public function difficultyAction() {
        //H::dnd($_SESSION);
        if (Session::exists("difficulty")) {
            Router::redirect("game/play/" . Session::get("difficulty"));
        }
        $this->view->render('game/difficulty');
    }

    public function playAction($difficulty) {
        if (in_array($difficulty, DIFFICULTIES)) {
            if (!Session::exists("difficulty")) {
                Session::set("difficulty", $difficulty);
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
}