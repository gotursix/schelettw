<?php


class Register extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
    }

    public function loginAction() {
        if($_POST){
            // form validation
            $validation = true;
            if($validation === true) {
                $user = $this->UsersModel->findByUsername($_POST['username']);
                dnd($user); 
            }
        }
        $this->view->render('register/login');
    }

    public function indexAction() {
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