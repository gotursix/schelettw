<?php


namespace app\controllers;


use app\models\Questions;
use Core\Controller;
use Core\H;

class AdminController extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        //$this->load_model('Scores');
    }

    public function indexAction() {
        $this->view->render('admin/index');
    }

    public function editAction($id) {
        $question = new Questions($id);
        if ($this->request->isPost()) {
            $this->request->csrfCheck();
            $question->assign($this->request->get());
            H::dnd($question);
            $question->validator();
            /*
            if ($question->validationPassed()) {
                $user = $this->QuestionsModel->findByUsername($this->request->get('username'));
                if ($user && password_verify($this->request->get('password'), $user->password)) {
                    $remember = $loginModel->getRememberMeChecked();
                    $user->login($remember);
                    Router::redirect('home');
                } else {
                    $loginModel->addErrorMessage("username", "There is an error with your username or password!");
                }
            }*/
        }
        $this->view->question = $question;
        $this->view->displayErrors = $question->getErrorMessages();
        $this->view->render('admin/edit');
    }

}