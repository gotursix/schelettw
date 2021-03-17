<?php


class Register extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->load_model('Users');
        $this->view->setLayout('default');
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
                    Router::reddirect('home');
                } else {
                    $validation->addError("There is an error with your username or password!");
                }
            }
        }
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/login');
    }

    public function indexAction() {
        Router::reddirect("register/register");
    }

    public function registerAction() {
        // NEED TO IMPLEMENT VALIDATION CLASS! (FROM CORE I GUESS :)) -- too much for tonight.

        //$validation = new Validate();
        $posted_values = ['fname' => '', 'lname' => '', 'username' => '', 'email' => '', 'password' => '', 'confirm' => ''];

        if ($_POST) {
            $posted_values = $posted_values($_POST);
        }

        $this->view->post = $posted_values;
        //$this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/register');
    }
}