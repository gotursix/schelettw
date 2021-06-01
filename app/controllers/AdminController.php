<?php


namespace app\controllers;


use app\models\Questions;
use App\Models\Users;
use app\models\Vegetables;
use Core\Controller;
use Core\H;
use Core\Router;

class AdminController extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }

    public function indexAction() {
        $this->view->render('admin/index');
    }

    public function usersAction() {
        $users = new Users();
        $users = $users->findAll();
        $this->view->users = $users;
        $this->view->render('admin/users');
    }

    public function deleteAction($id) {
        $question = new Questions($id);
        $question->delete();
        Router::redirect('admin');
    }

    public function editAction($id) {
        $question = new Questions($id);
        if ($this->request->isPost()) {
            $this->request->csrfCheck();
            $question->assign($this->request->get());
            $question->validator();

            if ($question->validationPassed()) {
                $question->save();
                Router::redirect('admin');
            }
        }
        $this->view->question = $question;
        $this->view->displayErrors = $question->getErrorMessages();
        $this->view->render('admin/edit');
    }

    public function addAction() {
        $question = new Questions();
        if ($this->request->isPost()) {
            $this->request->csrfCheck();
            $question->assign($this->request->get());
            $question->validator();

            if ($question->validationPassed()) {
                $question->save();
                Router::redirect('admin');
            }
        }
        $this->view->question = $question;
        $this->view->displayErrors = $question->getErrorMessages();
        $this->view->render('admin/add');
    }

    public function bannedStatusAction($id) {
        $user = new Users();
        $user->findById($id);
        if ($user) {
            if ($user->banned == 0)
                $banned = 1;
            else $banned = 0;
            $fields = ['banned' => $banned];
            $user->update($id, $fields);
        }
        Router::redirect('admin/users');
    }

    public function addVeggieAction() {
        $veggie = new Vegetables();
        if ($this->request->isPost()) {
            $this->request->csrfCheck();
            $veggie->assign($this->request->get());
            $veggie->validator();

            if ($veggie->validationPassed()) {
                $veggie->save();
                Router::redirect('admin/veggies');
            }
        }
        $this->view->veggie = $veggie;
        $this->view->displayErrors = $veggie->getErrorMessages();
        $this->view->render('veggies/add');
    }

    public function deleteVeggieAction($id) {
        $veggie = new Vegetables($id);
        $veggie->delete();
        Router::redirect('admin/veggies');
    }

    public function editVeggieAction($id) {
        $veggie = new Vegetables($id);
        if ($this->request->isPost()) {
            $this->request->csrfCheck();
            $veggie->assign($this->request->get());
            $veggie->validator();

            if ($veggie->validationPassed()) {
                $veggie->save();
                Router::redirect('admin/veggies');
            }
        }
        $this->view->veggie = $veggie;
        $this->view->displayErrors = $veggie->getErrorMessages();
        $this->view->render('veggies/edit');
    }

    public function veggiesAction() {
        $this->view->render('veggies/index');
    }

    public function exportUsersAction() {
        $this->view->render('export/users');
    }

    public function exportScoresAction() {
        $this->view->render('export/scores');
    }

    public function exportQuestionsAction() {
        $this->view->render('export/questions');
    }

    public function exportFruitsAction() {
        $this->view->render('export/fruits-veggies');
    }

    public function importUsersAction() {
        $this->view->render('import/users');
    }

    public function importScoresAction() {
        $this->view->render('import/scores');
    }

    public function importQuestionsAction() {
        $this->view->render('import/questions');
    }

    public function importFruitsAction() {
        $this->view->render('import/fruits-veggies');
    }

}