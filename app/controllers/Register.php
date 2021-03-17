<?php


class Register extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->load_model('Users');
        $this->view->setLayout('default');
    }

    public function indexAction() {
        Router::reddirect("register/register");
    }

    public function logoutAction() {
        if (currentUser()) {
            currentUser()->logout();
            Router::reddirect('register');
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
                    Router::reddirect('home');
                } else {
                    $validation->addError("There is an error with your username or password!");
                }
            }
        }
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/login');
    }

    public function registerAction() {
        // NEED TO IMPLEMENT VALIDATION CLASS! (FROM CORE I GUESS :)) -- too much for tonight.

        $validation = new Validate();
        $posted_values = ['fname' => '', 'lname' => '', 'username' => '', 'email' => '', 'password' => '', 'confirm' => ''];

        if ($_POST) {
            $posted_values = posted_values($_POST);
            $validation->check($_POST, [
                'fname' => [
                    'display' => 'First name',
                    'required' => true
                ],
                'lname' => ['display' => 'Last name',
                'required' => true
                ],
                'username' => [
                    'display' => 'Username',
                    'required' => true,
                    'unique' => 'users',
                    'min' => 6,
                    'max' => 150
                ],
                'email' => [
                    'display' => 'Email',
                    'required' => true,
                    'unique' => 'users',
                    'max' => 150,
                    'valid_email' => true
                ],
                'password' => [
                    'display' => 'Password',
                    'required' => true,
                    'min' => 6,
                ],
                'confirm' => [
                    'display' => 'Confirm Password',
                    'required' => true,
                    'matches' => 'password',
                ],
            ]);
            if ($validation->passed()){
                $newUser = new Users();
                $newUser->registerNewUser($_POST);
                //$newUser->login();
                Router::reddirect('register/login');
            }
        }

        $this->view->post = $posted_values;
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/register');
    }
}