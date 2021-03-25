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
        $posted_values = ['fname' => '', 'lname' => '', 'username' => '', 'email' => '', 'password' => '', 'confirm' => ''];

        if ($_POST) {
            $newUser = new Users();
           /* $validation->check($_POST, [
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
            ]);*/
            $newUser->assign($_POST);
            if(!$newUser->save()){
                Router::redirect('register/login');
            }

        }

        $this->view->newUser = $newUser;
        $this->view->displayErrors = $newUser->getErrorMessages();
        $this->view->render('register/register');
    }
}