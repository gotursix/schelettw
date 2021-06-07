<?php


namespace app\controllers;


use App\Models\Users;
use App\Models\UserSessions;
use Core\Controller;
use Core\H;

class UserController extends Controller {
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
    }

    public function profileAction() {
        if ($this->request->isPost()) {
            $loggedUser = Users::currentUser();
            $loggedUser->photoId = $this->request->get("photoId");
            $fields = ['photoId' => $loggedUser->photoId];
            $loggedUser->update($loggedUser->id, $fields);
        }
        $this->view->user = Users::currentUser();
        $this->view->render('user/profile');

    }
}