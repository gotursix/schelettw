<?php


class RegisterController extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->load_model('Users');
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
        $validation = new Validate();
        if ($_POST) {
            //form validation
            $validation->check($_POST, [
                'username' => [
                    'display' => "Username",
                    'required' => true,
                    'min' => 4
                ],
                'password' => [
                    'display' => 'Password',
                    'required' => true,
                    'min' => 6
                ]
            ]);
            if ($validation->passed()) {
                $user = $this->UsersModel->findByUsername(Input::get('username'));
                if ($user && password_verify(Input::get('password'), $user->password)) {
                    $remember = isset($_POST['remember_me']) && Input::get('remember_me');
                    $user->login($remember);
                    Router::redirect('home');
                } else {
                    $validation->addError("There is an error with your username or password!");
                }
            }
        }
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/login');
    }

    public function registerAction() {
        $newUser = new Users();
        if ($this->request->isPost()) {
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