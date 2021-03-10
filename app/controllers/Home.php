<?php

class Home extends Controller {

    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }

    public function indexAction() {
        $db = DB::getInstance();
        $fields = [
            'fname' => 'andrew',
            'email' => 'aaasadaa.gmail.com'
        ];

        $contacts = $db->query("SELECT * FROM contacts ORDER BY lname,fname")->first();
        $columns = $db->getColumns("contacts");
        //dnd($columns);
        $this->view->render('home/index');
    }
}