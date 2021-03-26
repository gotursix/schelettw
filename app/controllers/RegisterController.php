<?php


class RegisterController extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->load_model('Users');
        $this->load_model('Login');
        $this->view->setLayout('default');
    }

    public function indexAction() {
        Router::redirect("register/register");
    }

    public function logoutAction() {
        if (H::currentUser()) {
            H::currentUser()->logout();
            Router::redirect('register');
        }
    }

    public function loginAction() {
        $loginModel = new Login();
        if ($this->request->isPost()) {
            $this->request->csrfCheck();
            $loginModel->assign($this->request->get());
            $loginModel->validator();
            if ($loginModel->validationPassed()) {
                $user = $this->UsersModel->findByUsername($this->request->get('username'));
                if ($user && password_verify($this->request->get('password'), $user->password)) {
                    $remember = $loginModel->getRememberMeChecked();
                    $user->login($remember);
                    Router::redirect('home');
                } else {
                    $loginModel->addErrorMessage("username", "There is an error with your username or password!");
                }
            }
        }
        $this->view->login = $loginModel;
        $this->view->displayErrors = $loginModel->getErrorMessages();
        $this->view->render('register/login');
    }


    public function registerAction() {
        $newUser = new Users();
        if ($this->request->isPost()) {
            $this->request->csrfCheck();
            $newUser->assign($this->request->get());
            $newUser->setConfirm($this->request->get('confirm'));
            if ($newUser->save()) {
                Router::redirect('register/login');
            }
        }
        $this->view->newUser = $newUser;
        $this->view->displayErrors = $newUser->getErrorMessages();
        $this->view->render('register/register');
    }
}