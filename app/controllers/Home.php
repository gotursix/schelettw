<?php

class Home extends Controller {

    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }

    public function indexAction() {
        $db = DB::getInstance();
        /*
        $fields = [
            'fname' => 'andrew',
            'email' => 'aaasadaa.gmail.com'
        ];*/

        $contacts = $db->find('contacts', [
            'conditions' => ['lname = ?', 'fname = ?'],
            'bind' => ['Andrei', 'Cristi'],
        ]);
        //dnd($contacts);
        $this->view->render('home/index');
    }
}