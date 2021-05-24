<?php


namespace app\controllers;


use App\Models\Users;
use App\Models\UserSessions;
use Core\Controller;

class UserController extends Controller
{
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
    }
    public function profileAction() {
        $this->view->user = Users::currentUser();
        $this->view->render('user/profile');
    }


}