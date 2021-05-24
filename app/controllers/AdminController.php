<?php


namespace app\controllers;


use app\models\Questions;
use App\Models\Users;
use Core\Controller;
use Core\H;
use Core\Router;

class AdminController extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        //$this->load_model('Scores');
    }

    public function indexAction() {
        $this->view->render('admin/index');
    }

    public function usersAction() {
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
                $user->banned = 1;
            else $user->banned = 0;
            $user->setConfirm($user->password);
            $user->save();
        }
        Router::redirect('admin');
    }

}